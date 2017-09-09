
$(document).ready(function() {
    function showAlertToDelete(e,numberId){
        e.preventDefault();
       var formData = new FormData();
           formData.append('id', numberId);
            formData.append('_token',_token);
          swal({
            title: "Are you sure to Disable?",
          //  text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d60606",
            confirmButtonText: "Save",
            closeOnConfirm: false
            },
            function(){
           $.ajax({
            type: "POST",
            url:DisableUri,
             data:formData,
              contentType: false,
            //  dataType: "json",
             cache: false,            
             processData:false,       
            success: function(msg) {
                console.log(msg);
               if(msg.success && msg.infor!==undefined){
                //alertify.success(msg.infor[0]);
                 swal("Disabled!",msg.infor[0], "success");
                 setTimeout(function(){ window.location = _urlCurrentPage; }, 1000);
               }else{
                 if(msg.infor!==undefined && msg.infor.length>0){
                     for(var i=0;i<msg.infor.length;i++)
                       alertify.error(msg.infor[i]);
                 }else {
                    sweetAlert("Oops...", "Something went wrong!\n"+msg, "error");
                 }
              }
               
             
            }
        });
            });


    }
    $('.table tr td').on('click','#disableId',function(e){
           var numberId=$(this).attr('data-id');
           console.log(numberId);
           showAlertToDelete(e,numberId);
    });
});
