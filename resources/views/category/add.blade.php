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
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" ENCTYPE="multipart/form-data" id="inputForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="inputUsername">Category Name Amharic</label>
                                            <input type="text" class="form-control @error('nameAm') is-invalid @enderror"
                                                name="nameAm" placeholder="Category Name" id="accept">
                                            @error('nameAm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputUsername">Category Description Amharic</label>
                                                <textarea rows="2"
                                                    class="form-control ckeditor @error('descriptionAm') is-invalid @enderror"
                                                    placeholder="Tell something about yourself" name="descriptionAm"></textarea>
                                                @error('descriptionAm')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="inputUsername">Category Name Emglish</label>
                                            <input type="text" class="form-control @error('nameEn') is-invalid @enderror"
                                                name="nameEn" placeholder="Category Name" id="accept">
                                            @error('nameEn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputUsername">Category Description English</label>
                                                <textarea rows="2"
                                                    class="form-control ckeditor @error('descriptionEn') is-invalid @enderror"
                                                    placeholder="Tell something about yourself" name="descriptionEn"></textarea>
                                                @error('descriptionEn')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="inputUsernam">Category Cover Image</label>
                                            <input type="file" id="coverImage"
                                                class=" @error('coverImage') is-invalid @enderror" name="coverImage"
                                                placeholder="Username" multiple data-allow-reorder="true"
                                                data-max-file-size="3MB" data-max-files="3">
                                            @error('coverImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submitbtn" class="btn btn-pill btn-secondary">Save</button>
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
        const coverImage = document.querySelector('input[id="coverImage"]');

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageEdit,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageCrop,
            FilePondPluginImageTransform,
        );
        const pond1 = FilePond.create(
            document.querySelector('input[id="coverImage"]'),
            {
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
