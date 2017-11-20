<?php echo $this->Form->create($user, ['type' => 'file']); ?>
<?php echo $this->Flash->render() ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Upload Image</label>
            <input type ="file" name="file" class="form-control" />
        </div>
        <?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id'])); ?>
        <button type="submit" class="btn red">&nbsp;UPLOAD IMAGE</button>
    </div> 
    <div class="col-md-6">
        <?php if (!empty($user['image'])) { ?>
            <img src="<?php echo '/img/profile/' . $user['image']; ?>" class="img-responsive" width="200" />
        <?php } else { ?> 
            <img src="http://placehold.it/200x200" />
        <?php } ?>
    </div> 
</div>               
<?php echo $this->Form->end(); ?>