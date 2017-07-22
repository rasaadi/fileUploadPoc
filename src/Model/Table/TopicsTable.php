<?php
/**
 * Created by PhpStorm.
 * User: rafsa
 * Date: 7/21/2017
 * Time: 11:22 PM
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TopicsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('topics');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        /**
         * Basic/Simple Example
         */
//        $this->addBehavior('Josegonzalez/Upload.Upload', [
//            'photo' => [
//                'fields' => [
//                    // if these fields or their defaults exist
//                    // the values will be set.
//                    'dir' => 'photo_dir', // defaults to `dir`
//                    'size' => 'photo_size', // defaults to `size`
//                    'type' => 'photo_type', // defaults to `type`
//                    'keepFilesOnDelete' => false
//                ],
//            ],
//        ]);


        /**
         * Advance example
         */
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
                'fields' => [
                    'dir' => 'photo_dir',
                    'size' => 'photo_size',
                    'type' => 'photo_type'
                ],
                'nameCallback' => function ($data, $settings) {
                    return strtolower($data['name']);
                },
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(160, 160);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $data['name'],
                        $tmp => 'thumbnail-' . $data['name'],
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false // Can add it in the simple example
            ]
        ]);

    }
}

?>
