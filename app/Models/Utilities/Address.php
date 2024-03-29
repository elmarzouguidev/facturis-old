<?php

declare(strict_types=1);

namespace App\Models\Utilities;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;

    public const INVOICE_TYPE = 'invoice';
    public const DELIVERY_TYPE = 'delivery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'address',
        'postal',
        'city',
        'country',
        'type',
        'is_active',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
