@extends('layouts.master')

@section('content')
<div class="card shadow" style="background-color: white;">
    <div class="card-body">
        <div class="container" style="padding: 5%;">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-lg-12 margin-tb">
                    <div class="">
                        <h1 style="text-transform: uppercase; font-weight:bold; text-align:center">Edit Profile</h1>
                    </div>
                </div>
            </div>
        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form action="{{ route('userr.update',$product->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" value="{{ $product->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" value="{{ $product->password }}" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button onclick="history.back()" class="btn btn-md btn-brand movedown">Back</button>

                        <button type="submit" class="btn btn-md btn-brand movedown">Update</button>
                    </div>
                </div>
        
            </form>
        </div>
    </div>
</div>
   
@endsection
