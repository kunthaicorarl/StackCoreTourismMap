$(document).ready(function() {
$("#galleryType").on('change',function(){
    if($(this).val()=='AddNew'){
        $(window).off('beforeunload');
 
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem("_currentUrl",$('#_currentUrl').attr('href')+"/create");
            localStorage.setItem("_imageObject",$('#imageForm').data('serialize',$('#imageForm').serialize()));
        } else {
            sweetAlert("Oops...", "Sorry, your browser does not support Web Storage...", "error");
            return;
        }
        setTimeout(function(){ window.location = $('#_url').val(); }, 20);
    }
});
});