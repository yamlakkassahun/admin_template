@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Category</strong> Dashboard</h3>
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
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">All Categories</h5>
                    </div>
                    <div class="ml-auto">
                        <form class="form-inline d-none d-sm-inline-block" action="{{ route('category_search') }}"
                            method="post">
                            @csrf
                            <div class="input-group input-group-navbar">
                                <input type="text" class="form-control" name="search" placeholder="Category Search…"
                                    aria-label="Search"
                                    style="border-top-left-radius: 20px;border-bottom-left-radius: 20px;" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"
                                        style="border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                                        <i class="align-middle" data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="/category/create" type="button" class="btn btn-pill btn-secondary">Add</a>
                    </div>
                </div>
                <hr>
                @if (count($data) > 0)
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Category Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data_out)
                                    <tr>
                                        <td>{{ $data_out->nameEn }}</td>
                                        <td>{!! Str::limit($data_out->descriptionEn, 80) !!} </td>
                                        <td class="table-action d-flex ">
                                            <a href="/category/{{ $data_out->id }}/edit"><i class="align-middle mt-2 mr-5"
                                                    data-feather="edit-2"></i></a>
                                            <form action="/category/{{ $data_out->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn widthLimit" type="submit"><i class="align-middle "
                                                        data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center">
                        <img class="img-fluid" src="<?php echo url('/'); ?>/assets/img/not-found.png" alt="" style="width:40%">
                        <h2>No results Found!</h2>
                    </div>
                @endif
            </div>
            {{ $data->links() }}
        </div>
    </div>
@endsection
