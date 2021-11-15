@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card shadow" style="background:white;">
        <div class="container" style="padding:5%; margin-right:10%;">
            <a href="{{URL::previous()}}"><div class="btn btn-primary">Back</div></a>
           <!-- <a href="{{URL::previous()}}"><div class="btn btn-primary">Print</div></a>-->

            <div class="card-header">
                <p class="text-center" style="font-size:25px; font-weight:800;">DIGITAL REPORT RESULT</p>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">Task Title</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col">Duration (in minutes)</th>
                        <th scope="col">Current Status</th>
                
                
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($getTaskReport as $i)
                      <tr>
                        <td>{{$i->task_title}}</td>
                        <td>{{$i->project_title}}</td>
                        <td>{{$i->username}}</td>
                        <td>{{$i->task_created_at}}</td>
                        <td>{{$i->task_update_at}}</td>
                        <td>{{$i->duration_in_mins}}</td>
                        <td>{{$i->status_title}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      
    </div>
   
</div>

  @endsection