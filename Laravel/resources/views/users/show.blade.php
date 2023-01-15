<x-layout>
    <a href="/" class="inline-block ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ $user->picture ? asset('storage/' . $user->picture) : asset('images/no-image.png') }}" alt="" />
                <h3 class="text-2xl mb-2"><strong>Username: </strong>{{ $user->name }}</h3>
                <h3 class="text-2xl mb-2"><strong>Birthday: </strong>{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y')}}</h3>
                <h3 class="text-2xl mb-2"><strong>About me: </strong></h3>
                <p text-2xl mb-2>{{$user->aboutme}}</p>
            </div>
        </x-card>
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/users/{{$user->id}}/edit">
                <i class="fa-solid fa-pencil"></i>
                Edit
            </a>
            @if (auth()->user()->admin)
                @if (!$user->admin)
                    <a href="/users/{{$user->id}}/promote">
                        <i class="fa-solid fa-pencil"></i>
                        Promote to admin
                    </a>
                @endif
            @endif
        </x-card>
    </div>
</x-layout>
