<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_files', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('file_date')->nullable();
            $table->boolean('is_active')->default(0);
            $table->unsignedInteger('tenant_id')->nullable();
            $table->unsignedInteger('added_by')->nullable();
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
        Schema::dropIfExists('tenant_files');
    }
};
