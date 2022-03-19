<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcessedCommentsTableDropForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('processed_comments', function (Blueprint $table) {
            $table->dropForeign('processed_comments_comment_id_foreign');
        });
        // Schema::table('processed_products', function (Blueprint $table) {
        //     $table->dropForeign('processed_products_product_id_foreign');
        // });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('processed_comments', function (Blueprint $table) {
            $table->foreign('comment_id')->references('id')->on('comments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // Schema::dropForeign('processed_products_product_id_foreign');
        });
        // Schema::table('processed_products', function (Blueprint $table) {
        //     $table->foreign('product_id')->references('id')->on('products')
        //         ->onUpdate('cascade')
        //         ->onDelete('cascade');
          
        // });
        // Schema::dropIfExists('processed_comments');

    }
}
