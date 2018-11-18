<?php
require('../Upload.php');

$args = [
    'input_name' => 'files',
    'extensions' => [
        'image/jpeg',
        'image/png'
    ],
    'path' => './upload/'
];

$myUpload = new Upload($args);
if ($myUpload->launchUpload() === TRUE) {
    echo "Files successfully uploaded";
} else {
    echo $myUpload->launchUpload();
}