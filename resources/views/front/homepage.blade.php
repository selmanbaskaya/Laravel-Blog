@extends('front.layouts.master')
@section('title', 'Selman Başkaya - Kişisel Blog')
@section('content')
    <div class="col-md-1"></div>
    <div class="col-md-7 mx-auto">
        @foreach($articles as $article)
        <div class="post-preview">
            <a href="{{ route('single', [$article->getCategory->slug, $article->slug] )}}">
                <h2 class="post-title">
                    {{ $article->title }}
                </h2>
                <h3 class="post-subtitle">
                    {!! str_limit($article->content, 250, '... Devamını oku.') !!}
                </h3>
            </a>
            <p class="post-meta">
                <a href="#" class="mr-2">Kategori: {{ $article->getCategory->name }}</a>
                <span class="float-right mr-5">{{ $article->created_at->diffForHumans() }}</span>
            </p>
        </div>
            @if(!$loop->last)
            <hr>
            @endif
        @endforeach
    </div>

    @include('front.widgets.categoryWidget')
    <div class="col-md-1"></div>
    <div class="container text-center">
        {{ $articles->links() }}
    </div>
@endsection
