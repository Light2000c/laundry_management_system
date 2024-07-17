<div>
    <div class="dark-bg mb-5">
        <div class="dark-content  mb-5 mt-5 pb-5 pt-5">

            <div class="row d-flex justify-content-start">
                <div class="col-11 col-lg-8">
                    <h3 style="font-size: 45px;">Discover expert tips, techniques, and trends for spotless, fresh
                        clothes.
                    </h3>
                    <p
                        style="font-size: 22px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                        Welcome to Your Ultimate Laundry Guide! Discover expert tips, innovative techniques, and the
                        latest
                        trends to keep your clothes spotless and fresh.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-5 pb-5 mb-5">

        <div class="mb-5">

            <div class="row mb-5">
                {{-- @foreach ($blogs as $blog)
                    @if ($loop->index <= 1)
                        <div class="col-12 col-lg-4 h-100 mb-5">
                            <livewire:components.blog-post :blog="$blog" />
                        </div>
                    @else
                        <div class="col-12 col-lg-3 h-100 mb-5">
                            <livewire:components.blog-post  :blog="$blog" />
                        </div>
                    @endif

                    @if ($loop->index === 1)
                        <div class="col-12 col-lg-4 h-100 mb-5">
                            <h5 class="">Latest Posts</h5>
                            <hr>
                            @foreach ($latests as $latest)
                            <livewire:components.blog-post-text :blog="$latest" />
                            @endforeach
                        </div>
                    @endif
                @endforeach --}}

            </div>

            <div class="row mb-5">
                    <div class="col-12 col-lg-4 h-100 mb-5">
                        <h5 class="">Latest Posts</h5>
                        <hr>
                        @foreach ($latests as $latest)
                            <livewire:components.blog-post-text :blog="$latest" />
                        @endforeach
                    </div>

                @foreach ($blogs as $blog)
                    @if ($loop->index <= 1)
                        <div class="col-12 col-lg-4 h-100 mb-5">
                            <livewire:components.blog-post :blog="$blog" />
                        </div>
                    @else
                        <div class="col-12 col-lg-3 h-100 mb-5">
                            <livewire:components.blog-post :blog="$blog" />
                        </div>
                    @endif
                @endforeach

            </div>

            {{ $blogs->withQueryString()->links() }}

        </div>
    </div>
</div>

</div>
