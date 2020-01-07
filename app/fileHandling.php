<?php


namespace App;

use Illuminate\Support\Facades\Storage;

class fileHandling
{
    public static function readDirectory($directory)
    {
        $files = array_filter(Storage::disk('local')->files($directory),
            function ($item) {
                return strpos($item, 'pdf');
            });
        $realfilesName = [];
        foreach ($files as $file) {
            $data = explode("/", $file);
            $realfilesName [] = $data[2];
        }
        return $realfilesName;

    }

    public static function checkForFile($newDestination, $fileName)
    {
        return Storage::exists($newDestination . $fileName);
    }

    public static function fileRename($destination, $oldName, $newName)
    {
        if (!(Storage::exists($destination . $newName))) {
            $path = Storage::move($destination . $oldName, $destination . $newName);
            return $path;
        }
    }


}
