@if($messages = array_only($errors->getMessages(), ['action', 'login', 'register', 'email', 'password']))
    <h3>Errors</h3>
    <ol class="messages login">
        @foreach(array_flatten($messages) as $message)
            <li>{{$message}}
        @endforeach
    </ol>
@endif