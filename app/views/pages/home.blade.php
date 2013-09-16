@extends('layouts.page')

@section('content')
    <h2>Login</h2>
    {{Form::open(['route' => 'home'])}}
        <ul>
            <li>
                {{Form::label('email', 'Email:')}}
                {{Form::text('email')}}
            <li>
                {{Form::label('password', 'Password:')}}
                {{Form::password('password')}}
            <li>
                {{Form::submit('Login', ['name'=>'action'])}}
        </ul>
    {{Form::close()}}

    @if($errors->any())
        <h3>Errors</h3>
        <ol>
            {{implode('', $errors->all('<li>:message'))}}
        </ol>
    @endif
@stop