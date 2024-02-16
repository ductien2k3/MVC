@extends('layouts.master')
@section('content')
<body>

    <div class="container">
        <h1>Danh sách </h1>

        <a href="/admin/categories/create" class="btn btn-info">Thêm mới</a>

        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                </tr>

                @foreach ($categories as $categori)
                    <tr>
                        <td> {{ $categori['id'] }} </td>
                        <td> {{ $categori['name'] }} </td>

                        <td><a href="/admin/categories/{{ $categori['id'] }}/update" class="btn btn-warning">Cập
                                nhật</a>
                            <a href="/admin/categories/{{ $categori['id'] }}/show" class="btn btn-info">Xem chi tiết</a>
                            <a href="/admin/categories/{{ $categori['id'] }}/delete"
                                onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

</body>

@endsection

