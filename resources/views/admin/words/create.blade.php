@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Word create
@endsection
@section('content')
<div class="col-12 col-sm-15 col-lg-15">
    <form action="{{ route('admin.words.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Word create</h4>
            </div>
            <div class="card-body">
                <div class="form-group col-md-9 col-lg-9">
                    <label>Key</label>
                    <input type="text" class="form-control" name="key" placeholder="Key" required>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-1">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="uz-tab4" data-toggle="tab" href="#uz4" role="tab" aria-controls="uz" aria-selected="true">UZ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ru-tab4" data-toggle="tab" href="#ru4" role="tab" aria-controls="ru" aria-selected="false">RU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="en-tab4" data-toggle="tab" href="#en4" role="tab" aria-controls="en" aria-selected="false">EN</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade active show" id="uz4" role="tabpanel" aria-labelledby="uz-tab4">
                                <div class="form-group">
                                    <label>Name (UZ)</label>
                                    <textarea type="text" class="form-control ckeditor" name="name_uz" required></textarea>
                                    @error('name_uz')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ru4" role="tabpanel" aria-labelledby="ru-tab4">
                                <div class="form-group">
                                    <label>Name (Ru)</label>
                                    <textarea type="text" class="form-control ckeditor" name="name_ru" required></textarea>
                                    @error('name_ru')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade" id="en4" role="tabpanel" aria-labelledby="en-tab4">
                                <div class="form-group">
                                    <label>Name (EN)</label>
                                    <textarea type="text" class="form-control ckeditor" name="name_en" required></textarea>
                                    @error('name_en')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="input-group-append" style="margin: 1rem 1rem">
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