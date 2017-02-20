<?php
/**
 * Created by PhpStorm.
 * User: Hay
 * Date: 2017/2/12
 * Time: 16:08
 */

namespace Home\Model;

use Think\Model;

class StudentCourseModel extends Model
{
    public function getRecords($condition = null)
    {
        $data = " 1 ";
        if ($condition) {
            if (isset($condition['student_course_id'])) {
                $str = $condition['student_course_id'];
                $data .= " AND student_course_id='$str' ";
            }
            if ($condition['student_id']) {
                $str = $condition['student_id'];
                $data .= " AND student_id='$str' ";
            }
            if ($condition['teacher_id']) {
                $str = $condition['teacher_id'];
                $data .= " AND teacher_id='$str' ";
            }
            if ($condition['course_id']) {
                $str = $condition['course_id'];
                $data .= " AND course_id='$str' ";
            }
        }
        $list = M('student_course_view')
//            ->fetchSql(true)// test sql
            ->alias("s")
            ->where($data)
            ->select();
//        echo $list;
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

    public function getUnSelectedCourses($condition = null)
    {
        $data = " 1 ";
        if ($condition) {
            if (isset($condition['student_id'])) {
                $str = $condition['student_id'];
                $data .= " AND v.course_id NOT IN 
                (SELECT sc.course_id 
                FROM sc_student_course_view AS sc
                WHERE sc.student_id = '$str'
                )  ";//排除已经选择的课程
            }
            if ($condition['teacher_id']) {
                $str = $condition['teacher_id'];
                $data .= " AND v.teacher_id='$str' ";
            }
            if ($condition['course_id']) {
                $str = $condition['course_id'];
                $data .= " AND v.course_id='$str' ";
            }
            if ($condition['profession_id']) {
                $str = $condition['profession_id'];
                $data .= " AND v.profession_id='$str' ";
            }
            if (isset($condition['course_type']) && $condition['course_type'] >= 0) {
                $str = $condition['course_type'];
                $data .= " AND v.course_type='$str' ";
            }
        }
        $list = M('teacher_course_department_view')
//            ->fetchSql(true)// test sql
            ->alias("v")
            ->join('LEFT JOIN 
            (SELECT teacher_course_id, COUNT(*) AS selected_people FROM ' . C('DB_PREFIX') .
            'student_course GROUP BY teacher_course_id) AS sp 
	        ON sp.teacher_course_id=v.teacher_course_id')//列出该课程的已选人数
            ->where($data)
            ->field('v.*,sp.selected_people')
            ->select();
//        echo $list;
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

    public function addData($infodata, $id)
    {
        foreach ($infodata as $info) {
            $data['student_id'] = $id;
            $data['teacher_course_id'] = $info['teacher_course_id'];
            $result = M('student_course')->data($data)->add();
        }
        return $result;

    }

    public function deleteRecord($condition)
    {
        $data['id'] = $condition['student_course_id'];
        $result = M('student_course')->where($data)->delete();
        return $result;
    }
}