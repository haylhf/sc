<?php
namespace Home\Controller;

use Think\Controller;


//Author: Li Haifeng
//2017/02/05

class AdminController extends BaseLoginController
{

    public function index()
    {
        if ($_SESSION["user"] != null) {
            unset($_SESSION["user"]);
        }
        $this->display();
    }

    public function assignUser()
    {
        $this->assign("currentuser", json_encode($_SESSION["user"]));
    }

    public function adminMain()
    {
        $user = null;
        $currentUser = $_SESSION["user"];
        if (isset($currentUser)) {
            $user["name"] = $currentUser["name"];
            $user["id"] = $currentUser["id"];
        }
        $this->assign("adminUser", json_encode($user));
        $this->assignUser();
        $this->display();
    }

    public function ajaxModify()
    {
        $result = null;
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['oldPwd'];
        $data['id'] = $_POST['id'];

        $record = D("admin")->login($data);
        if ($record) {
            $data['password'] = $_POST['newPwd'];
            $result = D("admin")->modifyPassword($data);
        }

        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    #region #teacher data
    public function teacherManage()
    {
        $result = D("teacher")->getRecords();
        $this->assign("records", json_encode($result));
        $this->assignUser();
        $this->getDepartments();
        $this->display();
    }

    public function ajaxDeleteTeacher()
    {
        $condition['id'] = $_POST['id'];
        if ($condition['id']) {
            $result = D("teacher")->deleteRecord($condition);
        }
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }

    public function ajaxAddTeacher()
    {
        $result = D("teacher")->addInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }
    #endregion

    #region #student data
    function getDepartments()
    {
        $result = D("department")->getDepartments();
        $this->assign("department_items", json_encode($result));
    }

    function getProfessions()
    {
        $result = D("profession")->getProfessions();
        $this->assign("profession_items", json_encode($result));
    }

    public function studentManage()
    {
        $result = D("student")->getRecords();
        $this->assign("records", json_encode($result));
        $this->assignUser();
        $this->getDepartments();
        $this->getProfessions();
        $this->display();
    }

    public function ajaxAddStudent()
    {
        $result = D("student")->addInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }

    public function ajaxDeleteStudent()
    {
        $condition['id'] = $_POST['id'];
        if ($condition['id']) {
            $result = D("student")->deleteRecord($condition);
        }
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }
    #endregion

    #region #building data
    public function buildingManage()
    {
        $result = D("building")->getRecords();
        $this->assign("records", json_encode($result));
        $this->assignUser();
        $this->display();
    }

    public function ajaxAddBuilding()
    {
        $result = D("building")->addInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }

    public function ajaxDeleteBuilding()
    {
        $condition['id'] = $_POST['id'];
        if ($condition['id']) {
            $result = D("building")->deleteRecord($condition);
        }
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }
    #endregion

    #region #Profession data
    public function courseManage()
    {
        $result = D("course")->getRecords();
        $this->assign("records", json_encode($result));
        $this->assignUser();
        $this->display();
    }

    public function ajaxAddCourse()
    {
        $result = D("course")->addInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }

    public function ajaxDeleteCourse()
    {
        $condition['id'] = $_POST['id'];
        if ($condition['id']) {
            $result = D("course")->deleteRecord($condition);
        }
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }
    #endregion

    #region #Course data
    public function professionManage()
    {
        $result = D("profession")->getRecords();
        $this->assign("records", json_encode($result));
        $this->assignUser();
        $this->getDepartments();
        $this->display();
    }

    public function ajaxAddProfession()
    {
        $result = D("profession")->addInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }

    public function ajaxDeleteProfession()
    {
        $condition['id'] = $_POST['id'];
        if ($condition['id']) {
            $result = D("profession")->deleteRecord($condition);
        }
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }
    #endregion

}