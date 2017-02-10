<?php
namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class StudentModel extends Model
{
    public function login($loginData)
    {
        $util = new Util();
        $data['password'] = $util->getEncryptCode($loginData['password']);
        $data['id'] = $loginData['id'];
        $list = M('student')->where($data)->find();
        return $list;
    }

    public function modifyInfo($infoData)
    {
        if ($infoData['password']) {
            $util = new Util();
            $data['password'] = $util->getEncryptCode($infoData['password']);
        }
        if ($infoData['name']) {
            $data['name'] = $infoData['name'];
        }
        if ($infoData['sex']) {
            $data['sex'] = $infoData['sex'];
        }
        if ($infoData['email']) {
            $data['email'] = $infoData['email'];
        }
        if ($infoData['phone']) {
            $data['phone'] = $infoData['phone'];
        }
        $data['id'] = $infoData['id'];
        $result = M('student')->data($data)->save();
        if ($result) {
            return true;
        }
        return false;
    }

    public function getRecords($condition = null)
    {
        $data = null;
        if ($condition['id']) {
            $data['id'] = $condition['id'];
        }
        $list = M('student')
            ->alias("t")
            ->join('LEFT JOIN ' . C('DB_PREFIX') . 'department d ON t.department_id=d.id')
            ->join('LEFT JOIN ' . C('DB_PREFIX') . 'profession p ON t.profession_id=p.id')
            ->where($data)
            ->field('t.*,d.`name` AS department_name,p.`name` AS profession_name')
            ->select();
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

    public function deleteRecord($condition)
    {
        $data['id'] = $condition['id'];
        $result = M('student')->where($data)->delete();
        return $result;
    }

    public function addInfo($info)
    {
        $data['id'] = $info['id'];
        $data['name'] = $info['name'];
        $data['department_id'] = $info['department_id'];
        $data['profession_id'] = $info['profession_id'];
        $data['sex'] = $info['isMale'];

        $data['class'] = $info['class'];
        $util = new Util();
        $data['password'] = $util->getEncryptCode($info['id']);

//        $sql = M('teacher')->fetchSql(true)->data($data)->add();
//        echo $sql;

        $result = M('student')->data($data)->add();
        return $result;
    }
}