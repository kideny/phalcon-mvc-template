<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>DragonPHP</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">后台登陆</p>
        <form action="/backend/session/login" method="post">
            <div class="form-group has-feedback">
                {{ form.render('loginName') }}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{ form.render('password') }}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input id="remember" name="remember" type="checkbox" value="yes"> 记住我
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">立即登录</button>
                </div>
                <!-- /.col -->
            </div>
            {{ form.render('csrf', ['value': this.security.getToken()]) }}
        </form>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                <i class="fa fa-facebook"></i>使用Facebook登录
            </a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                <i class="fa fa-google-plus"></i> 使用Google+登录
            </a>
        </div>
        <!-- /.social-auth-links -->
        <a href="#">忘记密码？</a><br>
        <a href="/backend/index/register.html" class="text-center">注册帐号</a>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 2.2.3 -->
<script src="/assets/static/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
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