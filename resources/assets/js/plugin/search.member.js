/* 
 Document   : 
 Created on : 2013. 7. 29, 오후 5:42:22
 Author     : chali5124@gmail.com
 Description: 회원검색폼 자바스크립트
 */
$(document).ready(function () {

    var obj = "";
    $(document).on("click", ".zfp-member-modal", function (b) {
        obj = $(this);
        $("#modal_member").modal();
    });

    $("#zfp-member-results").on("click", ".zfp-form-member-select", function (d) {
        d.preventDefault();
        var b = $(this).data("idx");
        var c = $(this).data("name");
        obj.closest(".zfp-form-wrap").find(".zfp-member-display").val(c);
        obj.closest(".zfp-form-wrap").find(".zfp-member-idx").val(b);
        $("#modal_member").modal("hide");
    });

    $('#zfp-paginator').bootpag({
        total: 1,
        next: '<i class="fa fa-chevron-right"></i>',
        prev: '<i class="fa fa-chevron-left"></i>',
        maxVisible: 10
    }).on("page", function (e, p) {
        $("#zfp-member-page").val(p);
        search();
    });

    $(document).on('submit', "#zfp-form-member", function (e) {
        e.preventDefault();
        search();
    });

    function reset_select() {
        $("#zfp-member-page").val('1');
        $("#zfp-member-results").empty();
        $("#zfp-member-total").html("0");
    }

    var search = function () {
        $.ajax({
            url: "/json/member/",
            dataType: 'json',
            data: $("#zfp-form-member").serialize(),
            type: 'POST',
            success: function (response) {
                if (response.msg) {
                    alert(response.msg);
                }

                if (response.status === "ok") {

                    $("#zfp-member-total").html(response.data.total);
                    $('#zfp-paginator').bootpag({total: response.data.pages});

                    var html = "";
                    for (var d in response.data.entrys) {
                        var f = response.data.entrys[d];
                        html += "<tr>";
                        html += "<td>" + f.idx + "</td>";
                        html += "<td class='text-left'>" + f.name + "</td>";
                        html += "<td>" + f.email + "</td>";
                        html += '<td><a href="#" data-idx="' + f.idx + '" data-name="' + f.name + '" class="btn btn-info btn-sm zfp-form-member-select"><i class="fa fa-check"></i></a></td>';
                        html += "</tr>";
                    }
                    $("#zfp-member-results").html(html);


                }
            },
            error: function (e) {
                alert(ZFOOP.Languages.can_not_process_retry);
            }
        });
    };

    $("#inputSearchAddress").on("shown.bs.modal", function (b) {
        reset_select();
    });

});