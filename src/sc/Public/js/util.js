/**
 * Created by PC-LHF on 2017-02-06.
 */
function isStringEmpty(data) {

    if (data == null)
        return true;
    return data.replace(/(^s*)|(s*$)/g, "").length == 0;
}
