<?php

class Upload {

    protected $file, $allowedExtension, $targetPath;

    function __construct (Array $args) {
        $this->file = $args['input_name'];
        $this->allowedExtension = $args['extensions'];
        $this->targetPath = $args['path'];
    }

    public function getFile () { // return all the properies of the file(s) to upload
        return $_FILES[$this->file];
    }

    public function getFileProperty ($property, $increm = 0) { // return one property of the file(s)
        $file = $this->getFile();
        return $file[$property][$increm];
    }

    public function getError ($error) { // return errors that occured during the upload
        switch ($error) {
            case 0: // if there is no error
                return FALSE;
                break;

            case 1:
                return "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;

            case 2:
                return "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;

            case 3:
                return "The uploaded file was only partially uploaded";
                break;

            case 4:
                return "No file was uploaded";
                break;

            case 6:
                return "Missing a temporary folder";
                break;

            case 7:
                return "Failed to write file to disk";
                break;

            case 8:
                return "File upload stopped by extension";
                break;

            case 9:
                return "Unknown upload error";
                break;
        }
    }

    public function upload () { // treat the upload
        $files = $this->getFile();
        $filesCount = count($files['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $fileName = $this->getFileProperty('name', $i);
            $fileExt = $this->getFileProperty('type', $i);
            $fileTmp = $this->getFileProperty('tmp_name', $i);
            $path = $this->targetPath . $fileName;

            if(in_array($fileExt, $this->allowedExtension)) {
                move_uploaded_file($fileTmp, $path);
            }
        }
    }

    public function launchUpload () { // launch the upload or handle errors
        $error = $this->getFileProperty('error');
        
        if (!$this->getError($error)) {            
            $this->upload();
            return TRUE;
        } else {
            return FALSE;
        }
    }

}