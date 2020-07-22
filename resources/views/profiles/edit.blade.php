<x-app>
    <form action="/profiles/{{auth()->user()->username}}/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{-- error --}}
        @if($errors->any())
            <x-formPOP></x-formPOP>
        @endif
        {{-- userName and name --}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <label for="username" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">User Name <span class="ml-2 text-red-500 font-weight-bold text-lg">*</span></label>
                <input type="text" name="username" id="username" value="{{$user->username}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                @error('username')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name <span class="ml-2 text-red-500 font-weight-bold text-lg">*</span></label>
                <input type="text" name="name" id="name" value="{{$user->name}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{-- email --}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Eamil <span class="ml-2 text-red-500 font-weight-bold text-lg">*</span></label>
                <input type="email" name="email" id="email" value="{{$user->email}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{-- the bio--}}
        <div class="mb-6">
            <label for="about" class="block mb-2 uppercase font-bold text-xs text-gray-700"> Add a Bio</label>
            <textarea name="about" id="about" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                {{$user->about}}
            </textarea>
            @error('about')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        {{-- cover and avatar--}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">avatar</label>
                <input type="file" name="avatar" id="avatar"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="cover" class="block mb-2 uppercase font-bold text-xs text-gray-700">cover</label>
                <input type="file" name="cover" id="cover"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                @error('cover')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{-- password nd conformation --}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password <span class="ml-2 text-red-500 font-weight-bold text-lg">*</span></label>
                <input type="password" name="password" id="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">Confirme The Password <span class="ml-2 text-red-500 font-weight-bold text-lg">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{-- submit button --}}
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-600 mr-4"> Submit </button>
            <a href="{{route('profile',auth()->user())}}" class="hover:underline text-red-500">Cancel</a>
        </div>
    </form>
</x-app>
