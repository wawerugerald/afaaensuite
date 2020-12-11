<?php

namespace App\Utils;
use App\DataDump;


class Data
{
    public function getContryDocuments($country)
    {
        $docs = DataDump::orderBy('countryid','desc')->where('id',$country)->limit(50)->get();
        return $docs;
    }
}