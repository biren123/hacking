@extends('layouts.admin')

@section('content')

        <h1>post</h1>

         <table class="table table-bordered">
             <thead>
                 <tr>
                         <th>Post_id</th>
                         <th>Photo</th>
                         <th>Owner</th>
                         <th>Category</th>
                         <th>Title</th>
                         <th>body</th>
                         <th>Created</th>
                         <th>Updated</th>
                 </tr>
             </thead>
             <tbody>
               @if($post)
                  @foreach($post as $posts)
                       <tr>
                               <td>{{$posts->id}}</td>
                               <td><img height="50" src="{{$posts->photo ? $posts->photo->file :'Http://placehold.it/400x400' }}" alt=""></td>
                               <td>{{$posts->user->name}}</td>
                               <td>{{$posts->category_id}}</td>
                               <td>{{$posts->title}}</td>
                               <td>{{$posts->body}}</td>
                               <td>{{$posts->created_at->diffForHumans()}}</td>
                               <td>{{$posts->updated_at->diffForHumans()}}</td>
                       </tr>
                  @endforeach
               @endif
             </tbody>
           </table>



@endsection