<div class="register-box">

    <div class="register-logo">
        <a href="../../index2.html"><b>Loser</b>Hub</a>
    </div>

    <div class="register-box-body">

        <p class="login-box-msg">注册新用户</p>

        <form action="" method="post" role="form" autocomplete="off">
            <div class="form-group has-feedback">
                <?php echo $form->render("firstName"); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo $form->render("lastName"); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo $form->render("loginName"); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo $form->render("email"); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo $form->render("password"); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo $form->render("confirmPassword"); ?>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" value="1"> 我同意这份
                            <a href="#">协议</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                <i class="fa fa-facebook"></i> Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                <i class="fa fa-google-plus"></i> Sign up using Google+
            </a>
        </div>

        <a href="/user/session/login" title="登陆" class="text-center">我已经注册</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->