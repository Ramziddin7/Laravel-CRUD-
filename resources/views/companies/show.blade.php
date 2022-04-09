@extends('layouts.app')
@section('title','Show page')
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center p-3 bordered">About company </h2>
            <div class="col">
                <a href="{{route('companies.index')}}" class="btn btn-outline-dark my-2">Back to home</a>
                <table class="table table-bordered bg-dark text-white">
                   <tr>
                       <td>Name</td>
                       <td>{{$company->name}}</td>
                   </tr>
                   <tr>
                        <td>Phone</td>
                        <td>{{$company->phone}}</td>
                   </tr>
                   <tr>
                        <td>Address</td>
                        <td>{{$company->address}}</td>
                    </tr>'
                    <tr>
                        <td>Created</td>
                        <td>{{$company->created_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection