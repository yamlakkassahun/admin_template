@extends('layouts.admin')

@section('content')

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Settings</h1>
        <div class="col-md-12">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        <strong>Hello there! </strong>{{ session('error') }}
                    </div>
                </div>
            @elseif(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        <strong>Hello there! </strong>{{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account"
                            role="tab">
                            Account
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                            Password
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Private info</h5>
                            </div>
                            <div class="card-body">
                                <form action="/profile/{{ Auth::user()->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputFirstName">Full Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ Auth::user()->name }}" id="inputFirstName"
                                                placeholder="First name" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastName">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ Auth::user()->email }}" id="inputLastName"
                                                placeholder="Email" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Address</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                                name="address" value="{{ Auth::user()->address }}" id="inputCity" />
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Phone</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ Auth::user()->phone }}" id="inputCity" />
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Profile Image</label>
                                            <input type="file" class="form-contro @error('image') is-invalid @enderror"
                                                name="image" id="image" multiple data-allow-reorder="true"
                                                data-max-file-size="3MB" data-max-files="3">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Update changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Password</h5>
                                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="inputPasswordCurrent">Current password</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                            id="inputPasswordCurrent" />
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew">New password</label>
                                        <input type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password"
                                            id="inputPasswordNew" />
                                            @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew2">Verify password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                            id="inputPasswordNew2" />
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
@endSection
