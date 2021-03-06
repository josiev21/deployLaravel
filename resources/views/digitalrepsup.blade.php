@extends('layouts.masterr')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
<div class="card shadow" style="background-color: white;">
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h1 style="text-align: center;">Digital Report</h1>

                        </div>
        
                        <form action="{{ route('filterrepsup') }}" method="GET"   onchange="postdata(this.value)" style="margin-top: 5%; margin-bottom:5%; display:flex; justify-content:center;">
                            
                        {{-- <select name="price_id" id="input" style="margin-right:2%;"  >
                            <option value="0">Select Task</option>
                            @foreach (DB::table('tasks')
                            ->join('projects', 'tasks.project_id', '=', 'projects.id')
                            ->where('projects.flag', '=', Auth::user()->flag)
                            ->select('tasks.id', 'tasks.title')->where('tasks.deleted_at','=',NULL)->orderBy('id')->get() as $price)
                                <option value="{{ $price->id }}" {{ $price->id == $selected_id['source_id'] ? 'selected' : '' }}>
                                {{ $price->title }}
                                </option>
                            @endforeach
                        </select> --}}
                        <select name="price_id" id="input" style="margin-right:2%;" >
                            <option value="0" >Select Status</option>
                            @foreach (DB::table('statuses')
                            ->select('id', 'title')->where('source_type','=','App\Models\Task')->orderBy('id')->get() as $country)
                            <option value="{{ $country->id }}" @if($country->id == $price_id) selected @endif>{{ $country->title }} </option>
                            @endforeach 
                            {{-- @foreach (DB::table('users')->select('id', 'name')->orderBy('id')->get() as $color)
                            <option value="{{ $color->id }}" {{ $color->id == $selected_id['causer_id'] ? 'selected' : '' }}>
                            {{ $color->name }}
                            </option>
                            @endforeach --}}
                        </select>
                        
                        <input type="date" name="from" id="input" value="{{Carbon\Carbon::now()->toDatetimelocalString()}}" style="margin-right:2%;">
                        <input type="date" name="to" id="input" value="{{Carbon\Carbon::now()->toDatetimelocalString()}}" style="margin-right:2%;">
                        <input type="submit"  class="btn btn-md btn-brand movedown" value="Filter" style="font-size: 16px; ">
                        </form>
                        
                        <div class="row" style="text-align: center;">
                            {{-- <div class="col-sm-6">
                                <p> <strong> From :
                                    @if($from == '1970-01-01 07:00:00') No specific date selected
                                    @else
                                   {{$from}}</strong>@endif
                                    </p>

                            </div> --}}
                            {{-- <div class="col-sm-6">
                                <p>To :@if($to == '1970-01-01 07:00:00') <strong>No specific date selected
                                    @else
                                   {{$to}}</strong>@endif
                                    </p>

                            </div> --}}
                        </div>
                        <a href="/digitalrep">
                        <div  class="btn btn-md btn-brand movedown" value="Reset" style="font-size: 16px;  margin-left:20%;">Reset</div></a>

                        <div class="table-responsive">
                            <table class="table" style="margin-left:5%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>

                                        <th>Title</th>
                                        <th>Project Title</th>
                                        <th>Assigned To</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Duration(D:H:M:S)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($product->sortByDesc('id') as $product )
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{$product->jo}}</td>
                                        {{-- @if($product->status_id == 7)
                                        <td>DONE KPI</td>
                                        @elseif($product->status_id == 5)
                                        <td>QC</td>
                                        @endif --}}
                                        <td><a href="/tasks/{{$product->external_id}}">{{ $product->tt }}</a></td>
                                        <td>{{$product->pt}}</td>
                                        <td>{{$product->ui}}</td>

                                        <td>{{date('l, d/m/y H:i:s', strtotime( $product->created_at))}}</td>
                                        <td>{{date('l, d/m/y H:i:s', strtotime( $product->updated_at))}}</td>
                                        <td>{{(Carbon::parse($product->created_at)) -> diff((Carbon::parse($product->updated_at))) -> format('%D : %H : %I : %S')}}</td>
                                        
                                    </tr>
                                    @empty
                                    <p> There is no data to be shown </p>
                                    @endforelse
            
                                </tbody>
                            </table>
                        </div>
                        
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        
        $('#country').on('change', function () {
            
            var countryId = this.value;
            $('#state').html('');
            $.ajax({
                url: '{{ route('getStates') }}?country_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#state').html('<option value="">Select Task</option>');
                    $.each(res, function (key, value) {
                        $('#state').append('<option value="' + value
                            .id + '">' + value.title + '</option>');
                    });
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        
    });
</script>
{{-- <script>
   function postdata(data) {
       $.post("{{ URL::to('/test') }}", { input:data }, function(returned){
       $('.products').html(returned);
       });
    }   
</script> --}}
<script>
    function formatDate(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var year = date.getFullYear();
  var month = date.getMonth();
  month = month < 10 ? '0'+month : month;
  var date = date.getDate();
  date = date < 10 ? '0' + date : date;
  hours = hours < 10  ? '0' + hours : hours;
  minutes = minutes < 10  ? '0' + minutes : minutes;
  var strTime = date + '/' + month + '/' + year + ' ' + hours + ':' + minutes + ' ' + ampm;
  return strTime;
}

console.log(formatDate(new Date));
</script>

@endsection