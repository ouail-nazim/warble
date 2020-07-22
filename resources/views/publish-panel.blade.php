<div class="border border-blue-400 rounded-lg px-8 py-6">
    <form method="POST" action="{{route('post-tweet')}}">
        @csrf
        <textarea
            name="body"
            class="w-full"
            placeholder="Make a new post"
            required
        ></textarea>
        <hr class="my-4">
        <footer class="flex justify-between items-center">
            <img src="{{auth()->user()->getAvatar()}}" width="40" height="40" class="rounded-full mr-3">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 rounded-lg text-sm shadow px-10 py-2 text-white ">Post</button>
        </footer>

    </form>
    @error('body')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>
