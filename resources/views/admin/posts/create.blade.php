@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Create Post
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Create Product</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Category selected </label>
                    <select class="form-control" name="category_id" id="">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id}}">{{ $category->name_uz}}</option>

                        @endforeach
                        {{-- select2 --}}
                    </select>
                    @error('category_id')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Title (UZ)</label>
                    <input type="text" class="form-control" name="title_uz" required>
                </div>
                <div class="form-group">
                    <label>Title (RU)</label>
                    <input type="text" class="form-control" name="title_ru" required>
                </div>
                <div class="form-group">
                    <label>Titel (EN)</label>
                    <input type="text" class="form-control" required name="title_en" required>
                </div>
                <div class="form-group">
                    <label>Body (UZ)</label>
                    <textarea type="text" class="form-control ckeditor" required name="body_uz"></textarea>
                    @error('body_uz')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (Ru)</label>
                    <textarea type="text" class="form-control ckeditor" required name="body_ru"></textarea>
                    @error('body_ru')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (EN)</label>
                    <textarea type="text" class="form-control ckeditor" required name="body_en"></textarea>
                    @error('body_en')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" name="images">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                </div>

                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')

<script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('body_uz', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('body_ru', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('body_en', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection