<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\jobeOrder;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\jobeOrdersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class jobeOrdersApi extends Controller{
	protected $selectColumns = [
		"id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.40]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$jobeOrder = jobeOrder::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$jobeOrder]);
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(jobeOrdersRequest $request)
    {
    	$data = $request->except("_token");
    	
        $jobeOrder = jobeOrder::create($data); 

		  $jobeOrder = jobeOrder::with($this->arrWith())->find($jobeOrder->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$jobeOrder
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $jobeOrder = jobeOrder::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($jobeOrder) || empty($jobeOrder)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $jobeOrder
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new jobeOrdersRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(jobeOrdersRequest $request,$id)
            {
            	$jobeOrder = jobeOrder::find($id);
            	if(is_null($jobeOrder) || empty($jobeOrder)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              jobeOrder::where("id",$id)->update($data);

              $jobeOrder = jobeOrder::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $jobeOrder
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $jobeorders = jobeOrder::find($id);
            	if(is_null($jobeorders) || empty($jobeorders)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($jobeorders->photo)){
               it()->delete($jobeorders->photo);
              }
               it()->delete("jobeorder",$id);

               $jobeorders->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $jobeorders = jobeOrder::find($id);
	            	if(is_null($jobeorders) || empty($jobeorders)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($jobeorders->photo)){
                    	it()->delete($jobeorders->photo);
                    	}
                    	it()->delete("jobeorder",$id);
                    	$jobeorders->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $jobeorders = jobeOrder::find($data);
	            	if(is_null($jobeorders) || empty($jobeorders)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($jobeorders->photo)){
                    	it()->delete($jobeorders->photo);
                    	}
                    	it()->delete("jobeorder",$data);

                    $jobeorders->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}