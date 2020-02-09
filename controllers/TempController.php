<?php

namespace Controllers;

class TempController
{
    protected static $folder = '../temp_files/';
    protected static $expansion = '.json';

    public function __construct($name,$content)
    {
        $path = self::$folder.$name.self::$expansion;
        $content = json_encode($content);


        self::createFile($path);
        self::putContent($path,$content);

    }

    private static function createFile($path){
        fopen($path, "a");
    }

    private static function putContent($path,$content)
    {
        file_put_contents($path,$content);
    }

    public static function openContent($file)
    {
       $data = file(self::$folder.$file.self::$expansion);
       return $data[0];
    }

    public static function delFile($file)
    {
        $data = file(self::$folder.$file.self::$expansion);
        unlink($data);
    }
}
