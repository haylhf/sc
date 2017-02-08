<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-08
 * Time: 17:17
 */
namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class ProfessionModel extends Model
{
    public function getProfessions()
    {
        $result = M("profession")->select();
        return $result;
    }
}