@extends('layouts.admin')

@section('content')
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        /* Style the accordion panel. Note: hidden by default */
        .panel {
            padding: 0 18px;
            background-color: white;
            display: none;
            overflow: hidden;
        }
    </style>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Add </strong>Post</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/posts') }}">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="regForm" action="/posts/{{$data->id}}" method="post" ENCTYPE="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-12">
                                <!-- One "" for each step in the form: -->
                                <h1>English Version</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Title</label>
                                        <input type="text" class="form-control @error('titleEn') is-invalid @enderror"
                                            name="titleEn" placeholder="Title" value="{{$data->titleEn}}">
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
                                            placeholder="Tell something about yourself" name="descriptionEn">{{$data->descriptionEn}}</textarea>
                                        @error('descriptionEn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <button type="button" class="accordion btn">Show English Version Audio</button>
                                        <div class="panel">
                                            <br>
                                            <audio controls width="100%" height="100%">
                                                <source src="/storage/{{ $data->audioEn }}" type="audio/mpeg">
                                            </audio>
                                        </div>
                                        <br>
                                        <hr>
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
                                        <button type="button" class="accordion btn">Show English Version Video </button>
                                        <div class="panel">
                                            <br>
                                            <video width="100%" height="100%" controls>
                                                <source src="/storage/{{ $data->videoEn }}" type="video/mp4">
                                            </video>
                                        </div>
                                        <br>
                                        <hr>
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
                                            name="titleAm" placeholder="Title" value="{{$data->titleAm}}">
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
                                            placeholder="" name="descriptionAm">{{$data->descriptionAm}}</textarea>
                                        @error('descriptionAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <button type="button" class="accordion btn">Show Amharic Version Audio </button>
                                        <div class="panel">
                                            <br>
                                            <audio width="100%" height="100%" controls>
                                                <source src="/storage/{{ $data->audioAm }}" type="video/mp4">
                                            </audio>
                                        </div>
                                        <br>
                                        <hr>
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
                                        <button type="button" class="accordion btn">Show Amharic Version Video </button>
                                        <div class="panel">
                                            <br>
                                            <video width="100%" height="100%" controls>
                                                <source src="/storage/{{ $data->videoAm }}" type="video/mp4">
                                            </video>
                                        </div>
                                        <br>
                                        <hr>
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
                                            name="duration" placeholder="Duration" value="{{$data->duration}}">
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <label for="inputUsername">Intended Group</label>
                                        <select id="inputState" class="form-control @error('group') is-invalid @enderror"
                                            name="group" placeholder="Employee Password">
                                            <option value="{{$data->group}}">{{$data->group}}</option>
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
                                            <option value="{{ $data->category_id }}">{{ $data->category->name }}
                                            </option>
                                            @if (count($category) > 0)
                                                @foreach ($category as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                                        <button type="button" class="accordion btn">Show Cover Image</button>
                                        <div class="panel">
                                            <br>
                                            <img src="/storage/{{$data->image}}" alt="">
                                        </div>
                                        <br>
                                        <hr>
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
                        <button type="submit" class="btn btn-pill btn-secondary">Update</button>
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
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

    </script>
@endsection
@endsection
