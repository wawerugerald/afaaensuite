<?php


namespace App\Helpers;

use Request;

use App\Logactivity as LogactivityModel;


class Logactivity

{


    public static function addToLog($subject)

    {

    	$log = [];

    	$log['subject'] = $subject;

    	$log['url'] = Request::fullUrl();

    	$log['method'] = Request::method();   	

    	LogactivityModel::create($log);

    }


    public static function logActivityLists()

    {

    	return LogactivityModel::latest()->get();

    }


}