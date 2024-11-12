<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BookFileDataTable;
use Carbon\Carbon;
use App\Models\BookFiles;

use App\Http\Controllers\Validations\BookFileRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class BookFile extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:bookfile_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:bookfile_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:bookfile_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:bookfile_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.40]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BookFileDataTable $bookfile)
            {
               return $bookfile->render('admin.bookfile.index',['title'=>trans('admin.bookfile')]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.bookfile.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BookFileRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['file'] = "";
$data['admin_id'] = admin()->id(); 
		  		$bookfile = BookFiles::create($data); 
               if(request()->hasFile('file')){
              $bookfile->file = it()->upload('file','bookfile/'.$bookfile->id);
              $bookfile->save();
              }
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('bookfile'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$bookfile =  BookFiles::find($id);
        		return is_null($bookfile) || empty($bookfile)?
        		backWithError(trans("admin.undefinedRecord"),aurl("bookfile")) :
        		view('admin.bookfile.show',[
				    'title'=>trans('admin.show'),
					'bookfile'=>$bookfile
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$bookfile =  BookFiles::find($id);
        		return is_null($bookfile) || empty($bookfile)?
        		backWithError(trans("admin.undefinedRecord"),aurl("bookfile")) :
        		view('admin.bookfile.edit',[
				  'title'=>trans('admin.edit'),
				  'bookfile'=>$bookfile
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
				foreach (array_keys((new BookFileRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BookFileRequest $request,$id)
            {
              // Check Record Exists
              $bookfile =  BookFiles::find($id);
              if(is_null($bookfile) || empty($bookfile)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("bookfile"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
               if(request()->hasFile('file')){
              it()->delete($bookfile->file);
              $data['file'] = it()->upload('file','bookfile');
               } 
              BookFiles::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('bookfile'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$bookfile = BookFiles::find($id);
		if(is_null($bookfile) || empty($bookfile)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("bookfile"));
		}
               		if(!empty($bookfile->file)){
			it()->delete($bookfile->file);		}

		it()->delete('bookfiles',$id);
		$bookfile->delete();
		return redirectWithSuccess(aurl("bookfile"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$bookfile = BookFiles::find($id);
				if(is_null($bookfile) || empty($bookfile)){
					return backWithError(trans('admin.undefinedRecord'),aurl("bookfile"));
				}
                    					if(!empty($bookfile->file)){
				  it()->delete($bookfile->file);
				}
				it()->delete('bookfiles',$id);
				$bookfile->delete();
			}
			return redirectWithSuccess(aurl("bookfile"),trans('admin.deleted'));
		}else {
			$bookfile = BookFiles::find($data);
			if(is_null($bookfile) || empty($bookfile)){
				return backWithError(trans('admin.undefinedRecord'),aurl("bookfile"));
			}
                    
			if(!empty($bookfile->file)){
			 it()->delete($bookfile->file);
			}			it()->delete('bookfiles',$data);
			$bookfile->delete();
			return redirectWithSuccess(aurl("bookfile"),trans('admin.deleted'));
		}
	}
            

}