<?php

namespace App\Http\Controllers\Rota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rota, App\User, App\RotaShift, App\RotaAssignEmployee,App\LeaveType, App\Staffleaves ; 
use Session, DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('welcome');
        $leave['sickness'] = Staffleaves::where('is_deleted', 1 )->where('leave_status', 1)->where('leave_type', 2)->where('user_id', 15)->count();
        $leave['lateness'] = Staffleaves::where('is_deleted', 1 )->where('leave_status', 1)->where('leave_type', 3)->where('user_id', 15)->count();

        $date_min_three = Carbon::parse('Now -3 days')->format('Y-m-d');
        $leave['total_leave_min_three'] =  Staffleaves::where('start_date', '<=', $date_min_three)->where('end_date', '>=', $date_min_three)->where('is_deleted', 1)->where('leave_status', 1)->orWhere('start_date', '=', $date_min_three)->count();

        $date_min_two = Carbon::parse('Now -2 days')->format('Y-m-d');
        $leave['total_leave_min_two'] =  Staffleaves::where('start_date', '<=', $date_min_two)->where('end_date', '>=', $date_min_two)->where('is_deleted', 1)->orWhere('start_date', '=', $date_min_two)->where('leave_status', 1)->count();

        $date_min_one = Carbon::parse('Now -1 days')->format('Y-m-d');
        $leave['total_leave_min_one'] =  Staffleaves::where('start_date', '<=', $date_min_one)->where('end_date', '>=', $date_min_one)->where('is_deleted', 1)->orWhere('start_date', '=', $date_min_one)->where('leave_status', 1)->count();

        $date_current = Carbon::now()->format('Y-m-d');
        $leave['total_leave_current'] =  Staffleaves::where('start_date', '<=', $date_current)->where('end_date', '>=', $date_current)->where('is_deleted', 1)->where('leave_status', 1)->orWhere('start_date', '=', $date_current)->count();

        $date_plus_one = Carbon::parse('Now +1 days')->format('Y-m-d');
        $leave['total_leave_plus_one'] =  Staffleaves::where('start_date', '<=', $date_plus_one)->where('end_date', '>=', $date_plus_one)->where('is_deleted', 1)->orWhere('start_date', '=', $date_plus_one)->where('leave_status', 1)->count();

        $date_plus_two = Carbon::parse('Now +2 days')->format('Y-m-d');
        $leave['total_leave_plus_two'] =  Staffleaves::where('start_date', '<=', $date_plus_two)->where('end_date', '>=', $date_plus_two)->where('is_deleted', 1)->orWhere('start_date', '=', $date_plus_two)->where('leave_status', 1)->count();

        $date_plus_three = Carbon::parse('Now +3 days')->format('Y-m-d');
        $leave['total_leave_plus_three'] =  Staffleaves::where('start_date', '<=', $date_plus_three)->where('end_date', '>=', $date_plus_three)->where('is_deleted', 1)->orWhere('start_date', '=', $date_plus_three)->where('leave_status', 1)->count();

        
        return view('rotaStaff.StaffDashboard', ['sidebar' => 'dashborad'], $leave);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_month =  Carbon::now()->format('m');
        $current_year = Carbon::now()->format('Y');

        $previous_month_data = Carbon::now()->endOfMonth()->subMonth()->toDateString();
        $priormonth = date ('m', strtotime ( '-1 month' , strtotime ( $previous_month_data )));
        $prioryear = date('Y', strtotime($previous_month_data));

        $rota = Rota::where('deleted_status', 1)->get(); 
        $arr = array();
        $active_publish_rota= 0;
        $active_unpublish_rota= 0;
        $old_publish_rota = 0;
        $old_unpublish_rota = 0;
        $old = array();
        foreach($rota as $rotas){
            $convert_date = strtotime($rotas->created_at);
            $month = date('m',$convert_date);
            $year = date('Y',$convert_date);
            if($current_year == $year){
                if( $current_month == $month){
                    $arr[] = $rotas;
                    if($rotas->status === 1){
                        $active_publish_rota++;
                    } if($rotas->status === 0) {
                        $active_unpublish_rota++;
                    }
                }
            }
            if($prioryear == $year){
                if( $priormonth == $month){
                    $old[] = $rotas;
                    if($rotas->status === 1){
                        $old_publish_rota++;
                    } if($rotas->status === 0) {
                        $old_unpublish_rota++;
                    }
                }
            }
           
        }         
        $data['active_rota'] =  $arr;
        $data['old_rota'] =  $old; 
        $data['sidebar'] = 'rota';
        $data['active_publish_rota_count'] = $active_publish_rota;
        $data['active_unpublish_rota_count'] = $active_unpublish_rota;
        $data['old_publish_rota_count'] = $old_publish_rota;
        $data['old_unpublish_rota_count'] = $old_unpublish_rota;
      
        return view('rotaStaff.rotaView', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rota_name = $request->rota_name;
        // Rota::where('rota_name', $request->)->get();
        $date = $request->start_date;
        $date = strtotime($date);
        $last_date = $request->rotaPeriodLength-1;
        $date = strtotime("+".(int)$last_date." day", $date);
        $date = date('Y-m-d', $date);
        $rota_data = array(
            'user_id' => 15,
            'rota_name' => $request->rota_name,
            'rota_duration' => $request->rotaPeriodLength,
            'rota_start_date' => $request->start_date,
            'rota_end_date' => $date,
            'rota_view' =>$request->rota_view,
            'status' => 0,
            'deleted_status' => 1,                  //deleted record status 1 for active 0 for deleted
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        );
        $rota = Rota::insert($rota_data);
        return redirect('/rota-planner');  
    }

    public function rota_calender_view(){
        $data['user'] = User::where('home_id',1)->get();
        $data['sidebar'] = 'rota';
        $data['rota'] =   Rota::where('deleted_status', 1)->orderBy('id','DESC')->take(1)->get();
        $rota =   Rota::where('deleted_status', 1)->orderBy('id','DESC')->take(1)->get();
        foreach($rota as $rotaView){
           $rota_view_id =  $rotaView->rota_view;
        }
        if($rota_view_id == 1){
            return view('rotaStaff.rota_table', $data);
        }
        if($rota_view_id == 2){
            return view('rotaStaff.rota_timeline', $data);
        }
        if($rota_view_id == 3){
            echo "3";
        }else{
            return redirect('/rota');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function add_shift_data(Request $request){
    //     $shift_data = array(
    //         'rota_id' => 15,
    //         'user_id' => 15,
    //         'shift_time' => "7",
    //         'shift_start_time' => $request->start_date,
    //         'shift_end_time' => $request->end_date,
    //         'break' => 0,
    //         'description' => 0,
    //         'status' =>1,
    //         'shift_color' => 'black',
    //         'created_at'=>date("Y-m-d H:i:s"),
    //         'updated_at'=>date("Y-m-d H:i:s")
    //     );
    //     $rota_shift = RotaShift::insert($shift_data);
    //     $latestRota = RotaShift::latest()->first();
    //     if($latestRota){
    //         echo $latestRota->id;
    //     } else{
    //         echo "not inserted";
    //     }
    // }

    public function get_all_users(){
        $data = User::where('home_id', 1)->orderBy('id', 'DESC')->get();
        echo json_encode($data);
    }

    public function assign_rota_users(Request $request){
        $rota = $request->rota_id;
        if(isset($rota)){
            $get_rota =  $request->rota_id;
        } else {
            $get_rota =  $request->edit_rota_id;
        }

        dd($request->end_date);
        
        $shift_data = array(
            'rota_id' =>  $get_rota,
            'user_id' => 15,
            'shift_time' => "7",
            'rota_day_date' => Carbon::parse($request->rota_shift_day_date)->format('Y-m-d'),
            'shift_start_time' => $request->start_date,
            'shift_end_time' => $request->end_date,
            'break' => $request->break_time,
            'description' => $request->shift_notes,
            'status' =>1,
            'shift_color' => 'black',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        );
        
        $rota_shift = RotaShift::insert($shift_data);
        $latestShiftId = RotaShift::latest()->first();

        for ($i=0; $i < count($request->user_ids); $i++) { 
            $assignedUsersRota = array(
                'rota_id' => $get_rota,
                'user_id' => 15,
                'shift_id' => $latestShiftId->id,
                'emp_id' => $request->user_ids[$i],
                'status' =>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            );
            $rota_shift = RotaAssignEmployee::insert($assignedUsersRota);
        }

        $data['rotaShift'] = RotaShift::where('id',$latestShiftId->id)->where('status', 1)->get();

        $list_emp = RotaAssignEmployee::where('rota_id', $get_rota)->where('shift_id', $latestShiftId->id)->where('status', 1)->get();
        $userdata = array();
        
        foreach($list_emp as $emp_ids){
            $userdata[] = User::where('id', $emp_ids->emp_id)->get();
        }
        $data['user_name'] = $userdata;
        echo json_encode($data);
    }
    function update_rota_name(Request $request){
        $data = Rota::where('id', $request->rota_id)
        ->update([
            'rota_name' => $request->rota_name
            ]);
        echo json_encode($data);
    }

    function publish_rota_employee(Request $request){
        $data = Rota::where('id', $request->publish_rota_id)
        ->update([
            'status' => 1
            ]);
        echo json_encode($data);
    }

    function unpublish_rota_employee(Request $request){
        $data = Rota::where('id', $request->unpublish_rota_id)
        ->update([
            'status' => 0
            ]);
        echo json_encode($data);
    }


    function calender_view(){
        //get all data for calender
        $leave = Staffleaves::where('is_deleted', 1 )->where('staff_leaves.leave_status', 1)->get();
        $recordArray = array();
        foreach($leave as $value){
            $leave_name = LeaveType::where('id', $value->leave_type)->pluck('leave_name'); 
            $leave_color = LeaveType::where('id', $value->leave_type)->pluck('color'); 
            $user_name  =  User::where('id', $value->user_id)->pluck('name');
            $arr['title'] =  $user_name;
            $arr['color'] =  $leave_color[0];
            $arr['start'] = $value->start_date;
            $arr['end'] = $value->end_date;
            array_push($recordArray,$arr);
        }
        $data['pending_leave'] = DB::table('staff_leaves')
                            ->join('user', 'staff_leaves.user_id', '=', 'user.id')
                            ->join('leave_type', 'leave_type.id', '=', 'staff_leaves.leave_type')
                            ->select('leave_type.leave_name','leave_type.color','leave_type.id as leavetype_id','user.name','user.id as user_id','staff_leaves.start_date', 'staff_leaves.end_date','staff_leaves.id as staffleave_id', 'staff_leaves.days', 'staff_leaves.notes')
                            ->where('staff_leaves.is_deleted', 1 )
                            ->where('staff_leaves.leave_status', 0)
                            ->get();

        $data['count'] = DB::table('staff_leaves')->where('staff_leaves.is_deleted', 1 )->where('staff_leaves.leave_status', 0)->count();
        $data['calander']=json_encode($recordArray);
        return view('rotaStaff.calender', ['sidebar' => 'calender'], $data);
    }

    function annual_leave_view($id){
        $data['leave'] = $id;
        $data['sidebar'] = '';
        $data['leavetype'] = LeaveType::where('status', 1)->get();
        $data['users'] = User::where('home_id', 1)->get();
       
        return view('rotaStaff.add_leave', $data);
    }

    function get_all_users_search(Request $request){
        $data = User::where('home_id', 1)->Where('name', 'like', '%' . $request->search_data . '%')->get();
        echo json_encode($data);
    }


    function delete_rota_employee(Request $request){
        $data = Rota::where('id', $request->id)
        ->update([
            'deleted_status' => 0
            ]);
        echo json_encode($data);
    }


    function edit_rota($id){
        $rota = Rota::where('id', $id)->get();
        $data['sidebar'] = 'rota';
        $latestUser = Rota::latest()->first();
        foreach($rota as $rota_data){
           $view = $rota_data->rota_view;
        }


        $data['pass_rota_id'] = $id; 
        $data['rota'] = Rota::where('id', $id)->get();
        if($view == 1){
            return view('rotaStaff.rota_table', $data);
        }
        if($view == 2){
            return view('rotaStaff.edit_rota_timeline', $data);
        }
        if($view == 3){
            echo "3";
        }
    }

    function publish_unpublish_rota(Request $request){

      
        if($request->rota_status == 1)
        {
            $data = Rota::where('id', $request->rota_id)
            ->update([
                'status' => 0
                ]);
            echo "unpublished";
        }   
        if($request->rota_status == 0 ){
            $data = Rota::where('id', $request->rota_id)
            ->update([
                'status' => 1
                ]);
                echo "published";
        }
    }

    function add_leave(Request $request){
      
        if($request->ongoingLeave == "on"){
            $ongoingLeave = 1;
        }else {
            $ongoingLeave = 0;
        }

        if(empty($request->start_date)){
            $date = $request->late_date;
            $request->end_date = null;
            $date = $request->late_date;
        } else {
            $date = $request->start_date;
        }
        // dd($date);
        // $data = $request->validate([
        //     'type' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'base_capacity' => 'required',
        //     'max_occupancy' => 'required',
        // ]);
        if(empty($request->late_time)){
            $late_time = null;
        }else{
            $late_time = $request->late_time;
        }
        if(empty($request->missed_days)){
            $missed_working_days = null;
        }else{
            $missed_working_days = $request->missed_days;
        }

        
        $add_leave = array(
            'user_id' => (int)$request->employee_list,
            'leave_type' => (int)$request->leave_type,
            'ongoing_absence' => $ongoingLeave,
            'start_date' => $date,
            'start_date_full_half' => (int)$request->start_date_full_half,
            'end_date' => $request->end_date,
            'end_date_full_half' => (int)$request->end_date_full_half,
            'late_by' => $late_time,
            'notes' => $request->notes,
            'days' => $missed_working_days,
            'leave_status' => 0,
            'is_deleted' => 1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")  
        );
        $data = Staffleaves::insert($add_leave);
        return redirect('/pending-request');
       
    }

    function leave_pending(){
        $data['last_leave'] = Staffleaves::latest()->first();
        $last_leave = Staffleaves::latest()->first();
        $user = User::where('id', $last_leave->user_id)->get();
        foreach($user as $user_data){
            $user_name = $user_data->name;
        }
        $data['username'] = $user_name;
        $data['sidebar'] = 'action';
        return view('rotaStaff.leave_pending', $data);
    }

    function date_validation_for_user(Request $request){
        $request->start_date_input;
        $staff_leaves = Staffleaves::where('is_deleted', 1)->where('user_id', $request->start_id)->get();
        $arr = array();
        foreach($staff_leaves as $staff_leave ){
            $period = \Carbon\CarbonPeriod::create($staff_leave->start_date, $staff_leave->end_date);
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                if($request->start_date_input == $date->format('Y-m-d')){
                    $arr[] =  \Carbon\Carbon::parse($staff_leave->start_date)->format('D, jS M');
                    $arr[] =  \Carbon\Carbon::parse($staff_leave->end_date)->format('D, jS M');
                }
            }
            $dates = $period->toArray(); 
        }
        echo json_encode($arr);
    }

    // function get_all_leave(){
    //     $data['leaves'] = Staffleaves::where('user_id', 15)->get();
    //     echo json_encode($data);   
    // }

    function employee_view(){
        $data['sidebar'] = 'employee';
        $data['user'] = User::where('home_id', 1)->get();
        return view('rotaStaff.employee', $data);
    }

    function get_rota_employee(Request $request){
        // $data['rota'] = DB::table('rota')
        //     ->join('rota_assign_employees', 'rota_assign_employees.rota_id', '=', 'rota.id')
        //     ->join('user', 'user.id', '=', 'rota_assign_employees.emp_id')
        //     ->join('rota_shift', 'rota_shift.id', '=', 'rota.id')
        //     ->select('user.id as user_id','user.name','rota_shift.id as rota_shift_id','rota_shift.break','rota_shift.shift_start_time','rota_shift.shift_end_time')
        //     ->where('rota_shift.status', 1 )
        //     ->where('rota_assign_employees.status', 1)
        //     ->get();

          $rota = DB::table('rota')
            ->join('rota_assign_employees', 'rota_assign_employees.rota_id', '=', 'rota.id')
            ->join('user', 'user.id', '=', 'rota_assign_employees.emp_id')
            ->join('rota_shift','rota_shift.rota_id','=', 'rota_assign_employees.rota_id')
            ->select('rota.id','rota.rota_start_date','rota.rota_end_date','rota_assign_employees.id as rota_assign_id','user.id as users_id','user.name','rota_shift.break','rota_shift.shift_start_time','rota_shift.shift_end_time')
            ->where('rota.id', $request->id)
            ->get();
        echo json_encode($rota); 
    }

    function get_all_shift(Request $request){
        $data = Rota::where('id', $request->id)->pluck('rota_start_date');
        $data = \Carbon\Carbon::parse($data[0])->format('d/m/Y');
        echo json_encode($data);
    }

    function edit_shift_data_get(Request $request ){
         
        // $rota = DB::table('rota_shift')
        // ->join('rota_assign_employees', 'rota_assign_employees.shift_id', '=', 'rota_shift.id')
        // ->select('rota_shift.id','rota_assign_employees.id', 'rota_shift.rota_day_date', 'rota_shift.shift_start_time', 'rota_shift.shift_end_time', 'rota_shift.break','rota_shift.description')
        // ->where('rota_shift.rota_id', $request->rota_id)
        // ->where('rota_assign_employees.emp_id', 'rota_assign_employees.user_id')
        // ->get();

        $rota = DB::table('rota_assign_employees')
        ->join('rota_shift', 'rota_assign_employees.shift_id', '=', 'rota_shift.id')
        ->select('rota_shift.id as rota_shift_id','rota_assign_employees.id as assigned_id', 'rota_shift.rota_day_date', 'rota_shift.shift_start_time', 'rota_shift.shift_end_time', 'rota_shift.break','rota_shift.description')
        ->where('rota_assign_employees.rota_id', $request->rota_id)
        ->where('rota_assign_employees.emp_id', $request->user_id)
        ->get();

        echo json_encode($rota); 
    }

    function update_shift_data(Request $request){
       
        $edit_rota_id = $request->edit_rota_id;
        $edit_shift_id = $request->edit_shift_id;
        $update_user_id = $request->update_user_id;
        $rotashift = array(
          'rota_day_date' => $request->updtate_date_of_shift,
          'shift_start_time' => $request->update_shift_start_time,
          'shift_end_time' => $request->update_shift_end_time,
          'break' => $request->update_break,
          'description' => $request->description
        );

        RotaShift::where('id', $request->rota_shift_id)
        ->update($rotashift);

        $data = RotaAssignEmployee::where('id', $request->assigned_user_id)
        ->update(['emp_id' => $request->update_user_id]);

        echo json_encode($data);
    }

    function approve_leave(Request $request){
        $result = Staffleaves::where('id',$request->id)->update(['leave_status'=> 1]);
        echo json_encode($result);
    }

    function get_leave_record_for_1_week(Request $request){
        
        $date = carbon::parse($request->date)->format('Y-m-d');

        $data['annual'] =  Staffleaves::where('start_date', '<=', $date)->where('end_date', '>=', $date)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $data['sickness'] = Staffleaves::where('start_date', '<=', $date)->where('end_date', '>=', $date)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $data['lateness'] =  Staffleaves::where('start_date', '=', $date)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $data['other'] =  Staffleaves::where('start_date', '<=', $date)->where('end_date', '>=', $date)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();

        echo json_encode($data);
    }

    function get_record_of_rota(Request $request){
        $data = Rota::where('deleted_status', 1)->orWhere('rota_name', 'like', '%' . $request->search_name . '%')->get();
        echo json_encode($data);
    }

    function get_all_rota_data(){
        $current_month =  Carbon::now()->format('m');
        $current_year = Carbon::now()->format('Y');

        $previous_month_data = Carbon::now()->endOfMonth()->subMonth()->toDateString();
        $priormonth = date ('m', strtotime ( '-1 month' , strtotime ( $previous_month_data )));
        $prioryear = date('Y', strtotime($previous_month_data));

        $rota = Rota::where('deleted_status', 1)->orderBy('rota_name', 'DSC')->get(); 
        $arr = array();
        $active_publish_rota= 0;
        $active_unpublish_rota= 0;
        $old_publish_rota = 0;
        $old_unpublish_rota = 0;
        $old = array();
        foreach($rota as $rotas){
            $convert_date = strtotime($rotas->created_at);
            $month = date('m',$convert_date);
            $year = date('Y',$convert_date);
            if($current_year == $year){
                if( $current_month == $month){
                    $arr[] = $rotas;
                    if($rotas->status === 1){
                        $active_publish_rota++;
                    } if($rotas->status === 0) {
                        $active_unpublish_rota++;
                    }
                }
            }
            if($prioryear == $year){
                if( $priormonth == $month){
                    $old[] = $rotas;
                    if($rotas->status === 1){
                        $old_publish_rota++;
                    } if($rotas->status === 0) {
                        $old_unpublish_rota++;
                    }
                }
            }
           
        }         
        $data['active_rota'] =  $arr;
        $data['old_rota'] =  $old; 
        $data['sidebar'] = 'rota';
        $data['active_publish_rota_count'] = $active_publish_rota;
        $data['active_unpublish_rota_count'] = $active_unpublish_rota;
        $data['old_publish_rota_count'] = $old_publish_rota;
        $data['old_unpublish_rota_count'] = $old_unpublish_rota;

        echo json_encode($data);
    }
}
