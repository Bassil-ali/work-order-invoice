<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\FilesDataTable;
use Carbon\Carbon;
use App\Models\Files;

use App\Http\Controllers\Validations\FilesControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class FilesController extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:filescontroller_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:filescontroller_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:filescontroller_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:filescontroller_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.40]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(FilesDataTable $files)
            {
               return $files->render('admin.files.index',['title'=>trans('admin.files')]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.files.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(FilesControllerRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['file'] = "";
		  		$files = Files::create($data); 
               if(request()->hasFile('file')){
              $files->file = it()->upload('file','files/'.$files->id);
              $files->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $files,
			]);
			 }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$files =  Files::find($id);
        		return is_null($files) || empty($files)?
        		backWithError(trans("admin.undefinedRecord"),aurl("files")) :
        		view('admin.files.show',[
				    'title'=>trans('admin.show'),
					'files'=>$files
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$files =  Files::find($id);
        		return is_null($files) || empty($files)?
        		backWithError(trans("admin.undefinedRecord"),aurl("files")) :
        		view('admin.files.edit',[
				  'title'=>trans('admin.edit'),
				  'files'=>$files
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new FilesControllerRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(FilesControllerRequest $request,$id)
            {
              // Check Record Exists
              $files =  Files::find($id);
              if(is_null($files) || empty($files)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("files"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('file')){
              it()->delete($files->file);
              $data['file'] = it()->upload('file','files');
               } 
              Files::where('id',$id)->update($data);

              $files = Files::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $files,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$files = Files::find($id);
		if(is_null($files) || empty($files)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("files"));
		}
               		if(!empty($files->file)){
			it()->delete($files->file);		}

		it()->delete('files',$id);
		$files->delete();
		return redirectWithSuccess(aurl("files"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$files = Files::find($id);
				if(is_null($files) || empty($files)){
					return backWithError(trans('admin.undefinedRecord'),aurl("files"));
				}
                    					if(!empty($files->file)){
				  it()->delete($files->file);
				}
				it()->delete('files',$id);
				$files->delete();
			}
			return redirectWithSuccess(aurl("files"),trans('admin.deleted'));
		}else {
			$files = Files::find($data);
			if(is_null($files) || empty($files)){
				return backWithError(trans('admin.undefinedRecord'),aurl("files"));
			}
                    
			if(!empty($files->file)){
			 it()->delete($files->file);
			}			it()->delete('files',$data);
			$files->delete();
			return redirectWithSuccess(aurl("files"),trans('admin.deleted'));
		}
	}
            

}