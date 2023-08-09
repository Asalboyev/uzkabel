@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Update Logo
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.logos.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Update Logo</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Selected </label>
                    <select name="taken_id" class="form-control select2">
                        <option value="{{$logo->taken_id }}" selected="false" disabled="disabled">{{$logo->taken_id}}</option>
                        <option value="media">MEDIA</option>
                        <option value="partners">PARTNERS</option>

                    </select>
                    <div class="form-group">
                        <label>Link </label>
                        <input type="text" class="form-control" name="link" value="{{ $logo->link }}">
                        @error('link')
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