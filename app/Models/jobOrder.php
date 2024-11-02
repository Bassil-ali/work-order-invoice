<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class jobOrder extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'job_orders';
protected $fillable = [
		'id',
		'admin_id',
        'photo',
        'customer_name',
        'business_name',
        'day_date',
        'delivery_date',
        'Price',
        'comments',
        'Payment_method',

        'type_of_publication',

        'number_of_pages',
        'other',
        'Measurement',

        'Special_Size',
        'Quantity_in_numbers',
        'Quantity_Writing',
        'Number_of_interior_colors',

        'Number_of_colors_Cover_or_commercial',

        'notes',
        'The_notebook_is_the_type_of_internal_paper',
        'Pallet_measuring_notes',

        'Lieutenant_number',
        'number_type',

        'fold_the_book',

        'Lieutenant_notes',
        'Lieutenant_Prepared_by',
        'Paper_type',
        'cover_pallet_measurement',

        'cover_pallet_measurement_type',

        'cover_notes',
        'cover_created_by',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
   public function admin_id() {
	   return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
   }
	

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($joborder) {
         });
   }
		
}
