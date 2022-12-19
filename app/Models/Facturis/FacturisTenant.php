<?php

namespace App\Models\Facturis;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class FacturisTenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
}
