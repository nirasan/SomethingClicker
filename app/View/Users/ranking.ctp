<div>
    <ul>
    <?php for ($i = 0, $size = count($profiles); $i < $size; $i++): ?>
        <?php $profile = $profiles[$i]; ?>
        <li><?php echo $i + 1; ?>.&nbsp;<?php echo $profile['User']['username']; ?>(<?php echo $profile['Profile']['score']; ?>)</li>
    <?php endfor; ?>
    </ul>
</div>
