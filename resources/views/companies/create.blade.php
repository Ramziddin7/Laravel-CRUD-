@extends('layouts.app')
@section('content')
    <h1 class="text-center">Create Company </h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        
    @endif
    <form action="{{route('companies.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input   name="name" autocomplete="off" type="text" class="form-control" id="exampleInputEmail1" value="{{old('name')}}" >
            </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                <label  class="form-label">Addres</label>
                <input name="address" type="text" autocomplete="off"class="form-control" id="exampleInputEmail1"  value="{{old('address')}}"  >
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                <label  class="form-label">Phone</label>
                <input name="phone"  type="text" autocomplete="off" class="form-control" id="exampleInputEmail1"  value="{{old('phone')}}"  >
                </div>
            </div>
        </div>
        {{-- ending row --}}
        <button type="submit" class="btn btn-primary">Add Company</button>
    </form>
@endsection