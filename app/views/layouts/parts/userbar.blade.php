@if(Auth::check())
    <header id="userbar">
        {{link_to_route('logout', 'Logout')}}
    </header>
@endif