<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class CreatejobOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
$table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
            $table->string('photo');
            $table->string('customer_name');
            $table->string('business_name');
            $table->dateTime('day_date');
            $table->dateTime('delivery_date');
            $table->string('Price')->nullable();
            $table->string('comments')->nullable();
            $table->enum('Payment_method',['Bank Card','Electronic Transfer','Receivables Checks','Receivables Account','Cash Instant Check']);
            $table->enum('type_of_publication',['Book','Other']);
            $table->string('number_of_pages')->nullable();
            $table->string('other')->nullable();
            $table->enum('Measurement',['Bank Card','Electronic Transfer','Receivables (Checks)','Receivables (Account)','Cash (Instant Check)']);
            $table->string('Special_Size')->nullable();
            $table->string('Quantity_in_numbers');
            $table->string('Quantity_Writing');
            $table->enum('Number_of_interior_colors',['K','Y','M','C','CMYK']);
            $table->enum('Number_of_colors_Cover_or_commercial',['K','Y','M','C','CMYK'])->nullable();
            $table->string('notes')->nullable();
            $table->string('The_notebook_is_the_type_of_internal_paper')->nullable();
            $table->enum('Pallet_measuring_notes',['70x100','50x70']);
            $table->string('Lieutenant_number');
            $table->enum('number_type',['Quarter of a notebook','Half binding']);
            $table->enum('fold_the_book',['32','16','8','4']);
            $table->string('Lieutenant_notes')->nullable();
            $table->string('Lieutenant_Prepared_by')->nullable();
            $table->string('Paper_type');
            $table->enum('cover_pallet_measurement',['0x70','70x50']);
            $table->enum('cover_pallet_measurement_type',['face','Two faces']);
            $table->string('cover_notes')->nullable();
            $table->string('cover_created_by')->nullable();
			$table->softDeletes();
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
        Schema::dropIfExists('job_orders');
    }
}