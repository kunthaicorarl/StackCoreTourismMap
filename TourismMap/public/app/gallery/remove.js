$(document).ready(function() {
    $('#form').on('submit', function (e) {
        e.preventDefault();
        var $form=$(this);
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data:new FormData(this),
            contentType: false,      
            cache: false,            
            processData:false,       
            success: function(msg) {
                console.log(msg);
               if(msg.success){
                alertify.success(msg.infor[0]);
                setTimeout(function(){ window.location = "/admin/gallerys"; }, 1000);
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