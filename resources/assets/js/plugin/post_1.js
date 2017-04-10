/*
 Document   :
 Created on : 2013. 7. 29, 오후 5:42:22
 Author     : chali5124@gmail.com
 Description:
 */
$(document).ready(function () {

/*
    var thumnailer = new plupload.Uploader({
        container: document.getElementById('plugin-thumbnail'), // ... or DOM Element itself
        browse_button: document.getElementById('plugin-thumbnail-add'),
        files_container: 'plugin-attach-files',
        file_container: 'plugin-attach-file',
        delete_button: 'plugin-attach-delete',
        download_button: 'plugin-attach-download',
        file_process: 'plugin-attach-process',
        url: '/file/upload',
        runtimes: 'html5,flash,silverlight,html4',
        flash_swf_url: '{{  assets( "vendor/plupload/Moxie.swf" ) }}',
        silverlight_xap_url: '{{  assets( "vendor/plupload/Moxie.xap" ) }}',
        max_file_count: 1,
        multi_selection: false,
        file_data_name: 'thumbnail',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        filters: {
            max_file_size: '2mb',
            mime_types: [
                {
                    title: "Image files",
                    extensions: "jpg,gif,png,jpeg"
                }
            ]
        },
        init: {
            PostInit: function (up) {
                var $that = this;
                var $container = $($that.settings.container);
                // 선택파일목록삭제
                $container.find("." + $that.settings.files_container).empty();
                // 다운로드
                $container.on('click', "." + $that.settings.download_button, function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    $.fileDownload('/file/download/', {
                        httpMethod: "POST",
                        data: $this.data('json'),
                        error: function (e) {
                            $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
                        },
                    });
                });
                // 삭제
                $(document).on('click', "." + this.settings.delete_button, function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var $container = $this.closest('.' + $that.settings.file_container);
                    if ($this.data('json')) {
                        $.ajax({
                            url: '/file/delete/',
                            dataType: 'json',
                            data: $this.data('json'),
                            type: 'POST',
                            success: function (response) {
                                if (response.msg) {
                                    $.notify(response.msg, "danger");
                                }

                                if (response.status == "success") {
                                    $container.remove();
                                }
                            },
                            error: function (e) {
                                $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
                            },
                            complete: function () {
                                $this.prop('disabled', false);
                            }
                        });
                    } else {
                        up.removeFile($container.attr("id"));
                        $container.remove();
                    }

                });
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    var html = '';
                    html += '<div class="' + up.settings.file_container + ' list-group-item" data-json="idx=" id="' + file.id + '">';
                    html += '<a href="#" class="' + up.settings.download_button + '">' + file.name + '</a>';
                    html += '<div class="pull-right">';
                    html += '<small class="' + up.settings.file_process + ' text-success"></small>';
                    html += '<small class="text-muted">' + plupload.formatSize(file.size) + '</small>';
                    html += '&nbsp;<a href="#" class="' + up.settings.delete_button + '"><i class="fa fa-times text-danger"></i></a>';
                    html += '</div></div>';
                    $(up.settings.container).find('.' + up.settings.files_container).append(html);
                });
                up.start();
            },
            UploadProgress: function (up, file) {
                $(up.settings.container).find('#' + file.id)
                        .find(up.settings.file_process)
                        .html(file.percent + "%");
            },
            Error: function (up, err) {
                $.notify(err.message, "alert-danger");
            }
        }
    });
    thumnailer.init();
    var uploader = new plupload.Uploader({
        container: document.getElementById('plugin-attachment'), // ... or DOM Element itself
        browse_button: document.getElementById('plugin-attachment-add'),
        files_container: 'plugin-attach-files',
        file_container: 'plugin-attach-file',
        file_process: 'plugin-attach-process',
        delete_button: 'plugin-attach-delete',
        download_button: 'plugin-attach-download',
        url: '/file/upload',
        runtimes: 'html5,flash,silverlight,html4',
        flash_swf_url: '{{  asset( "assets/vendor/plupload/Moxie.swf" ) }}',
        silverlight_xap_url: '{{  asset( "assets/vendor/plupload/Moxie.xap" ) }}',
        max_file_count: 1,
//        multi_selection: false,
        file_data_name: 'upfile',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        filters: {
            max_file_size: '10mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
                {title: "Zip files", extensions: "zip"}
            ]
        },
        init: {
            PostInit: function (up) {
                var $that = this;
                var $container = $($that.settings.container);
                // 선택파일목록삭제
                $container.find("." + $that.settings.files_container).empty();
                // 파일다운로드
                $container.on('click', "." + $that.settings.download_button, function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    $.fileDownload('/file/download/', {
                        httpMethod: "POST",
                        data: $this.data('json'),
                        error: function (e) {
                            $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
                        },
                    });
                });
                // 삭제
                $(document).on('click', "." + this.settings.delete_button, function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var $container = $this.closest('.' + $that.settings.file_container);
                    if ($this.data('json')) {
                        $.ajax({
                            url: '/file/delete/',
                            dataType: 'json',
                            data: $this.data('json'),
                            type: 'POST',
                            success: function (response) {
                                if (response.msg) {
                                    $.notify(response.msg, "danger");
                                }

                                if (response.status == "success") {
                                    $container.remove();
                                }
                            },
                            error: function (e) {
                                $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
                            },
                            complete: function () {
                                $this.prop('disabled', false);
                            }
                        });
                    } else {
                        up.removeFile($container.attr("id"));
                        $container.remove();
                    }

                });
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    var html = '';
                    html += '<div class="' + up.settings.file_container + ' list-group-item" data-json="idx=" id="' + file.id + '">';
                    html += '<a href="#" class="' + up.settings.download_button + '">' + file.name + '</a>';
                    html += '<div class="pull-right">';
                    html += '<small class="' + up.settings.file_process + ' text-success"></small>';
                    html += '<small class="text-muted">' + plupload.formatSize(file.size) + '</small>';
                    html += '&nbsp;<a href="#" class="' + up.settings.delete_button + '"><i class="fa fa-times text-danger"></i></a>';
                    html += '</div></div>';
                    $(up.settings.container).find('.' + up.settings.files_container).append(html);
                });
                up.start();
            },
            UploadProgress: function (up, file) {
                $(up.settings.container).find('#' + file.id)
                        .find(up.settings.file_process)
                        .html(file.percent + "%");
            },
            Error: function (up, err) {
                $.notify(err.message, "danger");
            }
        }
    });
    uploader.init();

*/

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
                if (thumbnailer.files.length > 0) {
                    thumbnailer.start();
                } else {
                    if (uploader.files.length > 0) {
                        uploader.start();
                    } else {
                        $("#frmBoard").submit();
                    }
                }
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
        //	$(document).on(
        //			'click',
        //			".zfp-board-comment-delete",
        //			function (e) {
        //				e.preventDefault();
        //
        //				if (confirm(ZFOOP.Languages.really_delete)) {
        //					window.location.href = $(this).attr('href');
        //				}
        //			}
        //	);

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
