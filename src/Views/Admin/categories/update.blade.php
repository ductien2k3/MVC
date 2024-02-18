@extends('layouts.master')
@section('title')
    Categories Update
@endsection
@section('content')

<body>

    <div class="container">
        <h1>Cập nhật : {{ $categori['name'] }}</h1>
        <a href="/admin/categories" class="btn btn-info">Quay Lại</a>
        <div class="row">

            @if(!empty($_SESSION['success']))
                <div class="alert alert-success">
                    {{ $_SESSION['success'] }}
                </div>

                @php
                    $_SESSION['success'] = null;
                @endphp
            @endif

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" required
                        placeholder="Enter name" value="{{ $categori['name'] }}" name="name">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
@endsection
</html>