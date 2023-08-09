@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Abouts
@endsection
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
        @endif
        <div class="card-header">
            <h4>Abouts table</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name(UZ)</th>
                            <th>Title(UZ)</th>
                            <th>Body(UZ)</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($abouts as $about)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $about->name_uz }}</td>
                            <td>{{ $about->title_uz }}</td>
                            <td>{!! $about->body_uz !!}</td>

                            <td>
                                @if (!empty($about['images']) && count($about['images']) > 0)
                                @php($firstImage = $about['images'][0])
                                <img alt="image" src="{{ asset('site/images/abouts/' . $firstImage) }}" width="35">
                                @endif
                            </td>
                            <td>
                                <form style="display: inline" action="{{ route('admin.abouts.destroy',$about->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-danger" onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('admin.abouts.edit',$about->id) }}" class="btn btn-success">Edit</a>

                                <a href="{{ route('admin.abouts.show',$about->id) }}" class="btn btn-warning">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
        </div>
    </div>
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