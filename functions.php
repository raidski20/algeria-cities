<?php

function getWilayas($APCsList)
{
    $wilayas = [];

    foreach ($APCsList as $apc) 
    {
        if(! in_array($apc["wilaya_name_ascii"], $wilayas)) 
        {   
            $wilayaName = strtolower($apc["wilaya_name_ascii"]);

            if(str_word_count($wilayaName) > 1) {
                $wilayaName = str_replace(' ', '_', $wilayaName);
            }
            
            $wilayas[$wilayaName] = [
                "wilaya_code" => $apc['wilaya_code'],
                "wilaya_name_ar" => $apc['wilaya_name'],
                "wilaya_name_ascii" => $apc['wilaya_name_ascii'],
                "apcs" => []
            ];
        }
    }

    return $wilayas;
}

function getWilayaApcs($APCsList, $wilayas)
{
    foreach ($wilayas as $key => $wilaya) 
    {
        foreach ($APCsList as $apc) 
        {
            if($apc["wilaya_name_ascii"] === $wilaya['wilaya_name_ascii'])
            {
                $apc = [
                    "apc_name_ar" => $apc['commune_name'],
                    "apc_name_ascii" => $apc['commune_name_ascii'],
                ];
                array_push($wilayas[$key]['apcs'], $apc);               
            }
        }   
    }

    return $wilayas;
}