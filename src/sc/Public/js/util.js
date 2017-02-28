/**
 * Created by PC-LHF on 2017-02-06.
 */

var EveryPageNum = 2;

function getPageNum(totalRecords) {
    return Math.ceil(totalRecords / EveryPageNum)//当pager indicator超过10的时候显示
}

function getParameter(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}


function getRoleName(role) {
    var name = '';
    switch (parseInt(role)) {

        case 1://teacher
            name = '教师';
            break;
        case 2://student
            name = '学生';
            break;
        case 0://admin
        default:
            name = '管理员'
            break;

    }
    return name;
}

function getUpperStringNumber(num) {
    var result = '一';
    switch (parseInt(num)) {
        case 1:
            result = '一';
            break;
        case 2:
            result = '二';
            break;
        case 3:
            result = '三';
            break;
        case 4:
            result = '四';
            break;
        case 5:
            result = '五';
            break;
        case 6:
            result = '六';
            break;
        case 7:
            result = '七';
            break;
        case 8:
            result = '八';
            break;
        case 9:
            result = '九';
            break;
        default:
            result = '请选择';
            break;

    }
    return result;
}

function getCoursePropertyName(cType) {
    var result = '';
    switch (parseInt(cType)) {
        case 1:
            result = '统考课程';
            break;
        case 2:
            result = '专业选修课';
            break;
        case 3:
            result = '公共选修课';
            break;
        case 0:
        default:
            result = '专业课';
            break;
    }
    return result;
}


function getCourseTypeName(cType) {
    var result = '';
    switch (parseInt(cType)) {
        case 1:
            result = '选修课';
            break;
        case 0:
        default:
            result = '必修课';
            break;
    }
    return result;
}

function getCourseTimeByMajor(timeType) {
    var result = '';
    switch (parseInt(timeType)) {
        case 2:
            result = '10:00 ~ 12:00';
            break;
        case 3:
            result = '14:00 ~ 16:00';
            break;
        case 4:
            result = '15:00 ~ 17:00';
            break;
        case 1:
            result = '09:00 ~ 11:00';
            break;
        default:
            result = '请选择';
            break;
    }
    return result;
}
function getCourseTimeByElective(timeType) {
    var result = '';
    switch (parseInt(timeType)) {
        case 2:
            result = '11:00 ~ 12:00';
            break;
        case 3:
            result = '14:00 ~ 15:00';
            break;
        case 4:
            result = '16:00 ~ 17:00';
            break;
        case 1:
            result = '09:00 ~ 10:00';
            break;
        default:
            result = '请选择';
            break;
    }
    return result;
}

function getAllCourseTime(timeType) {
    var result = '';
    switch (parseInt(timeType)) {
        case 2:
            result = '10:00 ~ 11:00';
            break;
        case 3:
            result = '11:00 ~ 12:00';
            break;
        case 4:
            result = '14:00 ~ 15:00';
            break;
        case 5:
            result = '15:00 ~ 16:00';
            break;
        case 6:
            result = '16:00 ~ 17:00';
            break;
        case 1:
        default:
            result = '09:00 ~ 10:00';
            break;
    }
    return result;
}

function getCourseMaxPeople(ptype) {
    var result = '';
    switch (parseInt(ptype)) {
        case 2:
            result = '100';
            break;
        case 3:
            result = '150';
            break;
        case 4:
            result = '200';
            break;
        case 1:
            result = '50';
            break;
        default:
            result = '请选择';
            break;
    }
    return result;
}

function isStringEmpty(data) {

    if (data == null)
        return true;
    return data.replace(/(^s*)|(s*$)/g, "").length == 0;
}

function isInteger(obj) {
    return (obj | 0) === obj;
}

//验证Email是否正确
function regIsEmail(fData) {
    var reg = new RegExp("^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$");
    return reg.test(fData);
}

//判断手机号是否正确
function regIsPhone(fData) {
    var reg = /^1\d{10}$/;
    return reg.test(fData);
}


//判断是否是字母和数字的组合
function regIsDigAlphabet(fData) {
    var reg = new RegExp("^([A-Za-z]{1})[0-9]+$");
    return (reg.test(fData));
}
