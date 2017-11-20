<?php echo $this->Form->create($user, array('id' => 'users_profile_form')); ?>
<?php echo $this->Flash->render() ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label> Email*</label>
            <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'div' => false, 'required', 'type' => 'email')); ?>
        </div>                               
    </div>  
</div>

<div class="row">
    <div class="col-md-4">
        <div  class="form-group">
            <label>Address</label>
            <?php echo $this->Form->input('address', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>
        </div>

    </div>
    <div class="col-md-4">
        <div  class="form-group">
            <label>Postal Code</label>
            <?php echo $this->Form->input('zipcode', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>
        </div>

    </div>
    <div class="col-md-4">
        <div  class="form-group">
            <label>City</label>
            <?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>                                  

        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div  class="form-group">
            <label>State</label>
            <?php echo $this->Form->input('state', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>                                  
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="country">Country</label>
            <?php echo $this->Form->input('country', array('class' => 'form-control', 'label' => false, 'div' => false, 'options' => $countries)); ?>
        </div>

    </div>
    <div class="col-md-4">
        <div  class="form-group">
            <label>Phone</label>
            <?php echo $this->Form->input('phone', array('type' => 'text', 'class' => 'form-control', 'label' => false, 'div' => false)); ?>                                  
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="website">Website</label>
            <?php echo $this->Form->input('website', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>                                  
        </div>

    </div>
    <div class="col-md-4">
        <div  class="form-group">
            <label>Facebook Username</label>
            <?php echo $this->Form->input('facebook', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>                                  
        </div>

    </div>
    <div class="col-md-4">
        <div  class="form-group">
            <label>Twitter Username</label>
            <?php echo $this->Form->input('twitter', array('class' => 'form-control', 'label' => false, 'div' => false)); ?>                                  
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label>Bio</label>
        <?php
        echo $this->Form->input('bio', [
            'label' => false,
            'class' => 'form-control summernote',
            'type' => 'textarea',
        ]);
        ?>                              
    </div>                            
</div>                       
<div class="row margin-top-20">
    <div class="col-md-6">                                
        <button type="submit" value="submit" name='submit' class="btn red">SAVE CHANGES</button>
    </div>                            
</div>
<?php echo $this->Form->end(); ?>
</div>