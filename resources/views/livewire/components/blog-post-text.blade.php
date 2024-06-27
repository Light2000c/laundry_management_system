<div class="">
    <div class="card border-0">
        <div class="card-body">
            <small style="color: #9a8105;">{{ $this->formatDate($blog->created_at)  }}</small>
            <h5 class="card-title" style="font-weight: bold;">{{ $blog->title }}</h5>
            <p class="card-text" >{!! Str::words($blog->description, 16) !!}</p>
            <a href="#" class="" style="text-decoration: none;">Read more <i
                    class="bi bi-arrow-right-short"></i></a>
        </div>
    </div>
</div>