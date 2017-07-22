<?php
/**
 * Created by PhpStorm.
 * User: rafsa
 * Date: 7/21/2017
 * Time: 11:39 PM
 */
?>
<!-- $this->Html is the form helper object that contain code snippets for html elements like forms, links etc
    link() method generate html link
-->
<h1>Blog topics</h1>
<button><?= $this->Html->link('Add Topic', ['action' => 'add']) ?></button>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Photo</th>
        <th>Photo_Dir</th>
        <th>Actions</th>
    </tr>

    <!-- Here's where we loop through our $topics query object, printing out topic info -->

    <?php foreach ($topics as $topic): ?>
    <tr>
        <td>
            <?= $topic->id //ID ?>
        </td>
        <td>
            <?= $this->Html->link($topic->title, ['action' => 'view', $topic->id]) // Title?>
        </td>
        <td>
            <?= $topic->created->format(DATE_RFC850) // Created Date?>
        </td>
        <td>
            <?= $topic->photo ?>
        </td>

        <td>
            <?= $topic->photo_dir ?>
        </td>


        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $topic->id],
                ['confirm' => 'Are you sure?']) // Delete action
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $topic->id]) // Edit action?>
        </td>
    </tr>
    <?php endforeach ?>
</table>
