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
if ($myUpload->launchUpload() === TRUE) { // if the upload is successfull
    echo "Files successfully uploaded";
} else {
    $error = $myUpload->getFileProperty('error'); // get the property error
    echo $myUpload->getError($error);
}