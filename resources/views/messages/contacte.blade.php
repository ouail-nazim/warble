<li id="{{$contact->id}}" class="user">
    <div class="flex items-center my-6 " style="cursor: pointer">
        <img src="{{$contact->getAvatar()}}" width="40" height="40" class="rounded-full mr-3">
        <div >
            <h4 class="font-bold">{{$contact->name}}</h4>
            <h4 class="text-xs text-gray-500 ">{{'@'.$contact->username}}</h4>
        </div>
        <span class="flex rounded-full bg-red-600 text-white uppercase mx-2 py-1 text-xs px-1">+99</span>

    </div>
</li>
