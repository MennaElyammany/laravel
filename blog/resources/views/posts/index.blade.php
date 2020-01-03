@extends('layouts.header')
@section('content')
<center>
<button type="button" class="btn btn-success my-3" onclick="window.location='{{ route("posts.create") }}'">CREATE POST</button>
</center>
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $index => $value)  
        <tr>
        <td scope="row">{{$value['id']}}</t>
            <td>{{$value['title']}}</td>
            <td>{{$value['content']}}</td>
           <td>  {{\Carbon\Carbon::parse($value['created_at'])->format('y-m-d')}}</td>
           <form class="form-inline" method="post" action="/posts/{{$value['id']}}">
            @csrf
            @method('delete')
            <td> <button type="button" class="btn btn-info my-3" onclick='window.location="{{route('posts.show',['post' => $value['id'] ])}}"'>View</button>
            <button type="button" class="btn btn-primary my-3" onclick='window.location="{{route('posts.edit',['post' => $value['id'] ])}}"'>Edit</button>
           
            <button type="submit" class="btn btn-primary my-3">Delete</button>
           </form>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>

@endsection