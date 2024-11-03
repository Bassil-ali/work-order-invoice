<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\UserRoleDataTable;
use Carbon\Carbon;
use App\Models\UserRole;

use App\Http\Controllers\Validations\UserRoleControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class UserRoleController extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:userrolecontroller_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:userrolecontroller_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:userrolecontroller_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:userrolecontroller_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.40]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(UserRoleDataTable $userrole)
            {
               return $userrole->render('admin.userrole.index',['title'=>trans('admin.userrole')]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.userrole.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(UserRoleControllerRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$userrole = UserRole::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('userrole'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$userrole =  UserRole::find($id);
        		return is_null($userrole) || empty($userrole)?
        		backWithError(trans("admin.undefinedRecord"),aurl("userrole")) :
        		view('admin.userrole.show',[
				    'title'=>trans('admin.show'),
					'userrole'=>$userrole
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$userrole =  UserRole::find($id);
        		return is_null($userrole) || empty($userrole)?
        		backWithError(trans("admin.undefinedRecord"),aurl("userrole")) :
        		view('admin.userrole.edit',[
				  'title'=>trans('admin.edit'),
				  'userrole'=>$userrole
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
				foreach (array_keys((new UserRoleControllerRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(UserRoleControllerRequest $request,$id)
            {
              // Check Record Exists
              $userrole =  UserRole::find($id);
              if(is_null($userrole) || empty($userrole)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("userrole"));
              }
              $data = $this->updateFillableColumns(); 
              UserRole::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('userrole'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$userrole = UserRole::find($id);
		if(is_null($userrole) || empty($userrole)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("userrole"));
		}
               
		it()->delete('userrole',$id);
		$userrole->delete();
		return redirectWithSuccess(aurl("userrole"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$userrole = UserRole::find($id);
				if(is_null($userrole) || empty($userrole)){
					return backWithError(trans('admin.undefinedRecord'),aurl("userrole"));
				}
                    	
				it()->delete('userrole',$id);
				$userrole->delete();
			}
			return redirectWithSuccess(aurl("userrole"),trans('admin.deleted'));
		}else {
			$userrole = UserRole::find($data);
			if(is_null($userrole) || empty($userrole)){
				return backWithError(trans('admin.undefinedRecord'),aurl("userrole"));
			}
                    
			it()->delete('userrole',$data);
			$userrole->delete();
			return redirectWithSuccess(aurl("userrole"),trans('admin.deleted'));
		}
	}
            

}