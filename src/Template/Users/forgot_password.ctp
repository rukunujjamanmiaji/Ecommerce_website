<div class="main_page_content" id="users_forgotpassword">
    <section id="page-title" style="background-image: url(/front/img/bg1.png); padding: 120px 0;">
        <div class="container clearfix">
            <h1>Forgot Password</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Forgot Password</li>
            </ol>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
                    <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Forgot Password</div>
                    <div class="acc_content clearfix">
                        <?php echo $this->Flash->render() ?>
                        <?php echo $this->Form->create('User', array('class' => 'nobottommargin', 'id' => 'login-form')); ?>

                        <div class="col_full mb30">
                            <p class="padding-top-10">Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</p>
                            <i class="fa fa-envelope"></i>
                            <?php
                        echo $this->Form->input('email', [
                            'label' => false,
                            'div' => false,
                            'class' => 'form-control padding-left-30',
                            'type' => 'email',
                            'placeholder' => 'Enter Your Email Address'
                            ]);
                            ?>

                        </div>
                        <div class="col_full nobottommargin">
                            <button class="button button-3d button-blue nomargin" id="login-form-submit" name="login-form-submit" value="login" type="submit">Submit</button>

                        </div>

                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
