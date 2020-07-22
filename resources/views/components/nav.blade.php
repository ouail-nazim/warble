<nav class="flex" style="width: auto">
    <div class="flex items-center">
        @auth()
        <form class="w-full max-w-sm mr-10" method="get" action="{{route('search')}}">
            @csrf
            <div class="flex items-center border-b border-b-2 border-blue-400 py-1">
                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                       name="username"
                       type="search"
                       placeholder="Search for a user ..."
                       aria-label="Full name"
                       required>
                <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <a href="{{route('profile',auth()->user()->username)}}" class="flex items-center mr-2">
        <img src="{{auth()->user()->getAvatar()}}" width="40" height="40" class="rounded-full mr-3">
        <p> {{auth()->user()->name}}</p>
    </a>

    <div class="flex items-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" class="bg-red-400 rounded-lg shadow py-2 px-4 text-white text-xs">Logout</button>
            </form>
    </div>
    @else
    <!-- #########################################################################"""-->
        <div class="">
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 rounded-lg text-sm shadow px-10 py-2 text-white mr-4" >Login</a>
            <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 rounded-lg text-sm shadow px-10 py-2 text-white mr-2" >Register</a>
        </div>
        @endauth
</nav>
