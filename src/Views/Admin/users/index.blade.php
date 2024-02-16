@extends('layouts.master')
@section('content')
<body>

    <div class="container">
        <h1>Danh sách Người Dùng</h1>
        
        <a href="/admin/users/create" class="btn btn-info">Thêm mới</a>

        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Avatar</th>
                    <th>Action</th>
                </tr>

                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user['id'] }} </td>
                        <td> {{ $user['name'] }} </td>
                        <td> {{ $user['email'] }} </td>
                        <td> {{ $user['password'] }} </td>
                        <td> 
                            <img src="{{ $user['avatar'] }} " alt="" width="100px">
                        </td>
                        <td><a href="/admin/users/{{ $user['id'] }}/update" class="btn btn-warning">Cập nhật</a>
                            <a href="/admin/users/{{ $user['id'] }}/show" class="btn btn-info">Xem chi tiết</a>
                            <a href="/admin/users/{{ $user['id'] }}/delete"
                                onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

</body>
@endsection

</html>