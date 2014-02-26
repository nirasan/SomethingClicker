<div class="clicks">
<div>
    <table>
        <tr><th>username</th><td><?php echo $user['User']['username']; ?></td></tr>
        <tr><th>score</th><td><?php echo $user['Profile']['score']; ?></td></tr>
        <tr><th>power</th><td><?php echo $user['Profile']['power']; ?></td></tr>
    </table>
</div>

<div>
    <?php echo $this->Html->link(
        __('Click'),
        array('controller' => 'clicks', 'action' => 'incr')
    ); ?>
</div>
</div>
