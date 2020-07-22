<div class="border border-gray-300 rounded-lg mt-4 mb-4" style="max-width:760px">
        @forelse($tweets as $tweet)
            @include('tweet-show')
        @empty
            <p class="p-4 text-center">no tweets yet</p>
        @endforelse
</div>

<div class="border border-gray-300 rounded-lg mt-4 mb-4" style="max-width:760px">
        {{$tweets->links()}}
</div>

