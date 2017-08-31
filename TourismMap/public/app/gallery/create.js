$(document).ready(function() {
    var $btnObject=null;
    $('.galleryTypeSubmit').on('click',function(e){
        e.preventDefault();
        $btnObject=$(this);
        $("#galleryTypeForm").submit();
    });
    $('.galleryTypeSubmitNew').on('click',function(e){
        e.preventDefault();
        $btnObject=$(this);
        $("#galleryTypeForm").submit();
    });
    $('#galleryTypeForm').on('submit', function (e) {
        e.preventDefault();
        var $form=$(this);
          var $btn = $btnObject;
          $btn.button('loading');
        //  alert($btn.text());
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
                $("#preview").attr("src","");
                alertify.success(msg.infor[0]);
                if($.trim($btn.text())=='Save')
                 {   
                   setTimeout(function(){ window.location = "/admin/gallerys"; },100);
                 }else {
                    $("#galleryTypeForm")[0].reset();
                 }
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

