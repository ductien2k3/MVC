@extends('layouts.master')

@section('title')
    Danh mục
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Category: {{ $postByCategory[0]['category_name'] }}</h3>
                    @foreach ($postByCategory as $posts)
                        <div class="d-md-flex post-entry-2 half">
                            <a href="/post/{{ $posts['id'] }}" class="me-4 thumbnail">
                                <img src="{{ $posts['image'] }}" alt="" class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">{{ $posts['category_name'] }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h3><a href="/post/{{ $posts['id'] }}">{{ $posts['title'] }}</a></h3>
                                <p>{{ $posts['excerpt'] }}</p>
                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="/assets/client/assets/img/person-2.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">Wade Warren</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-start py-4">
                        <div class="custom-pagination">
                            <a href="#" class="prev">Prevous</a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#" class="next">Next</a>
                        </div>
                    </div>
                </div>

                @include('components.sidebar', ['postTrending' => $postTrending , 'postPopular' => $postPopular])
            </div>

        </div>
        </div>
    </section>
@endsection
