<?php

use App\Models\Catalog\Category;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignIdFor(Category::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->string('code')->unique()->nullable();

            $table->string('entreprise', 100);

            $table->string('contact', 50)->nullable();
            $table->string('telephone', 50)->unique();
            $table->string('fax', 50)->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('website')->unique()->nullable();

            $table->string('rc', 20)->unique()->nullable();
            $table->string('ice', 40)->unique()->nullable();
            $table->string('logo')->nullable();
            $table->longText('details')->nullable();

            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('clients');
    }
}
