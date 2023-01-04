<?php

namespace App\Models\Facturis\Finance;

use App\Traits\GetModelByUuid;
use App\Traits\Nl2br;
use App\Traits\NumerotationGenerator;
use App\Traits\PriceFormatter;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAvoir extends Model
{
    use HasFactory;
    use GetModelByUuid;
    use UuidGenerator;
    use Nl2br;
    use PriceFormatter;
    use NumerotationGenerator;

    protected $fillable = [
        'client_id',
        'client_uuid',
        'invoice_id',
        'invoice_uuid',
        'invoice_number',
        'code',
        'full_number',
        'bl_code',
        'bc_code',
        'ht_price',
        'total_price',
        'tax_price',
        'invoice_date',
        'due_date',
        'payment_date',
        'admin_notes',
        'client_notes',
        'condition',
        'active',
    ];

    protected $casts = [
        'due_date' => 'date:Y-m-d',
        'invoice_date' => 'date:Y-m-d',
        'active' => 'boolean',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function articles()
    {
        return $this->morphMany(Article::class, 'articleable');
    }

    public function bill()
    {
        return $this->morphOne(Bill::class, 'billable')->withDefault();
    }
}
