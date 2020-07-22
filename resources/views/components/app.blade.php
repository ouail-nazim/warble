<x-master>
    @if(request('updated'))
        <x-pop></x-pop>
    @endif



    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @auth()
                    <div class="lg:w-1/6">
                        @include('sidebar-links')
                    </div>
                @endauth
                <div class="lg:flex-1 lg:mx-10">
                    {{$slot}}
                </div>
                @auth()
                    <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4 ">
                        @include('friends-list')
                    </div>
                @endauth
            </div>
        </main>
    </section>
</x-master>

