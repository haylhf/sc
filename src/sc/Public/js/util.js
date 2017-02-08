/**
 * Created by PC-LHF on 2017-02-06.
 */
function isStringEmpty(data) {

    if (data == null)
        return true;
    return data.replace(/(^s*)|(s*$)/g, "").length == 0;
}

function getRoleName(role) {
    var name = '管理员';
    switch (parseInt(role)) {

        case 1://teacher
            name = '学生';
            break;
        case 2://student
            name = '教师';
            break;
        case 0://admin
        default:
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

    }
    return result;
}