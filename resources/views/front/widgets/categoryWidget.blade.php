<div class="col-md-3">
    <div class="card">
        <div class="card-header bg-dark text-light">
            Kategoriler
        </div>
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">{{ $category->name }} <span class="badge bg-success text-light float-right">{{ $category->articleCount() }}</span></li>
            @endforeach
        </ul>
    </div>
</div>
