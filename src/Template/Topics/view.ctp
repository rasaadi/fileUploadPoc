<?php
/**
 * Created by PhpStorm.
 * User: rafsa
 * Date: 7/21/2017
 * Time: 11:57 PM
 */
?>

<h1><?= h($topic->title) ?></h1>

<p><?= h($topic->content) ?></p>

<p>Tags :<?= h($topic->tags) ?></p>

<p>Photo: <?= h($topic->photo) ?></p>

By <h3><?= h($topic->author) ?></h3>
<?php

/**
 * Does not work :-(
 */

$photoName = h($topic->photo);
$photoPath = h($topic->photo_dir);
//echo $this->Html->image('webroot/files/\Topics/\photo/\dsc_0020_senta cruz-1.jpg', array('width' => '200px','alt'=>'aswq'));
echo $this->Html->Url->image('dsc_0020_senta cruz-1.jpg');
echo $this->Html->Url->image
?>


<p><small>Created: <?php echo $topic->created->format(DATE_RFC850) ?></small></p>


