@extends('layouts.app')

@section('title','Compaies')
@section('content')
<h2 class="text-center p-3">This is a index Page</h2>
<a href="{{ route('companies.create')}}" class="btn btn-primary py-1 my-1   justify-content-md-end">Add Company</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
           <td>t/R</td>
           <td>Company Name</td>
           <td>Company Address</td>
           <td>Phone NUmber</td>
           <td>Created At</td>
           <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $item)
        <tr>
            <td>{{($companies->currentpage()-1)*$companies->perpage()+($loop->index+1)}}</td>
            <td>
            <a style="text-decoration: none;" href="{{route('companies.show',['company'=> $item->id])}}">
                {{$item->name}}
            </a>
            
            </td>
            <td>{{$item->address}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->created_at}}</td>
            <td>
                <a class="btn btn-outline-success" href="{{ route('companies.edit',['company'=>$item->id])}}"><i class="bi bi-pen"></i></a>
                <form action="{{route('companies.destroy',['company'=>$item->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn btn-danger "><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
     
        @endforeach
    </tbody>
</table>

{{$companies->links()}}
@endsection

   