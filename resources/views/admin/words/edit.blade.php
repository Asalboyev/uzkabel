@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Edit
@endsection

@section('content')
<div class="col-12 col-md-12 col-lg-12">
    <form action="{{ route('admin.words.update',$word->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Edit Post </h4>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Key</label>
                    <input type="text" class="form-control" name="key" value="{{ $word->key }}">
                    @error('key')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Name (UZ)</label>
                    <textarea type="text" class="form-control ckeditor" name="name_uz" {!! $word->name_uz !!} ></textarea>
                    @error('name_uz')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Name (Ru)</label>
                    <textarea type="text" class="form-control ckeditor" name="name_ru" {!! $word->name_ru !!}></textarea>
                    @error('name_ru')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Name (En)</label>
                    <textarea type="text" class="form-control ckeditor" name="name_en" {!! $word->name_en !!}></textarea>
                    @error('name_en')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>


                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Save</button>
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
    CKEDITOR.replace('name_uz', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('name_ru', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('name_en', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

@endsection