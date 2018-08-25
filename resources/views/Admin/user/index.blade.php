@extends('layouts.admin')

@section('content')


    @if(Session::has('deleted_user'))

        <p class="alert-danger">{{Session('deleted_user')}}</p>
    @endif

    <table class="table table-bordered">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($user)
            @foreach($user as $users)
          <tr>
              <td>{{$users->id}}</td>
              <td><img height="50"  src="{{$users->photo?$users->photo->file :'http://placehold.it/50x50'}}" alt=""></td>
              <td><a href="{{route('admin.users.edit',$users->id)}}">{{$users->name}}</a></td>
              <td>{{$users->email}}</td>
              <td>{{$users->role->name}}</td>
              <td>{{$users->is_active==1?'Active': "Not Active"}}</td>
              <td>{{$users->created_at->diffForHumans()}}</td>
              <td>{{$users->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
         @endif
        </tbody>
      </table>

@endsection