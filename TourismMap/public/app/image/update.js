$(document).ready(function() {
    $('#galleryTypeForm').on('submit', function (e) {
        e.preventDefault();
        var $form=$(this);
          var $btn = $('.galleryTypeSubmit');
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
                 if(msg.alert!==undefined && msg.alert)
                  { 
                     sweetAlert("Oops...", "Something went wrong!"+msg.infor, "error");
                     return;   
                    }
                if(msg.success){
                $("#galleryTypeForm")[0].reset();
                $("#preview").attr("src","");
                alertify.success(msg.infor[0]);
                setTimeout(function(){ window.location = "/admin/gallerys"; }, 1000);
               }else{
                 if(msg.infor!==undefined && msg.infor.length>0){
                     for(var i=0;i<msg.infor.length;i++)
                       alertify.error(msg.infor[i]);
                 }else{
                   alertify.alert(msg, function(){
                    alertify.message('Bug');
                  });
                 }
              }
            }
        });
   });
});

