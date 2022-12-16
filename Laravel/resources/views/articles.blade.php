@extends('layout')

@section('content')

<h1>{{$heading}}</h1>

@if(count($articles) == 0)

<p>No articles found</p>

@else

@foreach($articles as $article)

<h2>
    <a href="/articles/{{$article['id']}}"> {{$article['title']}} </a>
</h2>

<p>{{$article['description']}}</p>

@endforeach

@endif

@endsection