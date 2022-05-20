<?php
namespace AlessandroAlessio\FileWriter;

class FileWriter{

    public $file_path = null;
    public $handle = null;

    function __construct($file_path=null){
        $this->file_path = $file_path;
        if ( !$this->file_path ) die('You must set a file path in the constructor');
        $this->openHandler();
    }

    private function openHandler(){
        $this->handle = fopen($this->file_path, 'a') or error_log('Cannot open file:  '.$this->file_path);
    }

    public function write($string, $br=true){
        if ( $this->handle ) :
            $data = $string;
            $data .= ( $br ) ? "\n" : "" ;
            fwrite($this->handle, $data);
            fclose($this->handle);
        endif;
    }

    public function searchInFile($needle){
        $content = file_get_contents($this->file_path);
        $needle = '/'.$needle.'/';
        preg_match($needle, $content, $matches, PREG_OFFSET_CAPTURE);
        return $matches;
    }

}
?>