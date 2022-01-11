@extends('layouts.master')

@section('content')
<div class="card-shadow" style="background: white;">
    <div class="card-body" style="margin-left:15%; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h1>Get Task Duration from Progressing Until Done KPI</h1>
                        <form action="{{ route('filteringg') }}" method="GET" style="margin-top: 10%; ">
                        <select name="price_id" id="input">
                            <option value="0">Select Task Name</option>
                            @foreach ($get_task_id as $price)
                                <option value="{{ $price->id }}" {{ $price->id == $selected_id['price_id'] ? 'selected' : '' }}>
                                {{ $price->title }}
                                </option>
                            @endforeach
                        </select>
                        {{-- <select name="color_id" id="input">
                            <option value="0">Select Color</option>
                            @foreach ($get_task_id as $color)
                            <option value="{{ $color->id }}" {{ $color->id == $selected_id['color_id'] ? 'selected' : '' }}>
                            {{ $color->title }}
                            </option>
                            @endforeach
                        </select> --}}
                        <input type="submit" class="btn btn-danger btn-sm" value="Filter">
                        <a href="/menuss"><div class="btn btn-warning btn-sm">Reset</div></a>
                        </form>
                    
                    
                        <table class="table table-stripped" style="margin-top:5%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Project Title</th>
                                    <th>Desc</th>
                                    <th>Assigned To</th>
                                    <th>Created Date</th>
                                   @if( $selected_id['price_id']==0)  <th>Updated Date</th> @else <th>Updated Date</th>
                                   <th> (Duration(H:M:S)</th> @endif
        
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse($all_pro as $product )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{$product->pt}}</td>
                                    <td>{{ $product->text }}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{date('l, Y-m-d H:i:s', strtotime($product->tc)) }}</td>
                                       
                                        @if( $selected_id['price_id']==0) <td>{{date('l, Y-m-d H:i:s', strtotime($product->updated_at)) }} </td> @else
                                        <td>{{date('l, Y-m-d H:i:s', strtotime($product->updated_at)) }} </td>
                                       <td>{{ $duration}}</td> @endif
                                    {{-- <td>
                                        
                                        {{(Carbon\Carbon::parse(min($product->created_at))) -> diff((Carbon\Carbon::parse(max($product->created_at)))) -> format('%D : %H : %I : %S')}}
                                    </td> --}}
                                </tr>
                                @empty
                                <p> No data Found </p>
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

@endsection