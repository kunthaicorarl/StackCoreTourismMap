$(document).ready(function() {
    var url="/admin/images";
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
                setTimeout(function(){ window.location = url; }, 100);
               }else{
                 if(msg.infor.length>0){
                     for(var i=0;i<msg.infor.length;i++)
                       alertify.error(msg.infor[i]);
                 }
              }
               
              // alertify.error('Error message');
              //  $("#ajaxResponse").append("<div>"+msg+"</div>");
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