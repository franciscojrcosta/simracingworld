<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */
trait ImageUpload {

    private array $currentfile;
    private string $serverroot;
    private string $destinationfolder;
    private string $filename;
    private string $filetype;
    private string $newfilename;
    private string $path; //! complete path for the file upload including the filename
    private bool $filesizeok;
    private bool $filetypeok;
    private int $filesize = 4194304; //! maximum file size in bytes

    /**
     * Initializes all functions to upload a file
     * 
     * @param array $myfile
     */
    public function initUpload($myfile, $destination) {
        $this->currentfile = $myfile;
        $this->serverroot = $_SERVER['DOCUMENT_ROOT'];
        $this->filetype = $this->currentfile['type'];
        $this->destinationfolder = $destination;
        $this->checkFileType();
        $this->checkFileSize();
        if ($this->filetypeok == TRUE && $this->filesizeok == TRUE) {
            $this->uniqueFileName();
            $this->uploadFile();
            $this->resizeImage();
        }
        return $this->newfilename;
    }

    private function resizeImage() {
        list($this->width, $this->height) = getimagesize($this->path);
        $newwidth = 200;
        $newheight = 200;
        $ratio = $this->width / $this->height;
        if ($ratio > 0) { //! ratio > 0 means image is landscape
            $newwidth = 200;
            $newheight = ceil(200 / $ratio);
        }
        if ($ratio < 0) { //! ratio < 0 means image is portrait
            $newwidth = ceil(200 / $ratio);
            $newheight = 200;
        }
        $dstimage = imagecreatetruecolor($newwidth, $newheight,);
        if ($this->filetype == 'image/jpg') {
            $image = imagecreatefromjpeg($this->path);
            imagecopyresampled($dstimage, $image, 0, 0, 0, 0, $newwidth, $newheight, $this->width, $this->height);
            imagejpeg($dstimage, $this->path, 100);
            return;
        }
        if ($this->filetype == 'image/png') {
            $image = imagecreatefrompng($this->path);
            imagecopyresampled($dstimage, $image, 0, 0, 0, 0, $newwidth, $newheight, $this->width, $this->height);
            imagepng($dstimage, $this->path, 0);
            return;
        }
    }

    /**
     * Checks if file type is image.
     * 
     * Sets the file extension to false if not an jpg or png image
     * Sets the file extension to .jpg or .png if its an image
     * 
     * @return boolean TRUE if file type is image
     */
    private function checkFileType() {
        if ($this->filetype == 'image/png') {
            $this->fileextension = '.png';
            $this->filetypeok = TRUE;
        }
        if ($this->filetype == 'image/jpeg') {
            $this->fileextension = '.jpg';
            $this->filetypeok = TRUE;
        }
        if ($this->filetype <> 'image/png' && $this->filetype <> 'image/jpeg') {
            $this->filetypeok = FALSE;
        }
        return $this->filetypeok;
    }

    /**
     * Checks if the file size is more than 4MB
     * 
     * @return boolean TRUE if file size is ok for upload
     */
    private function checkFileSize() {
        if ($this->currentfile['size'] > $this->filesize) {
            $this->filesizeok = FALSE;
        } else {
            $this->filesizeok = TRUE;
        }
        return $this->filesizeok;
    }

    /**
     * Generates a unique name for the uploaded file
     */
    private function uniqueFileName() {
        $this->newfilename = 'p' . uniqid() . $this->fileextension;
    }

    private function uploadFile() {
        $this->path = $this->serverroot . $this->destinationfolder . $this->newfilename;
        if (file_exists($this->path)) {
            echo 'File already exists!!';
        } else {
            move_uploaded_file($this->currentfile['tmp_name'], $this->path);
        }
    }

}
