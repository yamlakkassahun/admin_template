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
    <title>Teret</title>
    <link href="<?php echo url('/'); ?>/assets/css/app.css" rel="stylesheet">
    <!-- add to document <head> -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper" >
        <div class="main" style="background-image: url('<?php echo url('/'); ?>/assets/img/login.jpg');background-size: auto;">
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            <footer class="footer" style="background:transparent">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-md-12 text-center">
                            <p class="mb-0">
                                <a href="index.html" class="text-muted"><strong>JakTech PLC</strong></a> &copy;
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
</body>

</html>
