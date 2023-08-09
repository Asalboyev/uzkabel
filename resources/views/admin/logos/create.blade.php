@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Create Logo
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.logos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Create Logo</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label> selected </label>
                    <select class="form-control" name="taken_id" id="">
                        <option value="media">MEDIA</option>
                        <option value="partners">PARTNERS</option>

                        {{-- select2 --}}
                    </select>
                    @error('category_id')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Link</label>
                    <input type="url" class="form-control" name="link">
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" naccept="image/*" name="images[]" multiple>
                </div>


                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection