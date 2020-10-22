@extends('front.layouts.master')
@section('title', $article->title)
@section('bg', $article->image)
@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7 mx-auto">
                    {!! $article->content !!}
                    <hr>
                    <div>
                        <span class="text-secondary">Okunma Sayısı: {{ $article->hit }}</span>
                        <span class="text-secondary float-right">Yayınlama Tarihi: {{ $article->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </article>
    @include('front.widgets.categoryWidget')
    <div class="col-md-1"></div>
@endsection
