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

}