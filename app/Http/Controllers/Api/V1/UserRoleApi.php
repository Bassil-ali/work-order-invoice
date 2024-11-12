<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserRoles;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\UserRoleRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class UserRoleApi extends Controller{
	protected $selectColumns = [
		"id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.40]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['user_name',];
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$UserRoles = UserRoles::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$UserRoles]);
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(UserRoleRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
        $UserRoles = UserRoles::create($data); 

		  $UserRoles = UserRoles::with($this->arrWith())->find($UserRoles->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$UserRoles
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
                $UserRoles = UserRoles::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($UserRoles) || empty($UserRoles)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $UserRoles
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new UserRoleRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(UserRoleRequest $request,$id)
            {
            	$UserRoles = UserRoles::find($id);
            	if(is_null($UserRoles) || empty($UserRoles)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
              UserRoles::where("id",$id)->update($data);

              $UserRoles = UserRoles::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $UserRoles
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $userrole = UserRoles::find($id);
            	if(is_null($userrole) || empty($userrole)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("userroles",$id);

               $userrole->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $userrole = UserRoles::find($id);
	            	if(is_null($userrole) || empty($userrole)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("userroles",$id);
                    	$userrole->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $userrole = UserRoles::find($data);
	            	if(is_null($userrole) || empty($userrole)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("userroles",$data);

                    $userrole->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}