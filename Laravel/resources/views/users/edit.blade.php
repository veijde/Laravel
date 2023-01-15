<x-layout>
    <x-card class=" p-10 max-w-lg mx-auto mt-24 text-black">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit
            </h2>
            <p class="mb-4">Edit your account</p>
        </header>

        <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$user->name}}" />

                @error('name')
                    <p class="text-red-500 text-xs-mt1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$user->email}}" />
                @error('email')
                    <p class="text-red-500 text-xs-mt1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
            </div>

            @error('password')
                    <p class="text-red-500 text-xs-mt1">{{$message}}</p>
                @enderror

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
            </div>

            @error('password_confirmation')
                    <p class="text-red-500 text-xs-mt1">{{$message}}</p>
                @enderror

            <div class="mb-6">
                <label for="aboutme" class="inline-block text-lg mb-2">
                    About me
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="aboutme" rows="10"
                    placeholder="Short 'about me' biography ">
                    {{ $user->aboutme }}
                </textarea>
                @error('aboutme')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="picture" class="inline-block text-lg mb-2">
                    Profile picture
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture" />
                @error('picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
