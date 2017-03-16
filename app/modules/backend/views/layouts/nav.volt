<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
{{ stylesheet_link('/assets/static/adminlte/css/skins/_all-skins.min.css') }}
<!-- iCheck -->
{{ stylesheet_link('/assets/static/plugins/iCheck/flat/blue.css') }}
<!-- Morris chart -->
{{ stylesheet_link('/assets/static/plugins/morris/morris.css') }}
<!-- jvectormap -->
{{ stylesheet_link('/assets/static/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}
<!-- Date Picker -->
{{ stylesheet_link('/assets/static/plugins/datepicker/datepicker3.css') }}
<!-- Daterange picker -->
{{ stylesheet_link('/assets/static/plugins/daterangepicker/daterangepicker.css') }}
<!-- bootstrap wysihtml5 - text editor -->
{{ stylesheet_link('/assets/static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
<?php $this->assets->outputCss(); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    {{ content() }}
</body>