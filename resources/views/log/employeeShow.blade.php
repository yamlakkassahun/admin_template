@extends('layouts.admin')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Post </strong> Dashboard</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/log') }}">Acttivity Log</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Oppration: {{$data->description}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Oppration Done By: {{$user->name}}</h5>
                    </div>
                    <div class="ml-auto">
                        <h5 class="card-title">User Role: {{$user->type}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        @if($data->description != 'created')
                        <h5 class="card-title">New Data</h5>
                        @else
                        <h5 class="card-title">Data</h5>
                        @endif
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-2">
                        <h4 class="text-center">Logo</h4>
                        @if($data->properties['attributes']['image'] != null)
                            <img class="img-fluid" src="/storage/{{$data->properties['attributes']['image']}}" alt="">
                        @endif
                    </div>
                    <div class="col-md-10">
                        <h5><b>Name</b> :{{$data->properties['attributes']['name']}}</h5>
                        <h5><b>Email</b> :{{$data->properties['attributes']['email']}}</h5>
                        <h5><b>Address</b> :{{$data->properties['attributes']['address']}}</h5>
                        <h5><b>Phone</b> :{{$data->properties['attributes']['phone']}}</h5>
                        <h5><b>Type</b> :{{$data->properties['attributes']['type']}}</h5>
                    </div>
                </div>
            </div>
        </div>
        @if($data->description != 'created')
        <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        @if($data->description != 'created')
                        <h5 class="card-title">New Data</h5>
                        @else
                        <h5 class="card-title">Data</h5>
                        @endif
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-2">
                        <h4 class="text-center">Logo</h4>
                        @if($data->properties['old']['image'] != null)
                            <img class="img-fluid" src="/storage/{{$data->properties['old']['image']}}" alt="">
                        @endif
                    </div>
                    <div class="col-md-10">
                        <h5><b>Name</b> :{{$data->properties['old']['name']}}</h5>
                        <h5><b>Email</b> :{{$data->properties['old']['email']}}</h5>
                        <h5><b>Address</b> :{{$data->properties['old']['address']}}</h5>
                        <h5><b>Phone</b> :{{$data->properties['old']['phone']}}</h5>
                        <h5><b>Type</b> :{{$data->properties['old']['type']}}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
