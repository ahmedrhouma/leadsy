<?php

namespace App\Traits;

use App\Models\Logs;
use Illuminate\Support\Facades\DB;

trait Log
{
    static protected $logTable = 'logs';

    static function logToDb($model, $logType)
    {
        if (!auth()->check())return;
        $dateTime = date('Y-m-d H:i:s');
        DB::table(self::$logTable)->insert([
            'user_id' => auth()->user()->id,
            'created_at' => $dateTime,
            'action' => $logType,
            'element' => array_search(get_class($model),Logs::MODELS),
            'element_id' => $model->id
        ]);
    }

    public static function bootLog()
    {
        self::updated(function ($model) {
            self::logToDb($model, Logs::ACTIONS['edit']);
        });
        self::deleted(function ($model) {
            self::logToDb($model, Logs::ACTIONS['delete']);
        });
        self::created(function ($model) {
            self::logToDb($model, Logs::ACTIONS['create']);
        });
    }
}
