<div class="flex flex-row-reverse mr-4 ">
    <li class="message my-2 ml-4 bg-blue-300  border w-64 rounded-lg flex">
        <div class="px-4 py-2 rounded-lg">
            <p class="text-black-50 text-sm text-wrap"> {{$message->message }}</p>
            <p class="text-xs text-gray-500">{{$message->created_at->diffForHumans()}}</p>
        </div>
    </li>
</div>
