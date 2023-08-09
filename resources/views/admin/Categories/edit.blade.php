@extends('layouts.admin')
@section('title')
Update Category
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Update Category</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Selected </label>
                    <select name="taken" class="form-control select2">
                        <option value="{{$category->taken }}" selected="false" disabled="disabled">{{$category->taken}}</option>
                        <option value="post">Post</option>
                        <option value="product">Product</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>Name (UZ)</label>
                    <input type="text" class="form-control" name="name_uz" value="{{$category->name_uz }}">
                </div>
                <div class="form-group">
                    <label>Name (RU)</label>
                    <input type="text" class="form-control" name="name_ru" value="{{$category->name_ru }}">
                </div>
                <div class="form-group">
                    <label>Name (RU)</label>
                    <input type="text" class="form-control" name="name_en" value="{{$category->name_en }}">
                </div>

                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" name="images" value="{{$category->images }}">
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection