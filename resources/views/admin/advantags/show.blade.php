@extends('layouts.admin')

@section('title')
Advantag Show
@endsection
@section('css')
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<!-- Main Content -->
<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
        @endif
        <div class="card-header">
            <h4>Advantag Table Id-> {{ $advantag->id }}</h4>
            <div class="card-header-form">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <tr>
                        <th>Name (UZ)</th>
                        <td>{{ $advantag->name_uz }}</td>
                    </tr>
                    <tr>
                        <th>Name (RU)</th>
                        <td>{{ $advantag->name_ru }}</td>
                    </tr>
                    <tr>
                        <th>Name (En)</th>
                        <td>{{ $advantag->name_en }}</td>
                    </tr>
                    <tr>
                        <th>Title (UZ)</th>
                        <td>{{ $advantag->title_uz }}</td>
                    </tr>
                    <tr>
                        <th>Title (RU)</th>
                        <td>{{ $advantag->title_ru }}</td>
                    </tr>
                    <tr>
                        <th>Title (En)</th>
                        <td>{{ $advantag->title_en }}</td>
                    </tr>
                    <tr>
                        <th>Body (UZ)</th>
                        <td>{!! $advantag->body_uz !!}</td>
                    </tr>
                    <tr>
                        <th>Body (RU)</th>
                        <td>{!! $advantag->body_ru !!}</td>
                    </tr>
                    <tr>
                        <th>Body (EN)</th>
                        <td>{!! $advantag->body_en !!}</td>
                    </tr>
                    <tr>
                        <th>Images</th>
                        <td>
                            @if (!empty($advantag->images))
                            @foreach ($advantag->images as $image)
                            <img alt="image" src="{{ asset('/site/images/advantags/' . $image) }}" width="100" height="100">
                            @endforeach
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
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
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/page/datatables.js"></script>
@endsection