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
