$(document).ready(function() {

$("#thumbnail").change(function() {
var file = this.files[0];
$("#_thumbnail").val("");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
});
function imageIsLoaded(e) {
$("#preview").attr("src",e.target.result);
};
    $('#form').on('submit', function (e) {
        e.preventDefault();
        var $form=$(this);
          var $btn = $('.upload-image');
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
                $("#form")[0].reset();
                $("#preview").attr("src","");
                alertify.success(msg.infor[0]);
                setTimeout(function(){ window.location =_urlRedirect; },100);
               }else{
                 if(msg.infor.length>0){
                     for(var i=0;i<msg.infor.length;i++)
                       alertify.error(msg.infor[i]);
                    // sweetAlert("Oops...", "Something went wrong!"+msg.infor.join(""), "error");
                 }
              }
            }
        });
    });
});