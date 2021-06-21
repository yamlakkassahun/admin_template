@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Add </strong>Post</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/posts') }}">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="regForm" action="{{ route('posts.store') }}" method="post" ENCTYPE="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <!-- One "" for each step in the form: -->
                                <h1>English Version</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Title</label>
                                        <input type="text" class="form-control @error('titleEn') is-invalid @enderror"
                                            name="titleEn" placeholder="Title">
                                        @error('titleEn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Description</label>
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
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="inputUsernam">English Audio</label><br>
                                        <input type="file" class="@error('audioEn') is-invalid @enderror" name="audioEn"
                                            id="audioEn" placeholder="Employee Profile">
                                        @error('audioEn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputUsernam">English Video</label><br>
                                        <input type="file" class="@error('videoEn') is-invalid @enderror" name="videoEn"
                                            id="videoEn" placeholder="Employee Profile">
                                        @error('videoEn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <h1>Amharic Version</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="inputUsername">Amharic Title</label>
                                        <input type="text" class="form-control @error('titleAm') is-invalid @enderror"
                                            name="titleAm" placeholder="Title">
                                        @error('titleAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputUsername">Amharic Description</label>
                                        <textarea rows="2"
                                            class="form-control ckeditor @error('descriptionAm') is-invalid @enderror"
                                            placeholder="" name="descriptionAm"></textarea>
                                        @error('descriptionAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="inputUsernam">Amharic Audio</label><br>
                                        <input type="file" class="@error('audioAm') is-invalid @enderror" name="audioAm"
                                            id="audioAm" placeholder="Employee Profile" multiple data-allow-reorder="true"
                                            data-max-file-size="3MB" data-max-files="3">
                                        @error('audioAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputUsernam">Amharic Video</label><br>
                                        <input type="file" class="@error('videoAm') is-invalid @enderror" name="videoAm"
                                            id="videoAm" placeholder="Employee Profile" multiple data-allow-reorder="true"
                                            data-max-file-size="3MB" data-max-files="3">
                                        @error('videoAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="inputUsername">Duration</label>
                                        <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                            name="duration" placeholder="Duration">
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <label for="inputUsername">Intended Group</label>
                                        <select id="inputState" class="form-control @error('group') is-invalid @enderror"
                                            name="group" placeholder="Employee Password">
                                            <option value="adult">Adults</option>
                                            <option value="kid">Kids</option>
                                            </option>
                                        </select>
                                        @error('group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <label for="inputUsernam">Category</label><br>
                                        <select id="inputState"
                                            class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" placeholder="Employee Password">
                                            @if(count($category) > 0)
                                                @foreach($category as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="inputUsernam">Cover Image</label><br>
                                        <input type="file" class="@error('image') is-invalid @enderror" id="image"
                                            name="image" placeholder="Employee Profile" multiple data-allow-reorder="true"
                                            data-max-file-size="3MB" data-max-files="3">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-pill btn-secondary">Save</button>
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
        const audioAm = document.querySelector('input[id="audioAm"]');
        const audioEn = document.querySelector('input[id="audioEn"]');
        const videoEn = document.querySelector('input[id="videoEn"]');
        const videoAm = document.querySelector('input[id="videoAm"]');



        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageEdit,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageCrop,
            FilePondPluginImageTransform,
        );

        const pond = FilePond.create(
            document.querySelector('input[id="image"]'), {
                imagePreviewHeight: 200,
                imageResizeTargetWidth: 800,
                imageResizeTargetHeight: 500,
            }
        );

        const pond1 = FilePond.create(audioAm);
        const pond2 = FilePond.create(audioEn);
        const pond3 = FilePond.create(videoEn);
        const pond4 = FilePond.create(videoAm);

        FilePond.setOptions({
            server: {
                url: '/posts/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

    </script>
@endsection
@endsection
