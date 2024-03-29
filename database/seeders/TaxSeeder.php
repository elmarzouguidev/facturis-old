<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Utilities\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $taxes = [
            ['name' => 'TVA', 'taux_percent' => '0%'],
            ['name' => 'TVA', 'taux_percent' => '20%'],
            ['name' => 'TVA', 'taux_percent' => '14%'],
            ['name' => 'TVA', 'taux_percent' => '10%'],
        ];

        foreach ($taxes as $taxe) {
            Tax::create($taxe);
        }
    }
}
