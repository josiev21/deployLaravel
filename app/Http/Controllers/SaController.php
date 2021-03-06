<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SaController extends Controller
{
    public function index()
    {
        //Users
        $getDataProject = DB::table('projects')->join('users','projects.user_assigned_id','=','users.id')->where('projects.deleted_at', '=', NULL)->count();
        $getDataTask = DB::table('tasks')->join('users','tasks.user_assigned_id','=','users.id')->join('projects','tasks.project_id','=','projects.id')->where('projects.deleted_at','=',NULL)->where('tasks.deleted_at','=',NULL)->count();
        $getIncTask = DB::table('tasks')->join('users','tasks.user_assigned_id','=','users.id')->join('projects','tasks.project_id','=','projects.id')->where('projects.deleted_at','=',NULL)->where('tasks.deleted_at', '=', NULL)->where('tasks.status_id','!=',7)->count();
        $getCompTask = DB::table('tasks')->join('users','tasks.user_assigned_id','=','users.id')->join('projects','tasks.project_id','=','projects.id')->where('projects.deleted_at','=',NULL)->where('tasks.deleted_at', '=', NULL)->where('tasks.status_id','=',7)->count();
        $getOv = DB::table('tasks')->join('users','tasks.user_assigned_id','=','users.id')->join('projects','tasks.project_id','=','projects.id')->where('projects.deleted_at','=',NULL)->where('tasks.deleted_at', '=', NULL)->where('tasks.deadline', '<', Carbon::today())->where('tasks.status_id', '!=', 7)->count();
        //EOUSERS
        $getUserList = DB::table('users')->count();
        //EOMAN
        $getUser = DB::table('users')->get();
        $most = DB::table('activities')
        ->join('users', 'activities.causer_id', '=', 'users.id')
        ->select('users.name', 'users.image', 'users.email', 'activities.created_at')->distinct()
        ->paginate(5);
        $year = ['2021-01','2021-02','2021-03','2021-04','2021-05','2021-06', '2021-07','2021-08','2021-09','2021-10','2021-11', '2021-12', '2022-01'] ;


        $user = [];
        foreach ($year as $key => $value) {
            $user[] = DB::table('tasks')->join('users','tasks.user_assigned_id','=','users.id')->join('projects','tasks.project_id','=','projects.id')->where('projects.deleted_at','=',NULL)->where('tasks.deleted_at', '=', NULL) ->where(DB::raw("DATE_FORMAT(tasks.created_at, '%Y-%m')"),$value)->count();
        }

        $record = DB::table('tasks')->select(DB::raw("COUNT(*) as count"), DB::raw("flag as day_name"), 'divs.division')->join('divs', 'tasks.flag', '=', 'divs.id')
    ->groupBy('day_name')
    ->get();
  
     $data = [];
 
     foreach($record as $row) {
        $data['division'][] = $row->division;
        $data['data'][] = (int) $row->count;
      }
 
    $data['chart_data'] = json_encode($data);
    
        return view('sa', $data,compact('getDataProject','getDataTask','getIncTask', 'getCompTask', 'getOv','getUserList', 'getUser', 'most'))->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
