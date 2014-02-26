<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
            echo $this->Form->input('User.username');
            echo $this->Form->input('User.password');
            echo $this->Form->input('Profile.score', array('default' => 0, 'type' => 'hidden'));
            echo $this->Form->input('Profile.power', array('default' => 1, 'type' => 'hidden'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
