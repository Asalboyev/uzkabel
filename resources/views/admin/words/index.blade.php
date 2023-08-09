@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/admin/assets/css/app.min.css">
<!-- Template CSS -->
<link rel="stylesheet" href="/admin/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/admin/assets/css/style.css">
<link rel="stylesheet" href="/admin/assets/css/components.css">
<!-- Custom style CSS -->
<link rel="stylesheet" href="/admin/assets/css/custom.css">
<link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

@endsection
@section('title')
words
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Export Table</h4>
                <div class="card-header-form">
                    <a href="{{ route('admin.words.create') }}" class="btn btn-primary">create</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Key</th>
                                <th>Name (UZ)</th>
                                <th>Name (RU)</th>
                                <th>Name (EN)</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($words as $word)

                            <tr>
                                <td>
                                    {{ $loop->iteration}}
                                </td>
                                <td>{{ $word->key}}</td>

                                <td>
                                    @php
                                    $text = $word->name_uz;
                                    $chunks = str_split($text, 30);
                                    echo implode('<br>', $chunks);
                                    @endphp
                                </td>
                                <td>
                                    @php
                                    $text = $word->name_ru;
                                    $chunks = str_split($text, 30);
                                    echo implode('<br>', $chunks);
                                    @endphp
                                </td>
                                <td>
                                    @php
                                    $text = $word->name_en;
                                    $chunks = str_split($text, 30);
                                    echo implode('<br>', $chunks);
                                    @endphp
                                </td>

                                <td style="d-flex">
                                    {{-- <a href="{{ route('admin.words.destroy',$word->id) }}" class="btn btn-primary">Detail</a> --}}
                                    <a href="{{ route('admin.words.edit',$word->id) }}" class="btn btn-success">Edit</a>
                                    <form style="display:inline" action="{{ route('admin.words.destroy',$word->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button href="#" class="btn btn-danger" type="submit" onclick="return confirm('O\'chrishni xohlaysizmi')">Detail</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/admin/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
<script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin/assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
<script src="/admin/assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
<script src="/admin/assets/bundles/datatables/export-tables/jszip.min.js"></script>
<script src="/admin/assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
<script src="/admin/assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
<script src="/admin/assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
<script src="/admin/assets/js/page/datatables.js"></script>
<!-- Template JS File -->
<script src="/admin/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/admin/assets/js/custom.js"></script>
@endsection