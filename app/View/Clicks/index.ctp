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
        <?php echo $this->Html->link(
            __('Click'),
            array('controller' => 'clicks', 'action' => 'incr'),
            array('class' => 'btn btn-large btn-primary', 'style' => 'padding:100px; margin:60px;')
        ); ?>
    </div>
</div>


</div>
