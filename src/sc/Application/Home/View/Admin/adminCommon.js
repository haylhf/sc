/**
 * Created by PC-LHF on 2017-02-08.
 */
var appHeader = new Vue({
    el: '#divHeader',
    data: {
        currentuser: {},
        submitUrl: "{:U('admin/ajaxLogout')}",
    },
    methods: {
        logout: function () {
            $.ajax({
                url: this.submitUrl,
                type: 'POST',
                dataType: 'json',
//                    data: '',
                success: function (result) {
                    if (result.status) {
                        window.location.href = "{:U('admin/index')}";
                    }
                },
            })
        },
    },
    created: function () {
        this.currentuser = JSON.parse('{$currentuser}');
    },
    filters: {
        converterRole: function (role) {
            return getRoleName(role);
        }
    },
});