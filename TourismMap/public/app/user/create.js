$(document).ready(function() {
    $('#userForm').on('submit', function (e) {
        e.preventDefault();
        var $form=$(this);
          var $btn = $('.userSubmit');
          $btn.button('loading');
        
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data:new FormData(this),
            contentType: false,      
            cache: false,            
            processData:false,       
            success: function(msg) {
                console.log(msg);
                 $btn.button('reset');
               if(msg.success){
                $("#userForm")[0].reset();
                $("#preview").attr("src","");
                alertify.success(msg.infor[0]);
                setTimeout(function(){ window.location = "/admin/users"; }, 1000);
               }else{
                 if(msg.infor.length>0){
                     for(var i=0;i<msg.infor.length;i++)
                       alertify.error(msg.infor[i]);
                 }
              }
            }
        });
   });
});

