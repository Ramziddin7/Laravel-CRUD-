@extends('layouts.app')
@section('content')
    <h1 class="text-center">Update Company </h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        
    @endif
    <a href="{{route('companies.index')}}" class="btn btn-outline-primary"><i class="bi bi-skip-backward-fill"></i></a>
    <form action="{{route('companies.update',['company'=>$company->id])}}" method="POST">
       
        @method('Put')
        @csrf
        <div class="row">
            <div class="col-md-12">
            <div class="mb-3">
                <label  class="form-label">Name</label>
        <input   name="name" autocomplete="off" type="text" class="form-control"  value="{{$company->name}}" >
            </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                <label  class="form-label">Address</label>
                <input name="address" type="text" autocomplete="off"class="form-control" value="{{$company->address}}"  >
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                <label  class="form-label">Phone</label>
                <input name="phone"  type="text" autocomplete="off" class="form-control" value="{{$company->phone}}"  >
                </div>
            </div>
        </div>
        {{-- ending row --}}
        <button type="submit" class="btn btn-primary"><i class="px-3 bi bi-check-lg"></i></button>
    </form>
@endsection