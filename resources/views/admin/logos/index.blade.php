@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Logos
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
            <h4>Logo table</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.logos.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Taken</th>
                            <th>Link</th>
                            <th>logo</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($logos as $logo)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $logo->taken_id }}</td>

                            <td><a href="{{ $logo->link }}">Link</a></td>
                            <td>
                                @if (!empty($logo['images']) && count($logo['images']) > 0)
                                @php($firstImage = $logo['images'][0])
                                <img alt="image" src="{{ asset('site/images/logos/' . $firstImage) }}" width="35">
                                @endif
                            </td>
                            <td>
                                <form style="display: inline" action="{{ route('admin.logos.destroy',$logo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-danger" onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('admin.logos.edit',$logo->id) }}" class="btn btn-success">Edit</a>

                                <a href="{{ route('admin.logos.show',$logo->id) }}" class="btn btn-warning">Show</a>
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


@endsection