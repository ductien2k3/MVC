<div class="col-md-3">
    <!-- ======= Sidebar ======= -->
    <div class="aside-block">

        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular"
                    aria-selected="true">Popular</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending"
                    type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                aria-labelledby="pills-popular-tab">
                @foreach ($postPopular as $popular)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $popular['c_name'] }}</span> <span class="mx-1">&bullet;</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="/post/{{ $popular['p_id'] }}">{{ $popular['p_title'] }}</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                @endforeach
            </div> <!-- End Popular -->

            <!-- Trending -->
            <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                @foreach ($postTrending as $trending)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $trending['category_name'] }}</span> <span
                                class="mx-1">&bullet;</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="/post/{{ $trending['id'] }}">{{ $trending['title'] }}</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                @endforeach


            </div> <!-- End Trending -->
        </div>
    </div>
</div>
