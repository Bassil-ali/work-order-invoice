<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\jobOrdersDataTable;
use Carbon\Carbon;
use App\Models\jobOrder;
use App\Models\UserRole;
use Illuminate\Http\Request;

use App\Http\Controllers\Validations\jobOrdersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class jobOrders extends Controller
{

  public function __construct()
  {

    $this->middleware('AdminRole:joborders_show', [
      'only' => ['index', 'show'],
    ]);
    $this->middleware('AdminRole:joborders_add', [
      'only' => ['create', 'store'],
    ]);
    $this->middleware('AdminRole:joborders_edit', [
      'only' => ['edit', 'update'],
    ]);
    $this->middleware('AdminRole:joborders_delete', [
      'only' => ['destroy', 'multi_delete'],
    ]);
  }



  /**
   * Baboon Script By [it v 1.6.40]
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   */
  public function index(jobOrdersDataTable $joborders)
  {
    return $joborders->render('admin.joborders.index', ['title' => trans('admin.joborders')]);
  }


  /**
   * Baboon Script By [it v 1.6.40]
   * Show the form for creating a new resource.
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    return view('admin.joborders.create', ['title' => trans('admin.create')]);
  }

  /**
   * Baboon Script By [it v 1.6.40]
   * Store a newly created resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response Or Redirect
   */
  public function store(jobOrdersRequest $request)
  {
    $data = $request->except("_token", "_method");
    $data['photo'] = "";
    $data['day_date'] = date('Y-m-d H:i', strtotime(request('day_date')));
    $data['delivery_date'] = date('Y-m-d H:i', strtotime(request('delivery_date')));
    $data['admin_id'] = admin()->id();
    $joborders = jobOrder::create($data);
    if (request()->hasFile('photo')) {
      $joborders->photo = it()->upload('photo', 'joborders/' . $joborders->id);
      $joborders->save();
    }
    $redirect = isset($request["add_back"]) ? "/create" : "";
    return redirectWithSuccess(aurl('joborders' . $redirect), trans('admin.added'));
  }

  /**
   * Display the specified resource.
   * Baboon Script By [it v 1.6.40]
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $joborders = jobOrder::find($id);

    return is_null($joborders) || empty($joborders) ?
      backWithError(trans("admin.undefinedRecord"), aurl("joborders")) :
      view('admin.joborders.show', [
        'title' => trans('admin.show'),
        'joborders' => $joborders
      ]);
  }


  /**
   * Baboon Script By [it v 1.6.40]
   * edit the form for creating a new resource.
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $joborders = jobOrder::find($id);

    $userRole = UserRole::where('user_name', admin()->id())->first();
    
    if($userRole == null){
      $userRole = 'not_found';
    }
    // dd($userRole);
    return is_null($joborders) || empty($joborders) ?
      backWithError(trans("admin.undefinedRecord"), aurl("joborders")) :
      view('admin.joborders.edit', [
        'title' => trans('admin.edit'),
        'joborders' => $joborders,
        'userRole' => $userRole
      ]);
  }

  /**
   * Baboon Script By [it v 1.6.40]
   * update a newly created resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function updateFillableColumns()
  {
    $fillableCols = [];
    foreach (array_keys((new jobOrdersRequest)->attributes()) as $fillableUpdate) {
      if (!is_null(request($fillableUpdate))) {
        $fillableCols[$fillableUpdate] = request($fillableUpdate);
      }
    }
    return $fillableCols;
  }

  public function update(jobOrdersRequest $request, $id)
  {
    // Check Record Exists
    $joborders = jobOrder::find($id);
    if (is_null($joborders) || empty($joborders)) {
      return backWithError(trans("admin.undefinedRecord"), aurl("joborders"));
    }
    $data = $this->updateFillableColumns();
    $data['admin_id'] = admin()->id();
    if (request()->hasFile('photo')) {
      it()->delete($joborders->photo);
      $data['photo'] = it()->upload('photo', 'joborders');
    }
    $data['day_date'] = date('Y-m-d H:i', strtotime(request('day_date')));
    $data['delivery_date'] = date('Y-m-d H:i', strtotime(request('delivery_date')));
    jobOrder::where('id', $id)->update($data);
    $redirect = isset($request["save_back"]) ? "/" . $id . "/edit" : "";
    return redirectWithSuccess(aurl('joborders' . $redirect), trans('admin.updated'));
  }

  /**
   * Baboon Script By [it v 1.6.40]
   * destroy a newly created resource in storage.
   * @param  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $joborders = jobOrder::find($id);
    if (is_null($joborders) || empty($joborders)) {
      return backWithSuccess(trans('admin.undefinedRecord'), aurl("joborders"));
    }
    if (!empty($joborders->photo)) {
      it()->delete($joborders->photo);
    }

    it()->delete('joborder', $id);
    $joborders->delete();
    return redirectWithSuccess(aurl("joborders"), trans('admin.deleted'));
  }


  public function multi_delete()
  {
    $data = request('selected_data');
    if (is_array($data)) {
      foreach ($data as $id) {
        $joborders = jobOrder::find($id);
        if (is_null($joborders) || empty($joborders)) {
          return backWithError(trans('admin.undefinedRecord'), aurl("joborders"));
        }
        if (!empty($joborders->photo)) {
          it()->delete($joborders->photo);
        }
        it()->delete('joborder', $id);
        $joborders->delete();
      }
      return redirectWithSuccess(aurl("joborders"), trans('admin.deleted'));
    } else {
      $joborders = jobOrder::find($data);
      if (is_null($joborders) || empty($joborders)) {
        return backWithError(trans('admin.undefinedRecord'), aurl("joborders"));
      }

      if (!empty($joborders->photo)) {
        it()->delete($joborders->photo);
      }
      it()->delete('joborder', $data);
      $joborders->delete();
      return redirectWithSuccess(aurl("joborders"), trans('admin.deleted'));
    }
  }

  public function approveJobOrder(Request $request)
  {

    $jobOrder = JobOrder::find($request->job_order_id);
    $jobOrder->approve = $request->approve;
    $jobOrder->save();

    return response()->json(['message' => 'Job order approval status updated successfully.']);
  }

  public function print($id)
  {
    $jobOrder = jobOrder::find($id);
    //dd($joborders);
    $userRole = UserRole::where('user_name', admin()->id())->first();
    return view('admin.joborders.print', ['jobOrder' => $jobOrder,'userRole'=> $userRole]);

  }



}