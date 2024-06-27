<div>
    <div class="dark-bg mb-5">
        <div class="dark-content  mb-5 mt-5 pb-5 pt-5">

            <div class="row d-flex justify-content-center">
                <div class="col-11 col-lg-8 text-center">
                    <h3 style="font-size: 45px;">BLOG / {{ $blog->title }}
                    </h3>
                    <p
                        style="font-size: 22px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                    <p><i class="bi bi-alarm me-2"></i>{{ $this->formatDate($blog->date) }}</p>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-5 pb-5">
        <div class="row g-5">
            <div class="col-10 col-lg-9">
                <div class="mb-4">
                    <img src="/storage/blog_images/{{ $blog->image }}" class="card-img-top" alt="...">
                </div>

                <div>
                    {!! $blog->description !!}
                </div>
            </div>

            <div class="col-10 col-lg-3">
                <p>Latest Posts</p>
                <hr>
                @foreach ($latests as $latest)
                    <livewire:components.blog-post-text :blog="$latest">
                @endforeach
            </div>
        </div>
    </div>



</div>
