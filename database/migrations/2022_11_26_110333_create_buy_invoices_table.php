<?php

declare(strict_types=1);

use App\Models\Finance\Provider;
use App\Models\Utilities\PaymentMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('buy_invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('code')->nullable();

            $table->foreignIdFor(PaymentMethod::class)->nullable()->constrained()->nullOnDelete();

            $table->foreignIdFor(Provider::class)
                ->nullable()
                ->constrained();

            $table->string('bl_code')->nullable();
            $table->string('bc_code')->nullable();

            $table->unsignedBigInteger('price_ht')->default(0);
            $table->unsignedBigInteger('price_total')->default(0);
            $table->unsignedBigInteger('price_tax')->default(0);

            $table->date('document_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('payment_date')->nullable();

            $table->boolean('is_active')->default(true);

            $table->mediumText('condition_general')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_invoices');
    }
};
