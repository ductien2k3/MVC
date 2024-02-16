@extends('layouts.master')
@section('content')
<body>
    <div class="container">
        <h1>Thêm mới Post</h1>

        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="category_id" class="form-label">Category_id:</label>

                    <select class="form-select" id="category_id" required name="category_id">
                        <option value="" disabled selected>Vui lòng chọn danh mục</option>

                        @if (isset($categories) && count($categories) > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" @if (!empty($post) && $category['id'] == $post['category_id']) selected @endif>
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        @else
                            <option value="" disabled>Không có danh mục nào</option>
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="title" class="form-control" id="title" required placeholder="Enter title"
                        name="title">
                </div>
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt:</label>
                    <input type="text" class="form-control" id="excerpt" required placeholder="Enter excerpt"
                        name="excerpt">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <input type="text" class="form-control" id="content" required placeholder="Enter content"
                        name="content">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="image" required placeholder="Enter image"
                        name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
@endsection
</html>
