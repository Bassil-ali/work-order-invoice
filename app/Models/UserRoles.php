<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class UserRoles extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'user_roles';
protected $fillable = [
		'id',
		'admin_id',
        'user_name',

        'user_role',

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
    * user_name relation method
    * @param void
    * @return object data
    */
   public function user_name(){
      return $this->hasOne(\App\Models\Admin::class,'id','user_name');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($userroles) {
			//$userroles->user_name()->delete();
         });
   }
		
}
