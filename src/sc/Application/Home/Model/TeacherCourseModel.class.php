<?php
/**
 * Created by PhpStorm.
 * User: Hay
 * Date: 2017/2/12
 * Time: 16:08
 */

namespace Home\Model;

use Think\Model;

class TeacherCourseModel extends Model
{
    public function getRecords($condition = null)
    {
        $data = " 1 ";
        if ($condition) {
            if (isset($condition['teacher_course_id'])) {
                $str = $condition['teacher_course_id'];
                $data .= " AND teacher_course_id='$str' ";
            }
            if ($condition['teacher_id']) {
                $str = $condition['teacher_id'];
                $data .= " AND teacher_id='$str' ";
            }
            if ($condition['course_id']) {
                $str = $condition['course_id'];
                $data .= " AND course_id='$str' ";
            }
            if ($condition['profession_id']) {
                $str = $condition['profession_id'];
                $data .= " AND profession_id='$str' ";
            }
            if ($condition['building_id']) {
                $str = $condition['building_id'];
                $data .= " AND building_id='$str' ";
            }
            if (isset($condition['course_type']) && $condition['course_type'] >= 0) {
                $str = $condition['course_type'];
                $data .= " AND course_type='$str' ";
            }
            if (isset($condition['course_weekday']) && $condition['course_weekday'] > 0) {
                $str = $condition['course_weekday'];
                $data .= " AND course_weekday='$str' ";
            }
            if (isset($condition['course_start_time']) && $condition['course_start_time'] > 0) {
                $str = $condition['course_start_time'];
                $data .= " AND course_start_time='$str' ";
            }

        }
        $list = M('teacher_course_department_view')
//            ->fetchSql(true)// test sql
            ->alias("t")
            ->where($data)
            ->select();
//        echo $list;
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

    public function addData($info)
    {
        $data['profession_id'] = $info['profession_id'];
        $data['teacher_id'] = $info['teacher_id'];
        $data['course_id'] = $info['course_id'];
        $data['building_id'] = $info['building_id'];
        $data['course_weekday'] = $info['course_weekday'];
        $data['course_start_time'] = $info['course_start_time'];
        $data['course_max_people'] = $info['course_max_people'];
        $data['remark'] = $info['remark'];

//        $sql = M('teacher')->fetchSql(true)->data($data)->add();
//        echo $sql;
        $result = M('teacher_course')->data($data)->add();
        return $result;

    }

    //teacher_course_id
    public function deleteRecord($condition)
    {
        $data['id'] = $condition['teacher_course_id'];
        $result = M('teacher_course')->where($data)->delete();
        return $result;
    }
}