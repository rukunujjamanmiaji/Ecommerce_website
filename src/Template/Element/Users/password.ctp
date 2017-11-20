<?php echo $this->Flash->render() ?>
<?php echo $this->Form->create($user, ['id' => 'login-form']); ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Current Password</label>
            <?php echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'div' => false, 'label' => false, 'value' => '')); ?>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <?php echo $this->Form->input('npassword', array('type' => 'password', 'class' => 'form-control', 'div' => false, 'label' => false, 'value' => '')); ?>
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <?php echo $this->Form->input('cpassword', array('type' => 'password', 'class' => 'form-control', 'div' => false, 'label' => false, 'value' => '')); ?>
        </div> 
        <button type="submit" class="btn red">&nbsp;SAVE CHANGES</button>
    </div> 

</div>              
<?php echo $this->Form->end(); ?>