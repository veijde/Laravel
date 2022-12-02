<h1>{{$heading}}</h1>

@if(count($articles) == 0)

<p>No articles found</p>

@else

@foreach($articles as $article)

<h2>{{$article['title']}}</h2>

<p>{{$article['content']}}</p>

@endforeach

@endif