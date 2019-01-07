<?php
require('../Upload.php');

$args = [
    'input_name' => 'files', // your form input
    'extensions' => [ // extensions that you allow
        'image/jpeg',
        'image/png'
    ],
    'path' => './upload/' // the path where you want to upload your files
];

$myUpload = new Upload($args);
$myUpload->upload();