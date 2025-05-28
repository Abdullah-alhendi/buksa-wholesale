<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('cart_items', function (Blueprint $table) {
        $table->boolean('is_wholesale')->default(false)->after('quantity');
        $table->decimal('price', 10, 2)->default(0)->after('is_wholesale');
    });
}

public function down()
{
    Schema::table('cart_items', function (Blueprint $table) {
        $table->dropColumn('is_wholesale');
        $table->dropColumn('price');
    });
}

};
