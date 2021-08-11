<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/home/'); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url('assets/home/'); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Kit by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= base_url('assets/home/'); ?>assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url('assets/home/'); ?>assets/demo/demo.css" rel="stylesheet" />
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
                    Material Kit </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.creative-tim.com/product/material-kit-pro" target="_blank">
                            E-Course
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.creative-tim.com/product/material-kit-pro" target="_blank">
                            Kelas Saya
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Profil Saya">
                            <i class="fa fa-user-circle"></i>
                            Aswar Kasim
                            <div class="ripple-container"></div>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('./assets/img/bg2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1>Material Kit.</h1>
                        <h3>A Badass Bootstrap 4 UI Kit based on Material Design.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="footer" data-background-color="black">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com/">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/presentation">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/blog">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
            </div>
        </div>
    </footer>


    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/home/'); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/home/'); ?>assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/home/'); ?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/home/'); ?>assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="<?= base_url('assets/home/'); ?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= base_url('assets/home/'); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets/home/'); ?>assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });


        function scrollToDownload() {
            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script>
</body>

</html>