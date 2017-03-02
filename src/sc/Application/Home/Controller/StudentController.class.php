<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-09
 * Time: 18:40
 */

namespace Home\Controller;


class StudentController extends BaseLoginController
{
    public function index()
    {
        $user = null;
        $currentUser = $_SESSION["user"];
        //islogin
        if (isset($currentUser)) {
            $user = D("student")->getRecords($currentUser);
        }
        if (count($user) > 0) {
            $this->assign("studentUser", json_encode($user[0]));
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

        $record = D("student")->login($data);
        if ($record) {
            $data['password'] = $_POST['newPwd'];
            $result = D("student")->modifyInfo($data);
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
        $result = D("student")->modifyInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    #region # for studentcourse

    public function studentCourse()
    {
        $this->assignUser();
        $electiveCourse = $this->getSelectedDataByElective();
        $majorCourse = $this->getSelectedDataByMajor();
        $selectedCourse = array_merge($electiveCourse, $majorCourse);
        $this->assign("selectedCourses", json_encode($selectedCourse));

        $unSelectedCourses = $this->getUnSelectedData();
        $this->assign("unSelectedCourses", json_encode($unSelectedCourses));
        $this->display();
    }

    public function getSelectedDataByElective()
    {
        $user = $_SESSION["user"];
        $condition = array();
        $condition = array_merge($condition, $_POST);
        $condition['student_id'] = $user['id'];
        $items = D("StudentCourse")->getRecords($condition);
        return $items;
    }

    public function getSelectedDataByMajor()
    {
        $user = $_SESSION["user"];
        $condition = array();
        $condition = array_merge($condition, $_POST);
        $condition['profession_id'] = $user['profession_id'];
        $condition['course_type'] = 0;//必修
        $items = D("TeacherCourse")->getRecords($condition);
        return $items;
    }

    public function getUnSelectedData()
    {
        $user = $_SESSION["user"];
        $condition = array();
        $condition = array_merge($condition, $_POST);
        $condition['student_id'] = $user['id'];
        $condition['profession_id'] = $user['profession_id'];
        $condition['course_type'] = 1;//选修
        $items = D("StudentCourse")->getUnSelectedCourses($condition);
        return $items;
    }

    public function ajaxAddStudentCourse()
    {
        $result = null;
        $user = $_SESSION["user"];
        $condition = array();
        $condition = array_merge($condition, $_POST['data']);

        $result = D("StudentCourse")->addData($condition, $user['id']);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    public function ajaxDeleteRecord()
    {
        $result = null;
        $result = D("StudentCourse")->deleteRecord($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }
    #endregion

    #region #studentSchedule
    public function studentSchedule()
    {
        $electiveCourse = $this->getSelectedDataByElective();
        $majorCourse = $this->getSelectedDataByMajor();
        $selectedCourse = array_merge($electiveCourse, $majorCourse);
        $this->assign("AllCourses", json_encode($selectedCourse));

        $this->assignUser();
        $this->display();
    }
    #endregion
}