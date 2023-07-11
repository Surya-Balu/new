<ul class="menu">
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="/galleryone">Gallery</a></li>
    @auth
    <li><a href="{{route('calculator.form')}}">Calculator App</a></li>
    @endauth
    @auth
    <li><a href="{{route('man.form')}}">String App</a></li>
    @endauth
    <center>
     @guest
    
    <li><a href="{{route('login')}}">Login</a></li>
    
    <li><a href="{{route('register')}}">Register</a></li>
   
@endguest
</center>
</ul>
 
@auth
    <form action="{{ route('logout')}}" method="post">
        @csrf
        <button type="submit" style="padding:10px 10px;color:white; background:black; margin:10px 0px" >Logout</button>
    </form>
@endauth
