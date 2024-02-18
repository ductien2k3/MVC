@extends('layouts.master')
@section('title')
    Post Show
@endsection
@section('content')

<body>

    <div class="container">
        <h1>Chi tiết : {{ $post['id'] }}</h1>

        <div class="row">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Gía trị</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $post['p_id'] }}</td>
                </tr>
                <tr>
                    <td>Category_id</td>
                    <td>{{ $post['p_category_id'] }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        {{ $post['c_name'] }}
                    </td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $post['p_title'] }}</td>
                </tr>
                <tr>
                    <td>Excerpt</td>
                    <td>{{ $post['p_excerpt'] }}</td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td>{{ $post['p_content'] }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="{{ $post['p_image'] }} " alt="" width="100px"></td>
                </tr>
            </table>
        </div>
    </div>

</body>
@endsection
</html>