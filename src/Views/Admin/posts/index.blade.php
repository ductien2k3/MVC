@extends('layouts.master')
@section('content')
<body>

    <div class="container">
        <h1>Danh sách Post</h1>
        
        <a href="/admin/posts/create" class="btn btn-info">Thêm mới</a>

        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Categori ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

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
                        <td><a href="/admin/posts/{{ $post['p_id'] }}/update" class="btn btn-warning">Cập nhật</a>
                            <a href="/admin/posts/{{ $post['p_id'] }}/show" class="btn btn-info">Xem chi tiết</a>
                            <a href="/admin/posts/{{ $post['p_id'] }}/delete"
                                onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

</body>
@endsection
</html>