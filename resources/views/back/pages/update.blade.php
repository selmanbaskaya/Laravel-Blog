@extends('back.layouts.master')
@section('title', $page->title . " Sayfasını Güncelle")
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ route('admin.page.edit.post', $page->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" name="title" class="form-control" value="{{ $page->title }}" required>
                </div>
                <div class="form-group">
                    <label>Kapak Fotoğrafı</label><br>
                    <img class="img-thumbnail" width="300" src="{{ asset($page->image) }}"><br><br>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>İçerik</label>
                    <textarea name="artContent" rows="5" class="form-control editor">{!! $page->content !!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editor').summernote({
                'height':500
            });
        });
    </script>
@endsection
