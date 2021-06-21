@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Activity Log </strong> Dashboard</h3>
        </div>
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
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Employee</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active container" id="home">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Category Logs</h5>
                    </div>
                    <div class="ml-auto">
                        <a href="/posts/create" type="button" class="btn btn-pill btn-secondary">Add</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Subject Id</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($category) > 0)
                                @foreach ($category as $data_out)
                                    <tr>
                                        <td>{{ $data_out->description }}</td>
                                        <td>{{ $data_out->subject_id }}</td>
                                        <td class="table-action d-flex ">
                                            <div class="mt-1">
                                                <a href="/log/{{ $data_out->id }}"><i class="align-middle"
                                                    data-feather="eye"></i></a>
                                            </div>
                                            <form action="/log/{{$data_out->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn" type="submit"><i class=" align-middle ml-3" data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $category->links() }}
        </div>
        <div class="tab-pane container" id="menu1">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Post Logs</h5>
                    </div>
                    <div class="ml-auto">
                        <a href="/posts/create" type="button" class="btn btn-pill btn-secondary">Add</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Subject Id</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($post) > 0)
                                @foreach ($post as $data_out)
                                    <tr>
                                        <td>{{ $data_out->description }}</td>
                                        <td>{{ $data_out->subject_id }}</td>
                                        <td class="table-action d-flex ">
                                            <div class="mt-1">
                                                <a href="/postlog/{{ $data_out->id }}"><i class="align-middle"
                                                    data-feather="eye"></i></a>
                                            </div>
                                            <form action="/log/{{$data_out->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn" type="submit"><i class=" align-middle ml-3" data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $post->links() }}
        </div>
        <div class="tab-pane container" id="menu2">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Employee Logs</h5>
                    </div>
                    <div class="ml-auto">
                        <a href="/posts/create" type="button" class="btn btn-pill btn-secondary">Add</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Subject Id</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($employee) > 0)
                                @foreach ($employee as $data_out)
                                    <tr>
                                        <td>{{ $data_out->description }}</td>
                                        <td>{{ $data_out->subject_id }}</td>
                                        <td class="table-action d-flex ">
                                            <div class="mt-1">
                                                <a href="/employeelog/{{ $data_out->id }}"><i class="align-middle"
                                                    data-feather="eye"></i></a>
                                            </div>
                                            <form action="/log/{{$data_out->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn" type="submit"><i class=" align-middle ml-3" data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $employee->links() }}
        </div>
    </div>
@endsection
