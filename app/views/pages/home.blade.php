@section('content')
    @if(!Auth::check())
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

        @include('layouts.parts.messages.login')
    @endif
@stop