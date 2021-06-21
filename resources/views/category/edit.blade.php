@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Add </strong>Category</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/category') }}">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/category/{{ $data->id }}" method="post" ENCTYPE="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-2">
                                <label for="inputUsername">Category Cover Image</label>
                                <img src="/storage/{{ $data->coverImage }}" alt="" class="img-fluid" style="width:200px;">
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="inputUsername">Category Name Amharic</label>
                                    <input type="text" class="form-control @error('nameAm') is-invalid @enderror"
                                        name="nameAm" placeholder="Category Name" value="{{ $data->nameAm }}">
                                    @error('nameAm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Category Description Amharic</label>
                                    <textarea rows="2"
                                        class="form-control ckeditor @error('descriptionAm') is-invalid @enderror"
                                        placeholder="Tell something about yourself"
                                        name="descriptionAm">{{ $data->descriptionAm }}</textarea>
                                    @error('descriptionAm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Category Name English</label>
                                    <input type="text" class="form-control @error('nameEn') is-invalid @enderror"
                                        name="nameEn" placeholder="Category Name" value="{{ $data->nameEn }}">
                                    @error('nameEn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Category Description English</label>
                                    <textarea rows="2"
                                        class="form-control ckeditor @error('descriptionEn') is-invalid @enderror"
                                        placeholder="Tell something about yourself"
                                        name="descriptionEn">{{ $data->descriptionEn }}</textarea>
                                    @error('descriptionEn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="inputUsernam">Category Cover Image</label>
                                        <input type="file" id="coverImage"
                                            class=" @error('coverImage') is-invalid @enderror"
                                            value="{{ $data->coverImage }}" name="coverImage" placeholder="Username">
                                        @error('coverImage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputUsername">Intended Group</label>
                                        <select id="inputState" class="form-control @error('group') is-invalid @enderror"
                                            name="group" placeholder="Employee Password">
                                            <option value="{{ $data->group }}">{{ $data->group }}</option>
                                            <option value="adult">Adults</option>
                                            <option value="kid">Kids</option>
                                            </option>
                                        </select>
                                        @error('group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="inputUsernam">Category Color</label>
                                        <input type="color" class=" @error('color') is-invalid @enderror"
                                            value="{{ $data->color }}" name="color" placeholder="color" style="width:100%">
                                        @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-pill btn-secondary">Update changes</button>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputUsername">Category Cover Image</label><br>
                                <img src="/storage/{{ $data->coverImage }}" alt="" class="img-fluid" style="width:100%">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        CKEDITOR.replace('description');

    </script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageEdit,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageCrop,
            FilePondPluginImageTransform,
        );
        const pond1 = FilePond.create(
            document.querySelector('input[id="coverImage"]'), {
                imagePreviewHeight: 200,
                imageResizeTargetWidth: 800,
                imageResizeTargetHeight: 500,
            }
        );

        FilePond.setOptions({
            server: {
                url: '/category/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

    </script>
@endsection
@endsection
