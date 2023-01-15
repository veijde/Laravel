<x-layout>
    @include('partials._search')
    <a href="/" class="inline-block ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $article->logo ? asset('storage/' . $article->logo) : asset('images/no-image.png') }}"
                    alt="" />

                <x-article-tags :tagsCsv="$article->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-calendar"></i>
                    {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <h3 class="text-2xl mb-2">{{ $article->title }}</h3>
                <div class="text-lg space-y-6">
                    {{ $article->description }}

                </div>
            </div>
        </x-card>
    </div>
</x-layout>
