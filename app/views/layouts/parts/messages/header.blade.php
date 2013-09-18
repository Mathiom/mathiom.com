@if($messages = array_only($errors->getMessages(), ['header']))
    <ol class="messages header">
        @foreach(array_flatten($messages) as $message)
            <li>{{$message}}
        @endforeach
    </ol>
@endif