
<link rel="stylesheet" type="text/css" href="/appremi/css/custom.css">
<link rel="stylesheet" type="text/css" href="/appremi/css/style.css">
<link rel="stylesheet" type="text/css" href="/appremi/css/vendor.css">

<div id="users_login" class="main_page_content">
    <section>
        <div class="container clearfix">
            <h1>My Account</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Users</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
                    <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
                    <div class="acc_content clearfix">
                        <form action="" method="post">
                            <p>Email </p>
                            <input type="email" class="email" name="email" required=""/>
                            <p>Password</p>
                            <input type="password" class="password" name="Password" required=""/>
                            <br>
                            <br>

                            <input type="submit" value="Login">
                        </form>
                        <div class="col_full nobottommargin">
                            <a href="/users/forgot_password" class="fright">Forgot Password?</a>
                        </div>
                        <div class="line line-sm"></div>
                        <div class="center">
                            <h4 style="margin-bottom: 15px;">or Login with:</h4>
                            <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                            <span class="hidden-xs">or</span>
                            <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                            <span class="hidden-xs">or</span>
                            <a href="#" class="button button-rounded si-gplus si-colored">Google</a>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div><i class="acc-closed icon-user4"></i><a href="#">New Signup? Register for an Account</a></div>

                </div>
            </div>
        </div>
    </section>
</div>
