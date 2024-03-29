<?php

namespace App\Models;

use App\Models\Filters\ClientFilters;
use App\Models\Finance\Bill;
use App\Models\Finance\Invoice;
use App\Models\Finance\InvoiceAvoir;
use App\Models\Utilities\Address;
use App\Models\Utilities\Email;
use App\Models\Utilities\Telephone;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Model implements HasMedia
{
    use HasFactory;
    use UuidGenerator;
    use InteractsWithMedia;
    use GetModelByUuid;
    use ClientFilters;

    protected $fillable = [
        'uuid',
        'entreprise',
        'contact',
        'telephone',
        'fax',
        'email',
        'website',
        'rc',
        'ice',
        'details',
    ];


    public function contacts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contact::class);
    }
    
    public function telephones(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Telephone::class, 'telephoneable');
    }

    public function emails(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function invoicesAvoir(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InvoiceAvoir::class);
    }

    public function invoices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function bills(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Bill::class, Invoice::class, 'client_id', 'billable_id');
    }
    
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function invoiceAddress()
    {
        return $this->hasOne(Address::class)->where('type', Address::INVOICE_TYPE);
    }

    public function deliveryAddress()
    {
        return $this->hasOne(Address::class)->where('type', Address::DELIVERY_TYPE);
    }

    public function getFullDateAttribute(): string
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        return $date->translatedFormat('d') . ' ' . $date->translatedFormat('F') . ' ' . $date->translatedFormat('Y');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->sharpen(10)
            ->nonOptimized() //for shared hosts
            ->nonQueued(); //for shared hosts
    }

    public static function boot()
    {
        parent::boot();

        $prefixer = config('facturis.clients.prefix');

        static::creating(function ($model) use ($prefixer) {
            $number = (self::max('id') + 1);

            $model->code = $prefixer . str_pad($number, 5, 0, STR_PAD_LEFT);
        });
    }
}
