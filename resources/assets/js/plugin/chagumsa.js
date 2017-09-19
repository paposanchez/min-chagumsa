$(function () {


        // 인증정보 승인처리 및 페이지 이동
        $(document).on('click', '.certificate-assign', function () {

                var id = $(this).data('id');
                if(confirm("인증서 발급을 시작하시겠습니까?"))
                {

                        $('#loading').fadeIn();

                        $.ajax({
                                type: 'post',
                                dataType: 'json',
                                url: '/certificate/'+id+'/assign',
                                success: function (data) {

                                        if(data)
                                        {
                                                location.href = "/certificate/"+id+'/edit';
                                        }else{
                                                alert("인증서 발급절차를 시작할 수 없습니다.\n이미 발급된 인증서인지 확인하세요.");

                                        }

                                        return data;
                                },
                                error: function (data) {
                                        alert("인증서 발급절차를 시작할 수 없습니다.\n이미 발급된 인증서인지 확인하세요.");
                                },
                                complete : function() {
                                        $('#loading').fadeOut();
                                }

                        })
                }
        });



});
