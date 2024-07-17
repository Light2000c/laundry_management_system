<div class="card border-0">
    <img src="/storage/blog_images/{{ $blog->image }}" height="250px"
        class="card-img-top" alt="...">
    <div class="card-body">
        <p style="color: #9a8105;"><i class="bi bi-alarm me-2"></i>{{ $this->formatDate($blog->created_at)  }}</p>
        <h5 class="card-title" style="font-weight: bold;">{{ Str::limit($blog->title, 47) }}</h5>
        <p class="card-text">{!! Str::words($blog->description, 16) !!}</p>

        <button class="btn btn-outline-primary btn-sm">READ ARTICLE</button>
    </div>
</div>
