
<div class="bg-blue-400 rounded-lg"
     style="position: fixed; top: 90%;left:60%;z-index: 99;width: 500px;"
>
    <div id="not" class="rounded-lg bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 rounded relative" role="alert" style="top: -10%">
        <strong class="font-bold">
            @switch(request('updated'))
                @case('store')
                    @lang('messages.store')
                    @break

                @case('edit')
                    @lang('messages.update')
                    @break

                @case('follow')
                    @lang('messages.follow')
                    @break

                @case('unfollow')
                    @lang('messages.unfollow')
                @break

                @default
                     @break
                @endswitch
        </strong>
        <span id="close" class="absolute top-0 bottom-0 right-0 px-4 py-3">
           <svg class="fill-current h-6 w-6 text-teal-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
    </div>

</div>
