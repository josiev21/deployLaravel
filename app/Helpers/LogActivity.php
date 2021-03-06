<?php


namespace App\Helpers;

use Request;
use App\LogActivity as LogActivityModel;
use App\Models\Task;

class LogActivity
{
    public static function addToLog($subject)
    {
        // $task = Task::all();
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        $log['user_name'] = auth()->check() ? auth()->user()->name : ' ';
        LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }
}
