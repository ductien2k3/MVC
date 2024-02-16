@extends('layouts.master')
@section('content')

<body>

    <div class="container">
        <h1>Chi tiết Người Dùng: {{ $user['name'] }}</h1>

        <div class="row">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Gía trị</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $user['id'] }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $user['name'] }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user['email'] }}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{ $user['password'] }}</td>
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td><img src="{{ $user['avatar'] }} " alt="" width="100px"></td>
                </tr>
            </table>
        </div>
    </div>

</body>
@endsection
</html>