var resiverid='';
var sendMessageForm=document.getElementById('send-message-form');


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('ac1b704f99279af47d29', {
        cluster: 'eu'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        if (data.from === myid){
            alert('from me ')
        }else if (data.to === myid){
            if (resiverid === data.from){
                alert('to me ')
            }
        }
    });

    $('.user').click(function () {
        $('.user').removeClass('active');
        $(this).addClass('active');

        resiverid=$(this).attr('id');
        $.ajax({
            type:'get',
            url:`/messages/${resiverid}`,
            data:"",
            cache:false,
            success:function (data) {
                document.getElementById('showMessages').innerHTML=data;
            }
        });

    })


    $(document).on('keyup','#input-message',function (e) {
        if(e.keyCode === 13 && $(this).val() !== '' && resiverid !== ''){

            var datastr="resiverid="+resiverid+"&message="+$(this).val();
            $(this).val('');
            $.ajax({
                type:"post",
                url:"/messages/send",
                data:`${datastr}`,
                cache:false,
                success:function (data) {

                },
                error:function (jqXHR,status,err) {

                },
                complete:function () {

                }
            });

        }
    })

})


