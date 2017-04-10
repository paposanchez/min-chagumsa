/*
 Document   :
 Created on : 2013. 7. 29, 오후 5:42:22
 Author     : chali5124@gmail.com
 Description:
 */
$(document).ready(function () {

    // fullscreen
    $(document).on("click", ".plugin-attach-download", function (e) {
        e.preventDefault();
        var id = $(this).closest(".plugin-attach-file").data('id');
        $.fileDownload('/file/download/' + id, {
            error: function (e) {
                $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
            }
        });

    });

    $(document).on("click", ".plugin-attach-delete", function (e) {
        e.preventDefault();

        var $container = $(this).closest(".plugin-attach-file");
        var id = $container.data('id');

        $.ajax({
            url: '/file/delete/' + id,
            dataType: 'json',
            type: 'DELETE',
            success: function (response) {
                if (response.msg) {
                    $.notify(response.msg, "danger");
                }

                if (response.success == true) {
                    $container.remove();
                }
            },
            error: function (e) {
                $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
            }
        });

    });




//        var unknowner_container = $('#zfp-unknown-thumbnail');
//        var unknowner = new plupload.Uploader({
//                runtimes: 'html5,flash,silverlight,html4',
//                browse_button: unknowner_container.attr('id') + '-add',
//                container: unknowner_container.attr('id'),
//                url: "/files/image/",
//                max_file_count: 1,
//                multi_selection: false,
//                file_data_name: 'upfile',
//                filters: {
//                        max_file_size: '10mb',
//                        mime_types: [
//                                {
//                                        title: "Image files",
//                                        extensions: "jpg,gif,png,jpeg"
//                                }
//                        ]
//                },
//                flash_swf_url: '/assets/zfoop/plupload/Moxie.swf',
//                silverlight_xap_url: '/assets/zfoop/plupload/Moxie.xap',
//                init: {
//                        //			PostInit: function () {
//                        //				unknowner_container.find('.zfp-upload-files').innerHTML = '';
//                        //			},
//                        FilesAdded: function (up, files) {
//                                plupload.each(
//                                        files,
//                                        function (file) {
//                                                console.log(unknowner_container.find('.zfp-upload-filename'), file.name);
//                                                unknowner_container.find('.zfp-upload-filename').val(file.name);
//                                        }
//                                );
//                        },
//                        //			UploadProgress: function (up, file) {
//                        //				unknowner_container
//                        //						.find('#' + file.id)
//                        //						.find('.zfp-upload-file-progress')
//                        //						.html(file.percent + "%");
//                        //			},
//                        FilesRemoved: function (up, files) {
//                                plupload.each(files, function (file) {
//                                        console.log('  File Removed:', file);
//                                });
//                        },
//                        FileUploaded: function (up, files, obj) {
//                                var response;
//                                try {
//                                        response = eval(obj.response);
//                                } catch (err) {
//                                        response = eval('(' + obj.response + ')');
//                                }
//
//
//                                plupload.each(response.data, function (file) {
//                                        update_src(file.url);
//                                });
//                                reset_uploader();
//                        },
//                        UploadComplete: function (up, files) {
//                                $('#zfp-modalfile').modal('hide');
//                        },
//                        Error: function (up, err) {
//                                alert(err.message);
//                        }
//
//                }
//        });
//        unknowner.init();
//
//
//        var thumbnail_target;
//
//        // 썸네일
//        $(document).on("click", ".zfp-thumbnail-modal", function (e) {
//                e.preventDefault();
//                thumbnail_target = $(this).closest('.thumbnail');
//                $('#zfp-modalfile').modal();
//        });
//
//        $('#zfp-modalfile').on('hidden.bs.modal', function (e) {
//                e.preventDefault();
//                reset_uploader();
//                $("#inputThumbUrl").val("");
//                $("#zfp-thumbnail-submit").button('reset');
//        });
//
//        // 저장버튼을 누르면 그때 업로드를 한다
//        $(document).on("click", "#zfp-thumbnail-submit", function (e) {
//                e.preventDefault();
//                var obj = $(this);
//                obj.button('loading');
//                var url = $("#inputThumbUrl").val();
//                if (!url) {
//                        if (unknowner.files.length > 0) {
//                                unknowner.start();
//                        } else {
//
//                                obj.button('reset');
//                                alert(ZFOOP.Languages.please_select_upload);
//                        }
//                } else {
//                        update_src(url);
//                        $('#zfp-modalfile').modal('hide');
//                }
//        });
//
//        // 모달 타겟의 이미지정보를 갱신한다
//        var update_src = function (url) {
//                thumbnail_target.find(".zfp-thumbnail").attr("src", url);
//                thumbnail_target.find(".zfp-thumbnail-tmp").val(url);
//        };
//
//        var reset_uploader = function () {
//                unknowner.splice();
//                unknowner.refresh();
//                unknowner_container.find('.zfp-upload-filename').val('');
//        };

});
