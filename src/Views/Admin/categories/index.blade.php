@extends('layouts.master')
@section('title')
    Categories List
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <p class="mb-4">Quản lý Categories</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/admin/categories/create" class="btn btn-info">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Chức năng</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $categori)
                                <tr role="row" class="odd" id="row-{{ $categori['id'] }}">
                                    <td class="sorting_1">{{ $categori['id'] }} </td>
                                    <td>{{ $categori['name'] }}</td>
                                    <td><a href="/admin/categories/{{ $categori['id'] }}/update" class="btn btn-warning">Cập
                                            nhật</a>
                                        <a href="/admin/categories/{{ $categori['id'] }}/show" class="btn btn-info">Xem chi
                                            tiết</a>
                                        <a href="/admin/categories/{{ $categori['id'] }}/delete"
                                            onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
