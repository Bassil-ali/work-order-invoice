<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\UserRoleDataTable;
use Carbon\Carbon;
use App\Models\UserRoles;

use App\Http\Controllers\Validations\UserRoleRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class UserRole extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:userrole_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:userrole_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:userrole_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:userrole_delete', [
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
            public function store(UserRoleRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
		  		$userrole = UserRoles::create($data); 
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
        		$userrole =  UserRoles::find($id);
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
        		$userrole =  UserRoles::find($id);
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
				foreach (array_keys((new UserRoleRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(UserRoleRequest $request,$id)
            {
              // Check Record Exists
              $userrole =  UserRoles::find($id);
              if(is_null($userrole) || empty($userrole)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("userrole"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              UserRoles::where('id',$id)->update($data);
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
		$userrole = UserRoles::find($id);
		if(is_null($userrole) || empty($userrole)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("userrole"));
		}
               
		it()->delete('userroles',$id);
		$userrole->delete();
		return redirectWithSuccess(aurl("userrole"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$userrole = UserRoles::find($id);
				if(is_null($userrole) || empty($userrole)){
					return backWithError(trans('admin.undefinedRecord'),aurl("userrole"));
				}
                    	
				it()->delete('userroles',$id);
				$userrole->delete();
			}
			return redirectWithSuccess(aurl("userrole"),trans('admin.deleted'));
		}else {
			$userrole = UserRoles::find($data);
			if(is_null($userrole) || empty($userrole)){
				return backWithError(trans('admin.undefinedRecord'),aurl("userrole"));
			}
                    
			it()->delete('userroles',$data);
			$userrole->delete();
			return redirectWithSuccess(aurl("userrole"),trans('admin.deleted'));
		}
	}
            

}