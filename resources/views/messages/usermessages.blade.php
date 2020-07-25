
<div class="flex mb-2">
    <a href="{{route('profile',$user->username)}}"
       class="flex items-center text-sm">
        <img src="{{$user->getAvatar()}}" width="40" height="40" class="rounded-full mr-3">
        <div >
            <h4 class="font-bold">{{$user->name}}</h4>
            <h4 class="text-xs text-gray-500 ">{{$user->email}}</h4>
        </div>
    </a>
</div>
{{--show the message with the user selected --}}
<div  class="message-show border border-gray-500 rounded-lg" style="height: 400px;overflow: scroll" >
    <ul class="messages">
        @foreach($messages as $message)
            @if($message->from == auth()->id())
                {{--send message--}}
                @include('messages.message-send')
            @else
                {{-- ressive message--}}
                @include('messages.message-resive')
            @endif
        @endforeach

    </ul>
</div>
{{-- send the message--}}
<div class="flex">
    <input type="text" name="message" id="input-message" class="appearance-none block w-full bg-gray-100 text-gray-900 border border-gray-500 rounded-lg mt-1 py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" autocomplete="false">
    <button type="button" class="bg-blue-400 hover:bg-blue-600 rounded-full shadow p-3 mt-1 ml-1 text-black text-sm"><i class="fas fa-paper-plane"></i></button>
</div>

