/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// เพ่มข้อมูล ของ ประเภทงานบริการ
//$(function () {
//    $('#modelServiceType1').click(function () {
//        $('.modal').modal('show')
//                .find('#modelContent')
//                .load($(this).attr('value'));
//    });
//});


$(function () {
    $('#BtnModalSubtype').click(function (e) {
        e.preventDefault();
        $('#modalServiceSubtype').modal('show')
                .find('#modalContentServiceSubtype')
                .load($(this).attr('value'));
        return false;
    });
});


$(function () {
    $('#BtnModaltype').click(function (e) {
        e.preventDefault();
        $('#modalServiceType').modal('show')
                .find('#modalContentServiceType')
                .load($(this).attr('value'));
        return false;
    });
});



$(function () {
    $('#modelUserSystem').click(function () {
        $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));
    });
});
$(function () {
    $('#modelDepartment').click(function () {
        $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));
    });
});


$(function () {
    $('#BtnModelComponents').click(function () {
        $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));
    });
});
/*
 $(function () {
 $('#BtnModalComp').click(function (e) {
 e.preventDefault();
 $('#modalComp').modal('show')
 .find('#modalContent')
 .load($(this).attr('value'));
 return false;
 
 });
 });
 */
$(function () {
    $('#modelComp').click(function () {
        $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));
        return false;
    });
});

$(function () {
    $('#BtnModalTeamwork').click(function (e) {
        e.preventDefault();
        $('#modalTeamwork').modal('show')
                .find('#modalContentTeamwork')
                .load($(this).attr('value'));
        return false;
    });
});

$(function () {
    $('#BtnModalAccount').click(function (e) {
        e.preventDefault();
        $('#modalAccount').modal('show')
                .find('#modalContentAccount')
                .load($(this).attr('value'));
        return false;
    });
});


$(function () {
    $('#BtnModalSoftware').click(function (e) {
        e.preventDefault();
        $('#modalSoftware').modal('show')
                .find('#modalContentSoftware')
                .load($(this).attr('value'));
        return false;
    });
});

$(function () {
    $('#BtnModalWebsite').click(function (e) {
        e.preventDefault();
        $('#modalWebsite').modal('show')
                .find('#modalContentWebsite')
                .load($(this).attr('value'));
        return false;
    });
});