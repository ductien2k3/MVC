@extends('layouts.master')
@section('title')
    Categories Show
@endsection
@section('content')

<body>

    <div class="container">
        <h1>Chi tiết : {{ $categori['name'] }}</h1>

        <div class="row">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Gía trị</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $categori['id'] }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $categori['name'] }}</td>
                </tr>
                
            </table>
        </div>
    </div>

</body>
@endsection
</html>