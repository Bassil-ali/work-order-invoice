<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookFiles;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\BookFilesControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class BookFilesControllerApi extends Controller{
	protected $selectColumns = [
		"id",
		"file",
		"file_name",
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
            	$BookFiles = BookFiles::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$BookFiles]);
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(BookFilesControllerRequest $request)
    {
    	$data = $request->except("_token");
    	
                $data["file"] = "";
        $BookFiles = BookFiles::create($data); 
               if(request()->hasFile("file")){
              $BookFiles->file = it()->upload("file","bookfiles/".$BookFiles->id);
              $BookFiles->save();
              }

		  $BookFiles = BookFiles::with($this->arrWith())->find($BookFiles->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$BookFiles
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
                $BookFiles = BookFiles::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($BookFiles) || empty($BookFiles)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $BookFiles
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new BookFilesControllerRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(BookFilesControllerRequest $request,$id)
            {
            	$BookFiles = BookFiles::find($id);
            	if(is_null($BookFiles) || empty($BookFiles)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile("file")){
              it()->delete($BookFiles->file);
              $data["file"] = it()->upload("file","bookfiles/".$BookFiles->id);
               }
              BookFiles::where("id",$id)->update($data);

              $BookFiles = BookFiles::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $BookFiles
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $bookfiles = BookFiles::find($id);
            	if(is_null($bookfiles) || empty($bookfiles)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($bookfiles->file)){
               it()->delete($bookfiles->file);
              }
               it()->delete("bookfiles",$id);

               $bookfiles->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $bookfiles = BookFiles::find($id);
	            	if(is_null($bookfiles) || empty($bookfiles)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($bookfiles->file)){
                    	it()->delete($bookfiles->file);
                    	}
                    	it()->delete("bookfiles",$id);
                    	$bookfiles->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $bookfiles = BookFiles::find($data);
	            	if(is_null($bookfiles) || empty($bookfiles)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($bookfiles->file)){
                    	it()->delete($bookfiles->file);
                    	}
                    	it()->delete("bookfiles",$data);

                    $bookfiles->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}