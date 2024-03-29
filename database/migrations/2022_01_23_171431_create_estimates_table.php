<?php

use App\Models\Client;
use App\Models\Finance\Invoice;
use App\Models\Utilities\PaymentMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignIdFor(Client::class)->nullable()->index()->constrained()->nullOnDelete();
            $table->foreignIdFor(Invoice::class)->nullable()->constrained();
            $table->foreignIdFor(PaymentMethod::class)->nullable()->index()->constrained()->nullOnDelete();

            $table->string('code');
            $table->string('full_number')->unique();

            $table->unsignedBigInteger('price_ht')->default(0);
            $table->unsignedBigInteger('price_total')->default(0);
            $table->unsignedBigInteger('price_tax')->default(0);

            $table->integer('status')->default(\App\Constants\Response::DEVIS_EN_ATTENTE);

            $table->date('document_date')->nullable();
            $table->date('due_date')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_invoiced')->default(false);
            $table->boolean('is_send')->default(false);

            $table->longText('admin_notes')->nullable();
            $table->longText('client_notes')->nullable();
            $table->longText('condition_general')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimates');
    }
}
