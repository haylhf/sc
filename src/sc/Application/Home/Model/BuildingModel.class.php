<?php

namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class BuildingModel extends Model
{
    public function getRecords()
    {
        $result = M("building")->select();
        return $result;
    }

    public function deleteRecord($condition)
    {
        $data['id'] = $condition['id'];
        $result = M('building')->where($data)->delete();
        return $result;
    }

    public function addInfo($info)
    {
        $data['id'] = $info['id'];
        $data['name'] = $info['name'];
//        $sql = M('teacher')->fetchSql(true)->data($data)->add();
//        echo $sql;
        $result = M('building')->data($data)->add();
        return $result;
    }
}