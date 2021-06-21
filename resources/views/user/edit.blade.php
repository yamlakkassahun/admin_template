@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Update </strong>Employee</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/employee') }}">Employee</a></li>
                    <li class="breadcrumb-item active" aria-current="page">update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/employee/{{$data->id}}" method="post" ENCTYPE="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="inputUsername">Employee Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" placeholder="Employee Name" >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <br>

                                        <label for="inputUsername">Employee Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" placeholder="Employee Email" >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <br>

                                        <label for="inputUsername">Employee Phone No</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$data->phone}}" placeholder="Employee Phone" >
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <br>

                                        <label for="inputUsernam">Employee Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{$data->address}}" name="address"
                                            placeholder="Employee Address" >
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <br>

                                        <label for="inputUsernam">Employee Type</label>
                                        <input type="text" class="form-control @error('type') is-invalid @enderror" value="{{$data->type}}" name="type"
                                            placeholder="Employee Password" >
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputUsernam">Employee Profile Image</label>
                                        <input type="file" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="Employee Profile" multiple data-allow-reorder="true"
                                        data-max-file-size="3MB" data-max-files="3" >
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
        const profile = document.querySelector('input[id="image"]');
        FilePond.registerPlugin(
            FilePondPluginImagePreview
        );
        const pond = FilePond.create(profile);
        FilePond.setOptions({
            server: {
                url: '/employee/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection
@endsection
