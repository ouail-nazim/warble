<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
        <li class="mb-4">
            <a href="{{route('profile',$user->username)}}"
               class="flex items-center text-sm">
                <img src="{{$user->getAvatar()}}" width="40" height="40" class="rounded-full mr-3">
                {{$user->name}}
            </a>
        </li>
    @endforeach
</ul>
