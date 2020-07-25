<x-app>
    <div class="lg:flex lg:justify-between">
        {{-- my contact--}}
        <div class="lg:w-1/3 border border-gray-500 rounded-lg mr-4" style="height: 500px;overflow: scroll">
            <ul class="py-4 px-2">
                @foreach($contacts as $contact)
                    @include('messages.contacte')
                @endforeach
            </ul>
        </div>
        <div class="lg:w-2/3">
            @yield('showMessages')
        </div>
    </div>
</x-app>
