$(document).ready(function(){
    $('.follow_post_user').click(function(){

        var dataLogin = $(this).attr('dataUser');
        var postId = $(this).val();
        var _token=$('input[name="_token"]').val();
        if(dataLogin) {
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data:{'id':postId, '_token':_token},
                success: function(data) {
                 alert('I have '+ data.value + 'post');
                },
                error: function(data) {
                     alert(data.responseJSON.id[0]);
                }
            });
        } else {
            alert('Please login');
        }
    });
});
