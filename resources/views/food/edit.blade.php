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
                    <li class="breadcrumb-item"><a href="{{ url('/food') }}">Foods</a></li>
                    <li class="breadcrumb-item " aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="regForm" action="/food/{{ $data->id }}" method="post" ENCTYPE="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-2">
                                <label for="inputUsername"> Image</label><br>
                                <img src="/storage/{{ $data->image }}" alt="" class="img-fluid" style="width:200px;">
                            </div>
                            <div class="col-md-10">
                                <!-- One "" for each step in the form: -->
                                <h1>English Version</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Name</label>
                                        <input type="text" class="form-control @error('nameEn') is-invalid @enderror"
                                            name="nameEn" placeholder="name" value="{{ $data->nameEn }}">
                                        @error('nameEn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Ingredients</label>
                                        <textarea rows="2"
                                            class="form-control ckeditor @error('ingredientsEn') is-invalid @enderror"
                                            placeholder="Tell something about yourself"
                                            name="ingredientsEn">{{ $data->ingredientsEn }}</textarea>
                                        @error('ingredientsEn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Process</label>
                                        <textarea rows="2"
                                            class="form-control ckeditor @error('processEn') is-invalid @enderror"
                                            placeholder="Tell something about yourself"
                                            name="processEn">{{ $data->processEn }}</textarea>
                                        @error('processEn')
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
                                        <label for="inputUsername">Amharic Name</label>
                                        <input type="text" class="form-control @error('nameAm') is-invalid @enderror"
                                            name="nameAm" placeholder="name" value="{{ $data->nameAm }}">
                                        @error('nameAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputUsername">Amharic Description</label>
                                        <textarea rows="2"
                                            class="form-control ckeditor @error('ingredientsAm') is-invalid @enderror"
                                            placeholder="" name="ingredientsAm">{{ $data->ingredientsAm }}</textarea>
                                        @error('ingredientsAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputUsername">Amharic Process</label>
                                        <textarea rows="2"
                                            class="form-control ckeditor @error('processAm') is-invalid @enderror"
                                            placeholder="Tell something about yourself"
                                            name="processAm">{{ $data->processAm }}</textarea>
                                        @error('processAm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="inputUsernam">Category</label><br>
                                        <select id="inputState"
                                            class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" placeholder="Employee Password">
                                            @if (count($category) > 0)
                                                <option value="{{ $data->category_id }}">{{ $data->category->nameEn }}
                                                </option>
                                                @foreach ($category as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nameEn }}</option>
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
                                        <label for="inputUsernam">Food Type</label><br>
                                        <select id="inputState" class="form-control @error('foodTime') is-invalid @enderror"
                                            name="foodTime" placeholder="Employee Password">
                                            @if ($data->foodTime == 'breakfast')
                                                <option value="breakfast">Breakfast</option>
                                            @elseif($data->foodTime == "lunch")
                                                <option value="lunch">lunch</option>
                                            @elseif($data->foodTime == "dinner")
                                                <option value="dinner">Denner</option>
                                            @elseif($data->foodTime == "branch")
                                                <option value="branch">Branch</option>
                                            @endif
                                            <option value="breakfast">Breakfast</option>
                                            <option value="lunch">lunch</option>
                                            <option value="dinner">Denner</option>
                                            <option value="branch">Branch</option>
                                        </select>
                                        @error('foodTime')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                    <br>
                                    <div class="col-md-6">
                                        <label for="inputUsernam">Recommend</label><br>
                                        <select id="inputState"
                                            class="form-control @error('recommend') is-invalid @enderror" name="recommend"
                                            placeholder="">
                                            @if ($data->recommend == 'true')
                                                <option value="true">Recommend</option>
                                            @else
                                                <option value="false">not know</option>
                                            @endif
                                            <option value="false">not know</option>
                                            <option value="true">Recommend</option>
                                        </select>
                                        @error('recommend')
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
