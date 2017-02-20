<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-09
 * Time: 18:40
 */

namespace Home\Controller;


class TeacherController extends BaseLoginController
{
    public function index()
    {
        $user = null;
        $currentUser = $_SESSION["user"];
        //islogin
        if (isset($currentUser)) {
            $user = D("teacher")->getRecords($currentUser);
        }
        if (count($user) > 0) {
            $this->assign("teacherUser", json_encode($user[0]));
        }
        $this->assignUser();
        $this->display();
    }

    public function assignUser()
    {
        $this->assign("currentuser", json_encode($_SESSION["user"]));
    }

    public function ajaxModifyPwd()
    {
        $result = null;
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['oldPwd'];
        $data['id'] = $_POST['id'];

        $record = D("teacher")->login($data);
        if ($record) {
            $data['password'] = $_POST['newPwd'];
            $result = D("teacher")->modifyInfo($data);
        }

        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    public function ajaxModifyInfo()
    {
        $result = null;
        $result = D("teacher")->modifyInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    public function teacherCourse()
    {
        $allcourses = D("course")->getRecords();
        $this->assign("courses", json_encode($allcourses));

        $user = $_SESSION["user"];
        $condition['department_id'] = $user['department_id'];
        $allprofessions = D("profession")->getRecords($condition);
        $this->assign("professions", json_encode($allprofessions));

        $allbuildings = D("building")->getRecords();
        $this->assign("buildings", json_encode($allbuildings));

//        $condition['teacher_id'] = $user['id'];
//        $result = D("TeacherCourse")->getRecords($condition);
//        $this->assign("records", json_encode($result));
        $this->assignUser();
        $this->display();
    }

    //同一个专业都为必修课时，验证是否有时间冲突
    public function isConflictCourseTime($data)
    {
        $result = false;
        $condition['profession_id'] = $data['profession_id'];
        $condition['course_weekday'] = $data['course_weekday'];
        $condition['course_start_time'] = $data['course_start_time'];
        $condition['course_type'] = $data['course_type'];
        if ($condition['course_type'] == 0)//必修
        {
            $items = D("TeacherCourse")->getRecords($condition);
            $result = count($items) > 0;
        }
        return $result;
    }

    //验证同一时间上课地点是否有冲突
    public function isConflictCourseBuilding($data)
    {
        $result = false;
        $condition['building_id'] = $data['building_id'];
        $condition['course_weekday'] = $data['course_weekday'];
        $condition['course_start_time'] = $data['course_start_time'];
        $items = D("TeacherCourse")->getRecords($condition);
        $result = count($items) > 0;
        return $result;
    }

    //验证同一个必修课在同一个专业只能是一个教师上
    public function isConflictCourse($data)
    {
        $result = false;
        $condition['profession_id'] = $data['profession_id'];
        $condition['course_id'] = $data['course_id'];
        $condition['course_type'] = $data['course_type'];
        if ($condition['course_type'] == 0)//必修
        {
            $items = D("TeacherCourse")->getRecords($condition);
            $result = count($items) > 0;
        }
        return $result;
    }

    public function ajaxAddTeacherCourse()
    {
        $result = false;
        $msg = '';
        if ($this->isConflictCourse($_POST)) {
            $msg = '您所开的必修课程在所在专业已经有其它老师开设了，请重新选择';
            $this->error($msg);
            return;
        }
        if ($this->isConflictCourseTime($_POST)) {
            $msg = '您所开的必修课程在所在专业与其它课程时间冲突，请重新选择';
            $this->error($msg);
            return;
        }
        if ($this->isConflictCourseBuilding($_POST)) {
            $msg = '您所开课程与其它课程在同一时间地点，请重新选择';
            $this->error($msg);
            return;
        }
        $result = D("TeacherCourse")->addData($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }

    }

    public function ajaxDeleteRecord()
    {
        $result = null;
        $result = D("TeacherCourse")->deleteRecord($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    public function ajaxSearchData()
    {
        $user = $_SESSION["user"];
        $condition = array();
        $condition = array_merge($condition, $_POST);
        $condition['teacher_id'] = $user['id'];
        $items = D("TeacherCourse")->getRecords($condition);
        if (isset($items)) {
            $this->success($items);
        } else {
            $this->error("NO data");
        }
    }

}