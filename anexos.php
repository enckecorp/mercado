<?php
    //baixar arquivos
    $fileName  = 'anexos - '.date("d-m-Y").'.zip';
    $path      = 'modules/compras/anexos';
    $fullPath  = $path.'/'.$fileName;
    $scanDir = scandir($path);
    array_shift($scanDir);
    array_shift($scanDir);
    $zip = new \ZipArchive();
    if( $zip->open($fullPath, \ZipArchive::CREATE) ){
        foreach($scanDir as $file){
            $zip->addFile($path.'/'.$file, $file);
        }
        $zip->close();
    }
    if(file_exists($fullPath)){
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        readfile($fullPath);
        unlink($fullPath);
    }
    //baixar arquivos//
?>