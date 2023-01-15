@props(['article'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ $article->logo ? asset('storage/' . $article->logo) : asset('images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $article->company }}</div>
            <x-article-tags :tagsCsv="$article->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{ $article->location }}
            </div>
        </div>
    </div>
</x-card>
