<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4">

        @if (count($articles) == 0)
            <p>No articles found</p>
        @else
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        @endif

    </div>

    <div class="mt-6 p4">
        {{$articles->links()}}
    </div>

</x-layout>
