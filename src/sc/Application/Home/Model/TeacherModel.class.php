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

    public function modifyInfo($infoData)
    {
        $util = new Util();
        $data['password'] = $util->getEncryptCode($infoData['password']);
        $data['id'] = $infoData['id'];
        $result = M('teacher')->data($data)->save();
        if ($result) {
            return true;
        }
        return false;
    }

    public function getRecords($condition = null)
    {
        $data = null;
        $id = $condition['id'];
        if ($id) {
            $data = "t.id='$id' ";
        }
        $list = M('teacher')
            ->alias("t")
            ->join('LEFT JOIN ' . C('DB_PREFIX') . 'department d ON t.department_id=d.id')
            ->where($data)
            ->field('t.*,d.`name` AS department_name')
            ->select();
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

    public function deleteRecord($condition)
    {
        $data['id'] = $condition['id'];
        $result = M('teacher')->where($data)->delete();
        return $result;
    }

    public function addInfo($info)
    {
        $data['id'] = $info['id'];
        $data['name'] = $info['name'];
        $data['department_id'] = $info['department_id'];
        $util = new Util();
        $data['password'] = $util->getEncryptCode($info['id']);
//        $sql = M('teacher')->fetchSql(true)->data($data)->add();
//        echo $sql;
        $result = M('teacher')->data($data)->add();
        return $result;
    }

}