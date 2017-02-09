<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-09
 * Time: 10:28
 */
namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class CourseModel extends Model
{
    public function getRecords()
    {
        $result = M("course")->select();
        return $result;
    }

    public function deleteRecord($condition)
    {
        $data['id'] = $condition['id'];
        $result = M('course')->where($data)->delete();
        return $result;
    }

    public function addInfo($info)
    {
        $data['id'] = $info['id'];
        $data['name'] = $info['name'];
        $data['course_property'] = $info['course_property'];
        $data['course_type'] = $info['course_type'];
        $data['course_credit'] = $info['course_credit'];

//        $sql = M('teacher')->fetchSql(true)->data($data)->add();
//        echo $sql;
        $result = M('course')->data($data)->add();
        return $result;
    }
}