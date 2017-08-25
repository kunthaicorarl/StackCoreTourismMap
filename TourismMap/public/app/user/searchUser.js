$(document).ready( function() {
    var $form=$('#userSearchForm');
    var $btn=$('#btnSearch');
    var strUrl="/admin/users/";
    $form.bind("keypress", function(e) {
   if (e.keyCode == 13) {               
    e.preventDefault();
    return false;
   }
  });
        $btn.on('click',function(){
             if($('#searchKey').val()){
                             setTimeout(function(){ window.location = strUrl+$('#searchKey').val()+"/search"; }, 200);
             }else {
                 alert("Input Key Search");
                 return;
             }
         });  
	});