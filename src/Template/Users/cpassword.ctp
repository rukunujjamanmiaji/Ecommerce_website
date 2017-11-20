<div class="main_page_content" id="users_cpassword">
     <section id="page-title" style="background-image: url(/front/img/bg1.png); padding: 120px 0;">
        <div class="container clearfix">
            <h1>Change Password</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Change Password</li>
            </ol>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
                <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Change Password</div>
                    <div class="acc_content clearfix">
                <!--<?php echo $this->Flash->render() ?>-->
                <?php echo $this->Form->create('User', array('class' => 'login-form', 'id' => 'login-form')); ?>
                <div class="col_full mb30">
                    <i class="fa fa-lock"></i>
                    <?php
                    echo $this->Form->input('password', [
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control',
                        'type' => 'password',
                        'placeholder' => 'New Password'
                    ]);
                    ?>             

                </div>   
                 <div class="col_full mb30">
                    <i class="fa fa-lock"></i>
                    <?php
                    echo $this->Form->input('cpassword', [
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control',
                        'type' => 'password',
                        'placeholder' => 'Confirm New Password'
                    ]);
                    ?>             

                </div>   
                <div class="col_full nobottommargin">
                            <button class="button button-3d button-blue nomargin" id="register-form-submit" name="submit" value="register" type="submit">Submit</button>
                </div>
                </div>
                <?php echo $this->Form->end(); ?>
                <div>&nbsp;</div>
                <a href="/users/login" class="btn blue btn-block">Already Registered ? </a>
            </div>
        </div>
    </div>
</div>
</div>