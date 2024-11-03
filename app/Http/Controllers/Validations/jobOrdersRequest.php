<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class jobOrdersRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.40]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.40]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'photo'=>'required',
             'customer_name'=>'required',
             'business_name'=>'required',
             'day_date'=>'required',
             'delivery_date'=>'required',
             'Price'=>'',
             'comments'=>'',
             'Payment_method'=>'required|in:Bank Card,Electronic Transfer,Receivables Checks,Receivables Account,Cash Instant Check',
             'type_of_publication'=>'required|in:Book,Other',
             'number_of_pages'=>'',
             'other'=>'',
             'Measurement'=>'required|in:Educational Offer Size 28x21,Commercial Size 28x20.5,Special Size',
             'Special_Size'=>'',
             'Quantity_in_numbers'=>'required',
             'Quantity_Writing'=>'required',
             'Number_of_interior_colors'=>'required|in:K,Y,M,C,CMYK',
             'Number_of_colors_Cover_or_commercial'=>'',
             'notes'=>'',
             'The_notebook_is_the_type_of_internal_paper'=>'',
             'Pallet_measuring_notes'=>'required|in:70x100,50x70',
             'Lieutenant_number'=>'required',
             'number_type'=>'required|in:Quarter of a notebook,Half binding',
             'fold_the_book'=>'required|in:32,16,8,4',
             'Lieutenant_notes'=>'',
             'Lieutenant_Prepared_by'=>'',
             'Paper_type'=>'required',
             'cover_pallet_measurement'=>'required|in:0x70,70x50',
             'cover_pallet_measurement_type'=>'required|in:face,Two faces',
             'cover_notes'=>'',
             'cover_created_by'=>'',
             'color_lieutenant'=>'required|in:8 Color 70x100,4 Color 70x100,50x70',
             'lieutenant_text'=>'',
             'cover_color'=>'required|in:4 Color 70x100,50x70',
             'Book_cover_text'=>'',
             'Printing_digital_ctreated_by'=>'required',
             'The_heel'=>'required|in:Horse,tailoring,brush',
             'Slovenia'=>'required|in:shiny,matte',
             'Slovenia_text'=>'',
             'after_printing'=>'',
             'approve' => ''
		];
	}

	protected function onUpdate() {
		return [
             'photo'=>'',
             'customer_name'=>'required',
             'business_name'=>'required',
             'day_date'=>'required',
             'delivery_date'=>'required',
             'Price'=>'',
             'comments'=>'',
             'Payment_method'=>'required|in:Bank Card,Electronic Transfer,Receivables Checks,Receivables Account,Cash Instant Check',
             'type_of_publication'=>'required|in:Book,Other',
             'number_of_pages'=>'',
             'other'=>'',
             'Measurement'=>'required|in:Educational Offer Size 28x21,Commercial Size 28x20.5,Special Size',
             'Special_Size'=>'',
             'Quantity_in_numbers'=>'required',
             'Quantity_Writing'=>'required',
             'Number_of_interior_colors'=>'required|in:K,Y,M,C,CMYK',
             'Number_of_colors_Cover_or_commercial'=>'',
             'notes'=>'',
             'The_notebook_is_the_type_of_internal_paper'=>'',
             'Pallet_measuring_notes'=>'required|in:70x100,50x70',
             'Lieutenant_number'=>'required',
             'number_type'=>'required|in:Quarter of a notebook,Half binding',
             'fold_the_book'=>'required|in:32,16,8,4',
             'Lieutenant_notes'=>'',
             'Lieutenant_Prepared_by'=>'',
             'Paper_type'=>'required',
             'cover_pallet_measurement'=>'required|in:0x70,70x50',
             'cover_pallet_measurement_type'=>'required|in:face,Two faces',
             'cover_notes'=>'',
             'cover_created_by'=>'',
             'color_lieutenant'=>'required|in:8 Color 70x100,4 Color 70x100,50x70',
             'lieutenant_text'=>'',
             'cover_color'=>'required|in:4 Color 70x100,50x70',
             'Book_cover_text'=>'',
             'Printing_digital_ctreated_by'=>'required',
             'The_heel'=>'required|in:Horse,tailoring,brush',
             'Slovenia'=>'required|in:shiny,matte',
             'Slovenia_text'=>'',
             'after_printing'=>'',
             'approve' => ''
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.40]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'photo'=>trans('admin.photo'),
             'customer_name'=>trans('admin.customer_name'),
             'business_name'=>trans('admin.business_name'),
             'day_date'=>trans('admin.day_date'),
             'delivery_date'=>trans('admin.delivery_date'),
             'Price'=>trans('admin.Price'),
             'comments'=>trans('admin.comments'),
             'Payment_method'=>trans('admin.Payment_method'),
             'type_of_publication'=>trans('admin.type_of_publication'),
             'number_of_pages'=>trans('admin.number_of_pages'),
             'other'=>trans('admin.other'),
             'Measurement'=>trans('admin.Measurement'),
             'Special_Size'=>trans('admin.Special_Size'),
             'Quantity_in_numbers'=>trans('admin.Quantity_in_numbers'),
             'Quantity_Writing'=>trans('admin.Quantity_Writing'),
             'Number_of_interior_colors'=>trans('admin.Number_of_interior_colors'),
             'Number_of_colors_Cover_or_commercial'=>trans('admin.Number_of_colors_Cover_or_commercial'),
             'notes'=>trans('admin.notes'),
             'The_notebook_is_the_type_of_internal_paper'=>trans('admin.The_notebook_is_the_type_of_internal_paper'),
             'Pallet_measuring_notes'=>trans('admin.Pallet_measuring_notes'),
             'Lieutenant_number'=>trans('admin.Lieutenant_number'),
             'number_type'=>trans('admin.number_type'),
             'fold_the_book'=>trans('admin.fold_the_book'),
             'Lieutenant_notes'=>trans('admin.Lieutenant_notes'),
             'Lieutenant_Prepared_by'=>trans('admin.Lieutenant_Prepared_by'),
             'Paper_type'=>trans('admin.Paper_type'),
             'cover_pallet_measurement'=>trans('admin.cover_pallet_measurement'),
             'cover_pallet_measurement_type'=>trans('admin.cover_pallet_measurement_type'),
             'cover_notes'=>trans('admin.cover_notes'),
             'cover_created_by'=>trans('admin.cover_created_by'),
             'color_lieutenant'=>trans('admin.color_lieutenant'),
             'lieutenant_text'=>trans('admin.lieutenant_text'),
             'cover_color'=>trans('admin.cover_color'),
             'Book_cover_text'=>trans('admin.Book_cover_text'),
             'Printing_digital_ctreated_by'=>trans('admin.Printing_digital_ctreated_by'),
             'The_heel'=>trans('admin.The_heel'),
             'Slovenia'=>trans('admin.Slovenia'),
             'Slovenia_text'=>trans('admin.Slovenia_text'),
             'after_printing'=>trans('admin.after_printing'),
             'approve' =>trans('admin.approve'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.40]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}