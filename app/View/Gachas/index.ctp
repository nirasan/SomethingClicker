<div class="row">

<div class="span4">
    <h3>Status</h3>
    <div>
        <dl class="dl">
            <dt>username</dt><dd><?php echo $user['User']['username']; ?></dd>
            <dt>score</dt><dd><?php echo $user['Profile']['score']; ?></dd>
            <dt>power</dt><dd><?php echo $user['Profile']['power']; ?></dd>
        </dl>
    </div>
   
   <h3>Log</h3>
    <ul>
        <?php foreach ($user['UserLog'] as $user_log): ?>
            <li><?php echo $user_log['body']; ?>(<?php echo $user_log['created']; ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="span5">
    <div>
        <?php echo sprintf("require score: %d", Configure::read('gacha_price')); ?>
        <?php if ($user['Profile']['score'] >= Configure::read('gacha_price')): ?>
            <?php echo $this->Html->link(
                __('Gacha'),
                array('controller' => 'gachas', 'action' => 'lottery'),
                array('class' => 'btn btn-large btn-success', 'style' => 'padding:100px; margin:60px;')
            ); ?>
        <?php else: ?>
            <div class="alert alert-error">
                <?php echo __('you have not enough score.'); ?>
                <?php echo $this->Html->link(
                    __('do more clicks'),
                    array('controller' => 'clicks', 'action' => 'index')
                ); ?>
            </div>
        <?php endif; ?>
    </div>
</div>


</div>
