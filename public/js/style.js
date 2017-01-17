$(document).ready(function(){
    $('.follow_post_user').click(function(){
        var url = "/follow-post/";
        var dataLogin = $(this).attr('dataUser');
        var postId = $(this).val();
        url += postId;
        if(dataLogin) {
            var get = "GET";
            $.ajax({
                type: get,
                url: url,
                dataType: 'text',
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
