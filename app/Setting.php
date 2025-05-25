<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    protected $fillable = [
        'value', 'data'
    ];

    public static function createColumns($value, $data)
    {
        $result = DB::insert('insert into `settings` (`value`, `data`) values (?, ?)', [$value, $data]);
        return $result;
    }

    public static function updateColumns($value, $data)
    {
        $result = DB::update('update `settings` set `data` = ? where `value` = ?', [$data, $value]);
        return $result;
    }
}
