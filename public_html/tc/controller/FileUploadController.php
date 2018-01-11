<?php

date_default_timezone_set('America/Toronto');
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);

if(!isset($_SESSION)){
    session_start();
}

/*set api path*/
set_include_path(get_include_path() . PATH_SEPARATOR);

require_once '../dao/FileUploadDAO.php';
require_once '../model/FileUpload.php';

/**
 * 
 */
class  FileUploadController {

    /**
     * 
     * @param int $file_id
     * @return FileUpload object
     */
    public static function getFileUploadByFileId($file_id) {
        return FileUploadDAO::getFileUploadByFileId($file_id);
    }
    
    /**
     * 
     * @param FileUpload object $file_upload
     * @return FileUpload object
     */
    public static function addFileUpload($file_upload) {
        $newFileUpload = FileUploadDAO::addFileUpload($file_upload);
        //TODO: ensure this is actually a fileUploadObject, not a row id
        return $newFileUpload;
    }
    
    //Add modify and delete functions
}

?>