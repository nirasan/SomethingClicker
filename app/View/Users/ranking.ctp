<h2>Ranking</h2>
<div>
    <ol>
    <?php for ($i = 0, $size = count($profiles); $i < $size; $i++): ?>
        <?php $profile = $profiles[$i]; ?>
        <li><strong><?php echo $profile['User']['username']; ?></strong>(score:<?php echo $profile['Profile']['score']; ?>)</li>
    <?php endfor; ?>
    </ol>
</div>
