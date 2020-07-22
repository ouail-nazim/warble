<x-master>
    <div class="container mx-auto  flex justify-center" >
        <div class="px-6 py-4 bg-gray-300 rounded-lg" style="width: 500px; max-width: 500px;">
            @if($errors->any())
                <x-formPOP></x-formPOP>
            @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3">
                                <label for="username" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> {{ __('User Name') }} </label>
                                <input id="username" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  name="username" type="text" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                <p class="text-gray-600 text-xs italic">must be unique</p>
                                @error('username')
                                     <p class="text-red-500 text-xs italic">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Name') }}</label>
                                <input id="name" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <p class="text-red-500 text-xs italic">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Email') }}</label>
                                <input id="email" type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <p class="text-red-500 text-xs italic">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="password" required autocomplete="new-password" autofocus>
                                <p class="text-gray-600 text-xs italic">At leest 8 char</p>
                                @error('password')
                                <p class="text-red-500 text-xs italic">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label for="password-confirm" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="password_confirmation" required autocomplete="new-password" autofocus>
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                    Register
                                </button>

                        </div>
                    </form>
                </div>

        </div>


</x-master>

