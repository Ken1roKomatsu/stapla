<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// HACK: ユニークにするためにクラス名が長め
class AddNullableToTaskDeliveryFormatInPurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->string('task_delivery_format')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->string('task_delivery_format')->nullable(false)->change();
        });
    }
}