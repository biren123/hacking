@extends('layouts.admin')

@section('content')




    <h1>Edit Users</h1>



    <div class="row">
            <div class="col-sm-3">
                <img src="{{$user->photo?$user->photo->file:'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
            </div>
             <div class="col-sm-9">

                    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true]) !!}
                    {{--<input type="hidden" name="_method" value="csrf_token" >--}}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        {!! Form::label('name','Name')!!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','Email') !!}
                        {!! Form::email('email',null,['class'=>'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('role_id','Role') !!}
                        {!! Form::select('role_id',[''=>'choose option']+$role,null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('is_active','Status') !!}
                        {!! Form::select('is_active',array(0=>'Not active',1=>'Active'),null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id','Image') !!}
                        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password','Password') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group" >
                        {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-3']) !!}
                    </div>



                    {!! Form::close() !!}


                    {!! Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]]) !!}
                    <div class=" form-group">
                        {!! Form::submit('delete User',['class'=>'btn btn-danger col-sm-3']) !!}
                    </div>
                    {!! Form::close() !!}
             </div>

    </div>
    @include('includes.form_error')


@endsection