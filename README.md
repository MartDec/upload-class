# upload-class
PHP 7.2 class that upload files

Create your HTML form to upload files :
```html
<form method="POST" enctype="multipart/form-data" action="upload.php">
    <input name="files[]" type="file" multiple>
    <input type="submit">
</form>
```

Include the class in the file that handle your form :
```php
<?php
require('../Upload.php');
```

create tour array of arguments to construct your object :
```php
$args = [
    'input_name' => 'files',
    'extensions' => [
        'image/jpeg',
        'image/png'
    ],
    'path' => './upload/'
];
```

Create your object :
```php
$myUpload = new Upload($args);
if ($myUpload->launchUpload() === TRUE) {
    echo "Files successfully uploaded";
} else {
    echo $myUpload->launchUpload();
}
```
