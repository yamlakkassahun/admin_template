@extends('layouts.admin')

@section('content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Analytics</strong> Dashboard</h3>
    </div>

    <div class="col-auto ml-auto text-right mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="#">AdminKit</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Analytics</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Categories</h5>
                            <h1 class="display-5 mt-1 mb-3">9 </h1>
                            <div class="mb-1">
                                <span class="text-danger">
                                <span class="text-muted">Total</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Foods</h5>
                            <h1 class="display-5 mt-1 mb-3">0</h1>
                            <div class="mb-1">
                                <span class="text-success">
                                <span class="text-muted">Total</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Authers</h5>
                            <h1 class="display-5 mt-1 mb-3">@if(count($employee) > 0) {{count($employee)}}@else 0 @endif</h1>
                            <div class="mb-1">
                                <span class="text-success">
                                <span class="text-muted">Total</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Customers</h5>
                            <h1 class="display-5 mt-1 mb-3">64,000</h1>
                            <div class="mb-1">
                                <span class="text-danger">
                                <span class="text-muted">Total</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Movement Postes</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
