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
            <h3><strong>Post </strong> Dashboard</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/log') }}">Acttivity Log</a></li>
                    <li class="breadcrumb-item" aria-current="page">Show</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Oppration: {{ $data->description }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <h5 class="card-title">Oppration Done By: {{ $user->name }}</h5>
                    </div>
                    <div class="ml-auto">
                        <h5 class="card-title">User Role: {{ $user->type }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        @if ($data->description != 'created')
                            <h5 class="card-title">New Data</h5>
                        @else
                            <h5 class="card-title">Data</h5>
                        @endif
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-2">
                        <h4 class="text-center">Cover Image</h4>
                        <img class="img-fluid" src="/storage/{{ $data->properties['attributes']['image'] }}" alt="">
                    </div>
                    <div class="col-md-10">
                        <h5><b>Title in English</b> :{{ $data->properties['attributes']['titleEn'] }}</h5>
                        <h5><b>Title in Amharic</b> :{{ $data->properties['attributes']['titleAm'] }}</h5>
                        <h5><b>Group</b> :{{ $data->properties['attributes']['group'] }}</h5>
                        <h5><b>Duration</b> :{{ $data->properties['attributes']['duration'] }}</h5>
                        <p><b>Description in English</b> :{!! $data->properties['attributes']['descriptionEn'] !!}</p>
                        <hr>
                        <p><b>Descriptionin Amharic</b> :{!! $data->properties['attributes']['descriptionAm'] !!}</p>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="accordion btn">Show Amharic Version Audio </button>
                        <div class="panel">
                            <br>
                            <audio width="100%" height="100%" controls>
                                <source src="/storage/{{ $data->properties['attributes']['audioAm'] }}" type="audio/mpeg">
                            </audio>
                        </div>
                        <br>
                        <hr>
                        <button type="button" class="accordion btn">Show Amharic Version Audio </button>
                        <div class="panel">
                            <br>
                            <audio width="100%" height="100%" controls>
                                <source src="/storage/{{ $data->properties['attributes']['audioEn'] }}" type="audio/mpeg">
                            </audio>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="accordion btn">Show Amharic Version Video </button>
                        <div class="panel">
                            <br>
                            <video width="100%" height="100%" controls>
                                <source src="/storage/{{ $data->properties['attributes']['videoAm'] }}" type="video/mp4">
                            </video>
                        </div>
                        <br>
                        <hr>
                        <button type="button" class="accordion btn">Show Amharic Version Video </button>
                        <div class="panel">
                            <br>
                            <video width="100%" height="100%" controls>
                                <source src="/storage/{{ $data->properties['attributes']['videoEn'] }}" type="video/mp4">
                            </video>
                        </div>
                        <br>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        @if ($data->description != 'created')
            <hr>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <div>
                            @if ($data->description != 'created')
                                <h5 class="card-title">New Data</h5>
                            @else
                                <h5 class="card-title">Data</h5>
                            @endif
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-2">
                            <h4 class="text-center">Cover Image</h4>
                            <img class="img-fluid" src="/storage/{{ $data->properties['old']['image'] }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h5><b>Title in English</b> :{{ $data->properties['old']['titleEn'] }}</h5>
                            <h5><b>Title in Amharic</b> :{{ $data->properties['old']['titleAm'] }}</h5>
                            <h5><b>Group</b> :{{ $data->properties['old']['group'] }}</h5>
                            <h5><b>Duration</b> :{{ $data->properties['old']['duration'] }}</h5>
                            <p><b>Description in English</b> :{!! $data->properties['old']['descriptionEn'] !!}</p>
                            <hr>
                            <p><b>Descriptionin Amharic</b> :{!! $data->properties['old']['descriptionAm'] !!}</p>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="accordion btn">Show Amharic Version Audio </button>
                            <div class="panel">
                                <br>
                                <audio width="100%" height="100%" controls>
                                    <source src="/storage/{{ $data->properties['old']['audioAm'] }}" type="audio/mpeg">
                                </audio>
                            </div>
                            <br>
                            <hr>
                            <button type="button" class="accordion btn">Show Amharic Version Audio </button>
                            <div class="panel">
                                <br>
                                <audio width="100%" height="100%" controls>
                                    <source src="/storage/{{ $data->properties['old']['audioEn'] }}" type="audio/mpeg">
                                </audio>
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="accordion btn">Show Amharic Version Video </button>
                            <div class="panel">
                                <br>
                                <video width="100%" height="100%" controls>
                                    <source src="/storage/{{ $data->properties['old']['videoAm'] }}" type="video/mp4">
                                </video>
                            </div>
                            <br>
                            <hr>
                            <button type="button" class="accordion btn">Show Amharic Version Video </button>
                            <div class="panel">
                                <br>
                                <video width="100%" height="100%" controls>
                                    <source src="/storage/{{ $data->properties['old']['videoEn'] }}" type="video/mp4">
                                </video>
                            </div>
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
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
