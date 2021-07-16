@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Add </strong>Food</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/Foods') }}">Foods</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="regForm" action="{{ route('food.store') }}" method="post" ENCTYPE="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <!-- One "" for each step in the form: -->
                                <h1>English Version</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="inputUsername">English Name</label>
                                        <input type="text" class="form-control @error('nameEn') is-invalid @enderror"
                                            name="nameEn" placeholder="name">
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
                                            placeholder="Tell something about yourself" name="ingredientsEn"></textarea>
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
                                            placeholder="Tell something about yourself" name="processEn"></textarea>
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
                                            name="nameAm" placeholder="name">
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
                                            placeholder="" name="ingredientsAm"></textarea>
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
                                            placeholder="Tell something about yourself" name="processAm"></textarea>
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
                                            @if(count($category) > 0)
                                                @foreach($category as $data)
                                                    <option value="{{$data->id}}">{{$data->nameEn}}</option>
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
                                        <select id="inputState"
                                            class="form-control @error('foodTime') is-invalid @enderror"
                                            name="foodTime" placeholder="Employee Password">
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
                                            class="form-control @error('recommend') is-invalid @enderror"
                                            name="recommend" placeholder="">
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
                url: '/food/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

    </script>
@endsection
@endsection
