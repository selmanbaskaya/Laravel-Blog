@extends('back.layouts.master')
@section('title', 'Tüm Sayfalar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $pages->count() }}</strong> adet makale mevcut
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Başlık</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td><img class="img-thumbnail" src="{{ $page->image }}" width="150"></td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <input class="switchStatus" articleIdd="{{ $page->id }}" type="checkbox" data-on="Aktif" data-onstyle="success" data-off="Pasif" data-offstyle="danger"
                                       @if($page->status==1) checked @endif data-toggle="toggle">
                            </td>
                            <td>
                                <a target="_blank" href="{{ route('page', $page->slug) }}" title="Görüntüle" class="btn btn-sm btn-success m-2"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.page.edit', $page->id) }}" title="Düzenle" class="btn btn-sm btn-warning m-2"><i class="fa fa-pen"></i></a>
                                <a href="{{ route('admin.page.delete', $page->id) }}" title="Sil" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switchStatus').change(function() {
                id = $(this)[0].getAttribute('articleIdd');
                status = $(this).prop('checked');
                alert(status);
                $.get("{{ route('admin.page.switch') }}", {id: id, status:status}, function (data, status){
                });
            })
        })
    </script>
@endsection
