<?php

    require_once("./Decompiler/Parser.php");

    function getApkFileInfo($fileFullPath)
    {
        $info = pathinfo($fileFullPath);
        $f = $info["dirname"] . '/' . $info["basename"];
    
        $parser = new ApkParser();
        $parser->open($f);
        $info = "• <b>Name:</b> " . $info["basename"];
        $info .= "<br>• <b>Package:</b> " . $parser->getPackage();
        $info .= "<br>• <b>Size:</b> " . human_readable_bytes_size(filesize($f));
        $info .= "<br>• <b>Version:</b> " . $parser->getVersionName();
        $info .= "<br>• <b>Version Code:</b> " . $parser->getVersionCode();
        $info .= "<br>• <b>SDK Minimal Version:</b> " . $parser->getUsesSDKMin();
        $info .= "<br>• <b>SDK Target Version:</b> " . $parser->getUsesSDKTarget();
        $info .= "<br><br>• <b>Permissions:</b> " . $parser->getUsesPermissions();
        $info .= "<br><br>• <b>Hardware Features:</b> " . $parser->getUsesFeature();
        $info .= "<br><br>• <b>Application Metadata:</b> " . $parser->getApplicationMetaData();
        return $info;
    }

    function human_readable_bytes_size($bytes, $decimals = 2) 
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $factor = (int)(floor((strlen($bytes) - 1) / 3));
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[ $factor ];
    }
