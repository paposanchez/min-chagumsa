/*
 Document   :
 Created on : 2013. 7. 29, 오후 5:42:22
 Author     : chali5124@gmail.com
 Description:
 */
$(document).ready(function () {

    $(document).ready(function () {

        // 회원아이디 찾기
        $("#inputUserId").select2({
            ajax: {
                url: "/json/users",
                dataType: 'json',
                language: 'ko-KR',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * data.per_page) < data.total
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateResult: function formatValues(data) {
                return data.name;
            }, // omitted for brevity, see the source of this page
            templateSelection: function formatRepoSelection(data) {
                return data.name;
            } // omitted for brevity, see the source of this page
        });

        // 태그 찾기
        $("#inputTag").select2({
            ajax: {
                url: "/json/tags",
                dataType: 'json',
                language: 'ko-KR',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * data.per_page) < data.total
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateResult: function formatValues(data) {
                return data.name;
            },
            templateSelection: function formatRepoSelection(data) {
                return data.name;
            }
        });

        ////===========================================================================

        $("#frmPost").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30
                },
                email: {
                    email: true,
                    maxlength: 30
                },
                category_idx: {
                    required: true,
                },
                passwd: {
                    required: true,
                },
                subject: {
                    required: true,
                    maxlength: 250
                },
                content: {
                    required: true
                }
            }
        });

        $("#frmPassword").validate({
            rules: {
                passwd: {
                    required: true
                }
            }
        });



        $(document).on('click', "#zfp-board-submit", function (e) {
            e.preventDefault();
            $(this).closest('div').find('.btn').button('loading');
            if ($('#frmBoard').valid()) {
                $("#frmBoard").submit();
            } else {
                $(this).closest('div').find('.btn').button('reset');
            }
        });


        // 게시물 삭제
        $(document).on(
                'click',
                ".zfp-board-delete",
                function (e) {
                    e.preventDefault();
                    var obj = $(this);
                    if (confirm(ZFOOP.Languages.really_delete)) {
                        $('<form method="POST" action="' + obj.attr('href') + '"><input type="hidden" name="idx" value="' + obj.data('idx') + '"></form>').appendTo('body').submit();
                    }
                }
        );
        // ################ opinion
        $(document).on(
                'click',
                '.zfp-board-opinion',
                function (e) {
                    e.preventDefault();
                    var obj = $(this);
                    var datas = $(this).attr('href').split("?");
                    $.ajax({
                        url: $(this).attr('href'),
                        dataType: 'json',
                        data: datas.pop(),
                        type: 'POST',
                        success: function (response) {

                            if (response.msg) {
                                alert(response.msg);
                            }

                            if (response.data.cnt) {
                                var html = obj.find(".zfp-board-opinion-result");
                                html.fadeOut(
                                        'slow',
                                        function () {
                                            html.html(response.data.cnt).fadeIn();
                                        }
                                );
                            }
                        },
                        error: function (e) {
                            $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
                        }
                    });
                }
        );
        // ################ comments
        $("#frmComment").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30
                },
                email: {
                    email: true,
                    maxlength: 30
                },
                passwd: {
                    required: true,
                },
                content: {
                    required: true
                }
            }
        });
        $("#frmCommentReply").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30
                },
                email: {
                    email: true,
                    maxlength: 30
                },
                passwd: {
                    required: true,
                },
                content: {
                    required: true
                }
            }
        });
        $(document).on(
                'click',
                ".zfp-board-comment-reply",
                function (e) {
                    e.preventDefault();
                    var data = $(this).closest('.media').data('json');
                    data = $.deparam(data);
                    // 기존에 생성된 댓글의 댓글폼이 있다면 삭제
                    $("#frmCommentReply").remove();
                    // 신 규댓글의 댓글폼생성
                    var clone = $("#frmComment").clone();
                    clone.attr("id", "frmCommentReply");
                    clone.removeClass("hide");
                    clone.find(':input[name="parent"]').val(data.idx);
                    $(this).closest(".media-heading").next(".media-text").after(clone);
                }
        );
      
        // 댓글삭제
        $(document).on("click", ".zfp-board-comment-delete", function (e) {
            e.preventDefault();
            var obj = $(this);
            if (confirm(ZFOOP.Languages.really_delete)) {
                $('<form method="POST" action="' + obj.attr('href') + '"><input type="hidden" name="idx" value="' + obj.data('idx') + '"></form>').appendTo('body').submit();
            }
        });
    });
});
