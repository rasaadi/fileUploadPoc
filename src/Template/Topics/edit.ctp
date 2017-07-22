<?php
/**
 * Created by PhpStorm.
 * User: rafsa
 * Date: 7/21/2017
 * Time: 11:58 PM
 */
?>

<!-- File: src/Template/Topics/edit.ctp -->



<h1>Edit Topic</h1>

<?php

echo $this->Form->create($topic, ['enctype' => 'multipart/form-data']);

echo $this->Form->input('title');

echo $this->Form->input('content', ['rows' => '3']);

echo $this->Form->input('tags');

echo $this->Form->control('photo', [
    'type' => 'file'
]);

echo $this->Form->input('author');

echo $this->Form->control('modified',[
    'label' => 'Modified Date',
    'minYear' => date('Y') - 10,
    'maxYear' => date('Y') + 10,

]);

echo $this->Form->button(__('Save Topic'));

echo $this->Form->end();

?>

