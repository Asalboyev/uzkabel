@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Update Advatag
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.advantags.update', $advantag->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Update Post</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Name (UZ)</label>
                    <input type="text" class="form-control" name="name_uz" value="{{ $advantag->name_uz }}">
                    @error('name_uz')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Name (Ru)</label>
                    <input type="text" class="form-control" name="name_ru" value="{{ $advantag->name_ru }}">
                    @error('name_ru')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Name (Ru)</label>
                    <input type="text" class="form-control" name="name_en" value="{{ $advantag->name_en }}">
                    @error('name_en')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Title (UZ)</label>
                    <input type="text" class="form-control" name="title_uz" value="{{ $advantag->title_uz }}">
                    @error('title_uz')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Title (Ru)</label>
                    <input type="text" class="form-control" name="title_ru" value="{{ $advantag->title_ru }}">
                    @error('title_ru')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Title (Ru)</label>
                    <input type="text" class="form-control" name="title_en" value="{{ $advantag->title_en }}">
                    @error('title_en')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (UZ)</label>
                    <textarea type="text" class="form-control ckeditor" name="body_uz" {!! $advantag->body_uz !!} ></textarea>
                    @error('body_uz')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (Ru)</label>
                    <textarea type="text" class="form-control ckeditor" name="body_ru" {!! $advantag->body_ru !!}></textarea>
                    @error('body_ru')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (En)</label>
                    <textarea type="text" class="form-control ckeditor" name="body_en" {!! $advantag->body_en !!}></textarea>
                    @error('body_en')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" accept="image/*" name="images[]" multiple>
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


{{-- <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script> --}}
{{-- <script>
        // $('textarea').ckeditor();
        $('.ckeditor').ckeditor(); // if class is prefered.
    </script> --}}

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