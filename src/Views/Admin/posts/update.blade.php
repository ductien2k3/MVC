@extends('layouts.master')
@section('content')

<body>
    <div class="container">
        <h1>Cập Nhật Post</h1>

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
                    <label for="category_id" class="form-label">Category:</label>
                
                    <select class="form-select" id="category_id" required name="category_id">
                        <option value="" disabled selected>Vui lòng chọn danh mục</option>
                
                        @foreach ($categories as $category)
                            <option 
                                @if ($category['id'] == $post['p_category_id']) selected @endif 
                                value="{{ $category['id'] }}">
                                {{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="title" class="form-control" id="title" required placeholder="Enter title" value="{{ $post['p_title'] }}"
                        name="title">
                </div>
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt:</label>
                    <input type="text" class="form-control" id="excerpt" required placeholder="Enter excerpt" value="{{ $post['p_excerpt'] }}"
                        name="excerpt">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <input type="text" class="form-control" id="content" required placeholder="Enter content" value="{{ $post['p_content'] }}"
                        name="content">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="image"  placeholder="Enter image"
                        name="image">
                        <img src="{{ $post['p_image'] }} " alt="" width="100px">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
@endsection

</html>
