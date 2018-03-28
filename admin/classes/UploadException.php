<?php 

class UploadException extends Exception 
{ 
    public $message;

    public function __construct($code) { 
        $new_message = $this->codeToMessage($code); 
        $this->message = $new_message;
        //parent::__construct($message, $code); 
    } 

    private function codeToMessage($code) 
    { 
        switch ($code) { 
            case UPLOAD_ERR_INI_SIZE: 
                //$message = "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
                $message = "A imagem excede o tamanho máximo de 1M (1 megabyte). Por gentileza, insira outra imagem com um tamanho menor.";
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "The uploaded file was only partially uploaded"; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "Nenhuma imagem foi inserida."; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "Missing a temporary folder"; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "Failed to write file to disk"; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "File upload stopped by extension"; 
                break; 

            default: 
                $message = "Unknown upload error"; 
                break; 
        } 
        return $message; 
    } 
} 

?>