<?php

namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class TeacherModel extends Model
{
    public function login($loginData)
    {
        $util = new Util();
        $data['password'] = $util->getEncryptCode($loginData['password']);
        $data['id'] = $loginData['id'];
        $list = M('teacher')->where($data)->find();
        return $list;
    }

    public function getRecords($condition = null)
    {
        $data = null;
        if ($condition['id']) {
            $data['id'] = $condition['id'];
        }
        $list = M('teacher')
            ->alias("t")
            ->join('LEFT JOIN '.C('DB_PREFIX').'department d ON t.department_id=d.id')
            ->where($data)
            ->field('t.*,d.`name` AS department_name')
            ->select();
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

}