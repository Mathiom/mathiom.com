@extends('layouts.page')

@section('content')
    {{Form::open(['route' => 'home'])}}
        <div>
            {{Form::label('email', 'Email:')}}
            {{Form::text('email')}}
        </div>
        <div>
            {{Form::label('password', 'Password:')}}
            {{Form::password('password')}}
        </div>
        <div>
            {{Form::submit('Login', ['name'=>'login[]'])}}
        </div>
    {{Form::close()}}
@stop