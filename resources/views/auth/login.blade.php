<x-master>
<div class="container mx-auto my-16 flex justify-center" >
    <div class="px-6 py-4 bg-gray-300 rounded-lg" style="width: 500px; max-width: 500px;">
        @if($errors->any())
            <x-formPOP></x-formPOP>
        @endif
        <form class="w-full max-w-sm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                           for="email">
                        Full Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 @error('email') is-invalid @enderror "
                           id="email"
                           type="email"
                           name="email"
                           placeholder="example@mail.com"
                           value="{{ old('email') }}"
                           required
                    >
                </div>
            </div>
            @error('email')
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    </div>
                    <div class="md:w-2/3 text-red-500">
                        {{ $message }}
                    </div>
                </div>
            @enderror
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-700 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                        Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="password"
                           type="password"
                           placeholder="******************"
                           class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 @error('password') is-invalid @enderror"
                           name="password" required
                           autocomplete="current-password">
                </div>
            </div>
            @error('password')
                <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                </div>
                <div class="md:w-2/3 text-red-500">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3"></div>
                <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="md:w-2/3 block text-gray-500 font-bold" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Sign Up
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</x-master>
