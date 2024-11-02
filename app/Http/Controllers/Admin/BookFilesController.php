<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BookFilesDataTable;
use Carbon\Carbon;
use App\Models\BookFiles;

use App\Http\Controllers\Validations\BookFilesControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class BookFilesController extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:bookfilescontroller_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:bookfilescontroller_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:bookfilescontroller_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:bookfilescontroller_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.40]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BookFilesDataTable $bookfiles)
            {
               return $bookfiles->render('admin.bookfiles.index',['title'=>trans('admin.bookfiles')]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.bookfiles.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BookFilesControllerRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['file'] = "";
		  		$bookfiles = BookFiles::create($data); 
               if(request()->hasFile('file')){
              $bookfiles->file = it()->upload('file','bookfiles/'.$bookfiles->id);
              $bookfiles->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $bookfiles,
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
        		$bookfiles =  BookFiles::find($id);
        		return is_null($bookfiles) || empty($bookfiles)?
        		backWithError(trans("admin.undefinedRecord"),aurl("bookfiles")) :
        		view('admin.bookfiles.show',[
				    'title'=>trans('admin.show'),
					'bookfiles'=>$bookfiles
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$bookfiles =  BookFiles::find($id);
        		return is_null($bookfiles) || empty($bookfiles)?
        		backWithError(trans("admin.undefinedRecord"),aurl("bookfiles")) :
        		view('admin.bookfiles.edit',[
				  'title'=>trans('admin.edit'),
				  'bookfiles'=>$bookfiles
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
				foreach (array_keys((new BookFilesControllerRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BookFilesControllerRequest $request,$id)
            {
              // Check Record Exists
              $bookfiles =  BookFiles::find($id);
              if(is_null($bookfiles) || empty($bookfiles)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("bookfiles"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('file')){
              it()->delete($bookfiles->file);
              $data['file'] = it()->upload('file','bookfiles');
               } 
              BookFiles::where('id',$id)->update($data);

              $bookfiles = BookFiles::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $bookfiles,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$bookfiles = BookFiles::find($id);
		if(is_null($bookfiles) || empty($bookfiles)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("bookfiles"));
		}
               		if(!empty($bookfiles->file)){
			it()->delete($bookfiles->file);		}

		it()->delete('bookfiles',$id);
		$bookfiles->delete();
		return redirectWithSuccess(aurl("bookfiles"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$bookfiles = BookFiles::find($id);
				if(is_null($bookfiles) || empty($bookfiles)){
					return backWithError(trans('admin.undefinedRecord'),aurl("bookfiles"));
				}
                    					if(!empty($bookfiles->file)){
				  it()->delete($bookfiles->file);
				}
				it()->delete('bookfiles',$id);
				$bookfiles->delete();
			}
			return redirectWithSuccess(aurl("bookfiles"),trans('admin.deleted'));
		}else {
			$bookfiles = BookFiles::find($data);
			if(is_null($bookfiles) || empty($bookfiles)){
				return backWithError(trans('admin.undefinedRecord'),aurl("bookfiles"));
			}
                    
			if(!empty($bookfiles->file)){
			 it()->delete($bookfiles->file);
			}			it()->delete('bookfiles',$data);
			$bookfiles->delete();
			return redirectWithSuccess(aurl("bookfiles"),trans('admin.deleted'));
		}
	}
            

}