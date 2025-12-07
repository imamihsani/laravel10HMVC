<?php
// database/migrations/[timestamp]_create_permissions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('module_name');       // Nama modul (e.g. Sales)
            $table->string('controller_name');   // Nama controller (e.g. Order)
            $table->string('method_name');       // Nama method (e.g. index)
            $table->string('name')->unique();    // Format: module.controller.method (e.g. sales.order.index)
            $table->string('display_name');      // Nama yang ditampilkan (e.g. Sales - Order - Index)
            $table->string('route');             // Route (e.g. sales/order/index)
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
