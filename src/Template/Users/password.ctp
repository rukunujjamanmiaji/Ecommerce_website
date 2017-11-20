<div id="users_profile" class="main_page_content">
    <?php echo $this->element('global/page_title', array('title' => 'My Profile')); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light">
                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li><a href="/users/profile">Personal Info </a></li>
                            <li class="active"><a href="/users/password" >Change Password</a></li>
                            <li>
                                <a href="/users/change_avatar">Change Image</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="password">
                                <div class="margin-bottom-30">
                                    <?php echo $this->element('Users' . DS . 'password'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>