<?php
/**
 * Created by PhpStorm.
 * User: rafsa
 * Date: 7/21/2017
 * Time: 11:56 PM
 */
?>

<h1>Add Topic</h1>

<?php

//echo $this->Form->create($document, ['enctype' => 'multipart/form-data']);

/**
 * To crate a form with upload, you must form enctype like this at the
 * beginning of form creation:
 * ['enctype' => 'multipart/form-data']
 */
echo $this->Form->create($topic, ['enctype' => 'multipart/form-data']);

echo $this->Form->input('title');

echo $this->Form->input('content', ['rows' => '3']);

echo $this->Form->input('tags');

/**
 * Following is the upload field (photo)
 */
echo $this->Form->control('photo', [
    'type' => 'file'
]);
//echo $this->Form->file('submittedfile');

echo $this->Form->input('author');

echo $this->Form->control('created',[
        'label' => 'Creation Date',
        'minYear' => date('Y') - 10,
        'maxYear' => date('Y') + 10,
]);


echo $this->Form->control('modified',[
    'label' => 'Modified Date',
    'minYear' => date('Y') - 10,
    'maxYear' => date('Y') + 10,

]);

echo $this->Form->button(__('Save Topic'));

echo $this->Form->end();

?>

