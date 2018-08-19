@extends('layouts.admin')

       @section('content')
        {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true]) !!}
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
            {!! Form::select('is_active',array(0=>'Not active',1=>'Active'),0,['class'=>'form-control']) !!}
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
        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
        </div>
        @include('includes.form_error')


@endsection