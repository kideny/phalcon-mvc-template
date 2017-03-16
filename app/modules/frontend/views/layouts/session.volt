<body class="hold-transition login-page">
    {{ content() }}
    <!-- jQuery 2.2.3 -->
    <script src="/assets/static/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/assets/static/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/assets/static/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>