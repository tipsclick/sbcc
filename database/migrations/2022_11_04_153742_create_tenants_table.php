<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('added_by')->nullable();
            $table->string('floor')->nullable();
            $table->string('office_no')->nullable();
            $table->string('business_name')->nullable();
            $table->string('name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('mobile')->nullable();
            $table->string('service_charges')->nullable();
            $table->string('area')->nullable();
            $table->string('rate')->nullable();
            $table->string('monthly_rent')->nullable();
            $table->string('home_address')->nullable();
            $table->text('details')->nullable();

            $table->timestamp('start_date')->nullable();
            $table->timestamp('revision_date')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->string('office_type')->nullable();
            $table->boolean('is_active')->default(0);

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
        Schema::dropIfExists('tenants');
    }
}
