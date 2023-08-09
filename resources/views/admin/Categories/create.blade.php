@extends('layouts.admin')
@section('title')
Create Category
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Create Category</h4>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Selected </label>
                    <select class="form-control" name="taken" id="">
                        <option value="post">Post</option>
                        <option value="product">Product</option>
                        {{-- select2 --}}
                    </select>
                    @error('taken')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Name (UZ)</label>
                    <input type="text" class="form-control" required name="name_uz" @error('name_uz') is-invalid @enderror>
                    @error('name_uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Name (RU)</label>
                    <input type="text" class="form-control" name="name_ru" required>
                </div>
                <div class="form-group">
                    <label>Name (EN)</label>
                    <input type="text" class="form-control" name="name_en" required>
                </div>
                {{-- <div class="form-group">--}}
                {{-- <label>Slug</label>--}}
                {{-- <input type="text" class="form-control" name="slug">--}}
                {{-- </div>--}}
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" name="images">
                </div>


                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection