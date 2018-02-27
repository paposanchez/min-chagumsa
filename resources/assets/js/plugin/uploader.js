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
                // $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
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

});
