<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nav extends Model
{
    protected $fillable = [
        'value', 'uri', 'parent_id'
        ];

    public static function CreateTree($array, $sub = 0)
    {
        $a = array();
        foreach ($array as $v) {
            if ($sub == $v['parent_id']) {
                $b = Nav::CreateTree($array, $v['id']);
                if (!empty($b)) {
                    $a[$v['value']] = $b;
                }
                else {

                    $a[$v['id']] =  $v = [ 'value' => $v['value'], 'uri' => $v['uri'] ];
                }
            }
        }
        return $a;
    }

    public static function getNav()
    {
//        $resultSql = Nav::all()->collect();
        $resultSql = DB::table('navs')->get()->collect();
        $navs = [];
        foreach($resultSql as $object)
        {
            $navs[] = (array) $object;
        }

        $dataset = Nav::CreateTree($navs);

        return $dataset;
    }
}
