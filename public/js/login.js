$(document).ready(function () {
    $('#btnLogin').on('click',function(){
        let login = $('#materialLoginFormEmail').val();
        let password = $('#materialLoginFormPassword').val();
        var baseUrl = document.location.origin + '/login/realizar';
        $.ajax({
            type: "POST",
            url: baseUrl,
            data: {'login': login, 'senha': password},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    window.location.href = `/home/redirect/${data}`;
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });
})
