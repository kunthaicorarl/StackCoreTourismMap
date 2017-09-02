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
    $('#provinceForm').on('submit', function (e) {
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
               if(msg.success && msg.infor!==undefined){
                $("#provinceForm")[0].reset();
                $("#preview").attr("src","");
                alertify.success(msg.infor[0]);
                setTimeout(function(){ window.location = "/admin/provinces"; }, 1000);
               }else{
                 if(msg.infor!==undefined && msg.infor.length>0){
            
                     for(var i=0;i<msg.infor.length;i++)
                       alertify.error(msg.infor[i]);
                       
                    // sweetAlert("Oops...", "Something went wrong!"+msg.infor.join(""), "error");
                 }else {
                         $('.hasError').html(msg);

                 }
              }
            }
        });
    });

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('preview');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}


});