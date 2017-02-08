<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-08
 * Time: 09:34
 */

namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class DepartmentModel extends Model
{
    public function getDepartments()
    {
        $result = M("department")->select();
        return $result;
    }
}