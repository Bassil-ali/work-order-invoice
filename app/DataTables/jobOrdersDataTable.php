<?php
namespace App\DataTables;
use App\Models\jobOrder;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.40]
// Copyright Reserved [it v 1.6.40]
class jobOrdersDataTable extends DataTable
{
    	

     /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.40]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.joborders.buttons.actions')

            ->addColumn('photo', '<a href="{{ it()->url($photo) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>')

            ->addColumn('Payment_method', '{{ trans("admin.".$Payment_method) }}')

            ->addColumn('type_of_publication', '{{ trans("admin.".$type_of_publication) }}')

            ->addColumn('Measurement', '{{ trans("admin.".$Measurement) }}')

            ->addColumn('Number_of_interior_colors', '{{ trans("admin.".$Number_of_interior_colors) }}')

            ->addColumn('Number_of_colors_Cover_or_commercial', '{{ trans("admin.".$Number_of_colors_Cover_or_commercial) }}')

            ->addColumn('Pallet_measuring_notes', '{{ trans("admin.".$Pallet_measuring_notes) }}')

            ->addColumn('number_type', '{{ trans("admin.".$number_type) }}')

            ->addColumn('fold_the_book', '{{ trans("admin.".$fold_the_book) }}')

            ->addColumn('cover_pallet_measurement', '{{ trans("admin.".$cover_pallet_measurement) }}')

            ->addColumn('cover_pallet_measurement_type', '{{ trans("admin.".$cover_pallet_measurement_type) }}')

            ->addColumn('color_lieutenant', '{{ trans("admin.".$color_lieutenant) }}')

            ->addColumn('cover_color', '{{ trans("admin.".$cover_color) }}')

            ->addColumn('The_heel', '{{ trans("admin.".$The_heel) }}')

            ->addColumn('Slovenia', '{{ trans("admin.".$Slovenia) }}')
            ->addColumn('created_at', '{{ date("Y-m-d H:i:s", strtotime($created_at)) }}')
            ->addColumn('updated_at', '{{ date("Y-m-d H:i:s", strtotime($updated_at)) }}')
            
           

            ->rawColumns(['checkbox', 'actions', 'photo','approve']);
            
    }
  

     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.40]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
        return jobOrder::query()->select("job_orders.*");

    }
    	

    	 /**
	     * Optional method if you want to use html builder.
	     *[it v 1.6.40]
	     * @return \Yajra\Datatables\Html\Builder
	     */
    	public function html()
	    {
	      $html =  $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
               'searching'   => true,
               'paging'   => true,
               'bLengthChange'   => true,
               'bInfo'   => true,
               'responsive'   => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('admin.all_records')]],
                'buttons' => [
                	[
					'extend' => 'reload',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
					],	[
						'text' => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
						'className'    => 'btn btn-outline deleteBtn',
                    ], 	[
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {


            
            ". filterElement('1,3,1,4,1,5,1,6', 'input') . "

            

	            }",
                'order' => [[1, 'desc']],

                    'language' => [
                       'sProcessing' => trans('admin.sProcessing'),
							'sLengthMenu'        => trans('admin.sLengthMenu'),
							'sZeroRecords'       => trans('admin.sZeroRecords'),
							'sEmptyTable'        => trans('admin.sEmptyTable'),
							'sInfo'              => trans('admin.sInfo'),
							'sInfoEmpty'         => trans('admin.sInfoEmpty'),
							'sInfoFiltered'      => trans('admin.sInfoFiltered'),
							'sInfoPostFix'       => trans('admin.sInfoPostFix'),
							'sSearch'            => trans('admin.sSearch'),
							'sUrl'               => trans('admin.sUrl'),
							'sInfoThousands'     => trans('admin.sInfoThousands'),
							'sLoadingRecords'    => trans('admin.sLoadingRecords'),
							'oPaginate'          => [
								'sFirst'            => trans('admin.sFirst'),
								'sLast'             => trans('admin.sLast'),
								'sNext'             => trans('admin.sNext'),
								'sPrevious'         => trans('admin.sPrevious'),
							],
							'oAria'            => [
								'sSortAscending'  => trans('admin.sSortAscending'),
								'sSortDescending' => trans('admin.sSortDescending'),
							],
                    ]
                ]);

        return $html;

	    }

    	

    	/**
	     * Get columns.
	     * Auto getColumns Method By Baboon Script [it v 1.6.40]
	     * @return array
	     */

	    protected function getColumns()
	    {
	        return [
	       	
 [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<div  class="icheck-danger">
                  <input type="checkbox" class="select-all" id="select-all"  onclick="select_all()" >
                  <label for="select-all"></label>
                </div>',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
[
                'name' => 'id',
                'data' => 'id',
                'title' => trans('admin.record_id'),
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
				[
                 'name'=>'photo',
                 'data'=>'photo',
                 'title'=>trans('admin.photo'),
		    ],
				[
                 'name'=>'customer_name',
                 'data'=>'customer_name',
                 'title'=>trans('admin.customer_name'),
		    ],
				[
                 'name'=>'business_name',
                 'data'=>'business_name',
                 'title'=>trans('admin.business_name'),
		    ],
				[
                 'name'=>'day_date',
                 'data'=>'day_date',
                 'title'=>trans('admin.day_date'),
		    ],
				[
                 'name'=>'delivery_date',
                 'data'=>'delivery_date',
                 'title'=>trans('admin.delivery_date'),
		    ],

            [
                'name'=>'approve',
                'data'=>'approve',
                'title'=>trans('admin.approve'),
           ],

         
           
            [
	                'name' => 'created_at',
	                'data' => 'created_at',
	                'title' => trans('admin.created_at'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
	                    [
	                'name' => 'updated_at',
	                'data' => 'updated_at',
	                'title' => trans('admin.updated_at'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
              
              
	                    [
	                'name' => 'actions',
	                'data' => 'actions',
	                'title' => trans('admin.actions'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
    	 ];
			}

	    /**
	     * Get filename for export.
	     * Auto filename Method By Baboon Script
	     * @return string
	     */
	    protected function filename()
	    {
	        return 'joborders_' . time();
	    }
    	
}