<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{$user->getCover()}}"
                 class="rounded-lg mb-2 w-full">
            <img src="{{$user->getAvatar()}}"
                 class="rounded-full mr-3 absolute bottom-0  transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50%"
                 width="150px">
        </div>

        <div class="flex justify-between items-center">
            <div style="max-width: 240px ">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="flex">
                @if(auth()->user()->is($user))
                    <a  href="/profiles/{{$user->username}}/edit"
                        class="bg-gray-300 rounded-lg shadow py-2 px-4 mr-2 text-black text-xs">Edit Profile</a>
                @else
                    <form action="/profiles/{{$user->username}}/follow" method="post">
                        @csrf
                        <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">
                            {{auth()->user()->following($user) ?'Unfollow Me':'Follow Me'}}
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <p class="mt-4 text-sm">
            @if($user->about)
                {{$user->about}}
            @else
                your bio is empty ,go and add one
            @endif
        </p>

    </header>
    @include('time-line',['tweets'=>$tweets])
</x-app>
