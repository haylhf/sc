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

    public function ajaxAddTeacherCourse()
    {
        $result = null;
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