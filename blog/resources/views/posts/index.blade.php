
@extends('layouts.app')
@section('content')
<!--@includeWhen(true, 'includeWhen.try', [Auth::user()['provider_name'] => 'null']) -->
<center>
<button type="button" class="btn btn-success my-3" onclick="window.location='{{ route("posts.create") }}'">CREATE POST</button>
</center>
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Content</th>
            <th scope="col">Created By</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
            
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $index => $post)  
        <tr>
        <td scope="row">{{$post['id']}}</t>
            <td>{{$post['title']}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post['content']}}</td>
            <td>{{$post->user->name}}</td>
           <td>  {{\Carbon\Carbon::parse($post['created_at'])->format('y-m-d')}}</td>
           <form class="form-inline" method="post" action="/posts/{{$post['id']}}">
            @csrf
            @method('delete')
            <td> <button type="button" class="btn btn-info my-3" onclick='window.location="{{route('posts.show',['post' => $post['id'] ])}}"'>View</button>
            <button type="button" class="btn btn-primary my-3" onclick='window.location="{{route('posts.edit',['post' => $post['id'] ])}}"'>Edit</button>
           
            <button type="submit" class="btn btn-danger my-3" onclick='return confirm("Are you sure to delete this post?");'>Delete </button>
           </form>
            </td>
           
          </tr>
          @endforeach

        </tbody>
        
      </table>
      
      {{ $posts->links() }} <!--will generate links for pages like bootstrap links-->
@endsection