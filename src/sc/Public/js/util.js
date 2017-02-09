/**
 * Created by PC-LHF on 2017-02-06.
 */
function isStringEmpty(data) {

    if (data == null)
        return true;
    return data.replace(/(^s*)|(s*$)/g, "").length == 0;
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

//判断是否是字母和数字的组合
function regIsDigAlphabet(fData) {
    var reg = new RegExp("^([A-Za-z]{1})[0-9]+$");
    return (reg.test(fData));
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
            break;

    }
    return result;
}

function getCoursePropertyName(cType) {
    var result = '';
    switch (parseInt(cType)) {
        case 1:
            result = '专业课';
            break;
        case 2:
            result = '专业选修课';
            break;
        case 3:
            result = '统考课程';
            break;
        case 0:
        default:
            result = '公共基础课';
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