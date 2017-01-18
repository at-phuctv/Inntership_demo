$(document).ready(function(){
    $('.follow_post_user').click(function(){

        var dataLogin = $(this).attr('dataUser');
        var postId = $(this).val();
        var _token=$('input[name="_token"]').val();
        if(dataLogin) {
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'text',
                data:{'id':postId, '_token':_token},
                success: function(data) {
                alert('I have ' + data + ' post');
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        } else {
            alert('Please login');
        }
    });
});
