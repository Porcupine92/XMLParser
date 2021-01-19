<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_name');
            $table->integer('prod_id')->unique();
            $table->float('prod_price');
            $table->float('prod_tax_id');
            $table->integer('taxpercent');
            $table->float('prod_oldprice')->nullable();
            $table->float('prod_buy_price_net')->nullable();
            $table->decimal('prod_amount', 10, 4);
            $table->integer('prod_hidden')->default(0);
            $table->string('prod_symbol');
            $table->float('prod_weight');
            $table->string('prd_name');
            $table->string('prod_pkwiu')->nullable();
            $table->string('prod_ean');
            $table->string('prod_isbn')->nullable();
            $table->string('prod_barcode')->nullable();
            $table->string('prod_ship_days')->nullable();
            $table->text('prod_desc')->nullable();
            $table->text('prod_shortdesc')->nullable();
            $table->string('prod_info1_pl')->nullable();
            $table->string('prod_info2_pl')->nullable();
            $table->string('prod_info3_pl')->nullable();
            $table->string('prod_info4_pl')->nullable();
            $table->string('prod_info5_pl')->nullable();
            $table->string('prod_note')->nullable();
            $table->string('prod_seotitle_pl')->nullable();
            $table->string('prod_seodesc_pl')->nullable();
            $table->string('prod_keywords_pl')->nullable();
            $table->string('prod_sales_gain')->nullable();
            $table->string('prod_link');
            $table->float('prod_price_base');
            $table->float('prod_price_net_base');
            $table->float('prod_price_net');
            $table->string('cat_path');
            $table->text('prod_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
