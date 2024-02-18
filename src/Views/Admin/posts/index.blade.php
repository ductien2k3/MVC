@extends('layouts.master')
@section('title')
    Post List
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Post</h1>
        <p class="mb-4">Danh sách Post</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/admin/posts/create" class="btn btn-info">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Categori ID</th>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Categori ID</th>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($posts as $post)
                                <tr>
                                    <td> {{ $post['p_id'] }} </td>
                                    <td>
                                        {{ $post['c_name'] }}
                                    </td>
                                    <td> {{ $post['p_title'] }} </td>
                                    <td> {{ $post['p_excerpt'] }} </td>
                                    <td> {{ $post['p_content'] }} </td>
                                    <td>
                                        <img src="{{ $post['p_image'] }} " alt="" width="100px">
                                    </td>
                                    <td><a href="/admin/posts/{{ $post['p_id'] }}/update" class="btn btn-warning">Cập
                                            nhật</a>
                                        <a href="/admin/posts/{{ $post['p_id'] }}/show" class="btn btn-info">Xem chi
                                            tiết</a>
                                        <a href="/admin/posts/{{ $post['p_id'] }}/delete"
                                            onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
