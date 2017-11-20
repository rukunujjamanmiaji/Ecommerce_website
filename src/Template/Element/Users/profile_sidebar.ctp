<?php
$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
?>
<div class="profile-sidebar">
    <div class="portlet light profile-sidebar-portlet">
        <div class="profile-userpic">
            <?php if (!empty($session['Auth']['User']['image'])) { ?>
                <img src="<?php echo '/img/profile/' . $session['Auth']['User']['image']; ?>" class="profile_picture img-responsive"  />
            <?php } else { ?> 
                <img width ="200" class="image-responsive img-responsive"  src="/img/empty_profile.jpg" />
            <?php } ?>
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo $session['Auth']['User']['name']; ?>
            </div>

        </div>

        <div class="profile-usermenu">
            <ul class="nav">
                <li class=" <?php if ($this->name == 'Users') { ?> active <?php } ?> "><a href="/users/profile"><i class="fa fa-angle-right"></i> Personal Info</a></li>
                <li class="<?php if ($this->name == 'Events') { ?> active <?php } ?> "><a href="/events/my"><i class="fa fa-angle-right"></i> My Events</a></li>
                <li ><a href="/events/mydonations"><i class="fa fa-angle-right"></i> My Donation</a></li>
                <li class="<?php if ($this->name == 'Accounts') { ?> active <?php } ?> " ><a href="/accounts"><i class="fa fa-angle-right"></i> Accounts</a></li>
                <li class=""><a href="/notifications"><i class="fa fa-angle-right"></i> Notification</a></li>              			 
            </ul>
        </div>
    </div>
</div> 