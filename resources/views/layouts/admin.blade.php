<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

    <link rel="shortcut icon"
        href="<?php echo url('/'); ?>/assets/img/icons/icon-48x48.png" />
    <title>Admin</title>
    <link href="<?php echo url('/'); ?>/assets/css/app.css" rel="stylesheet">
    <!-- add to document <head> -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
        <link
    href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
    rel="stylesheet"/>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Admin </span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>
                    <li class="sidebar-item {{ request()->is('admin*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('/admin') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('profile*') ? 'active' : '' }}">
                        <a class="sidebar-link " href="{{ url('/profile') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>

                    @if (Auth::user()->type == 'admin')
                        <li class="sidebar-header">
                            Admin Page
                        </li>
                        <li class="sidebar-item {{ request()->is('employee*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ url('/employee') }}">
                                <i class="align-middle" data-feather="users"></i> <span
                                    class="align-middle">Employees</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="bell"></i>
                                    <span class="indicator">{{Auth::user()->unreadNotifications->count()}}</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                {{Auth::user()->unreadNotifications->count()}} New Notifications
                                </div>
                                <div class="list-group">
                                @foreach (Auth::user()->unreadNotifications as $notification)
                                    <a href="/employee/1/edit" class="list-group-item">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger" data-feather="alert-circle"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New {{$notification->data['type']}} Added {{$notification->data['name']}}</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="/read" class="text-muted">mark all as Read</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-toggle="dropdown">
                                @if (Auth::user()->image != null)
                                    <img src="/storage/{{ Auth::user()->image }}"
                                        class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span
                                        class="text-dark">{{ Auth::user()->name }}</span>
                                @else
                                    <img src="<?php echo url('/'); ?>/assets/img/avatars/profile.png"
                                        class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span
                                        class="text-dark">{{ Auth::user()->name }}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/profile"><i class="align-middle mr-1"
                                        data-feather="user"></i> Profile</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <p class="mb-0">
                                <a href="index.html" class="text-muted"><strong>Yamlak Kassahun</strong></a> &copy;
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @yield('scripts')
    <script src="<?php echo url('/'); ?>/assets/js/vendor.js"></script>
    <script src="<?php echo url('/'); ?>/assets/js/app.js"></script>
    <script>
        $(function() {
            var ctx = document.getElementById('chartjs-dashboard-line').getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, 'rgba(215, 227, 244, 1)');
            gradient.addColorStop(1, 'rgba(215, 227, 244, 0)');
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });

    </script>


    <script>
        $(function() {
            $('#datetimepicker-dashboard').datetimepicker({
                inline: true,
                sideBySide: false,
                format: 'L'
            });
        });

    </script>
</body>

</html>
