<x-app>

    <div>
        @forelse($users as $user)
           <div class="flex justify-between items-center mb-6">
               <a class="flex items-center" href="/profiles/{{$user->username}}">
                       <img src="{{$user->getAvatar()}}"
                            class="rounded mr-4"
                            width="70px">
                       <div>
                           <h4 class="font-bold">{{'@'.$user->username}}</h4>
                       </div>

                   </a>
               <div class="flex text-gray-900 text-sm ">
                   <p class="mr-2">posts :{{count($user->tweets)}}</p>
                   <p class="mr-2">following: {{count($user->follows)}}</p>
                   <p class="">followers: {{count($user->follower())}}</p>
               </div>
           </div>
        @empty
            <div class="border border-gray-300 rounded-lg mt-4 mb-4 py-6 text-center " style="max-width:760px">
                no user is founded
            </div>
        @endforelse


    </div>

</x-app>
