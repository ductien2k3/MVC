@extends('layouts.master')
@section('title')
    Categories Create
@endsection
@section('content')
<body>
    <div class="container">
        <h1>Thêm mới</h1>

        <div class="row">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" required
                        placeholder="Enter name" name="name">
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
@endsection