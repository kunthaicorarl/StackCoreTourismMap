$(document).ready(function() {
$formUser=$('#form')
$formUser.data('serialize',$formUser.serialize()); // On load save form current state
$(window).bind('beforeunload', function(e){
    if($formUser.serialize()!=$formUser.data('serialize'))
     {    
          return true; 
     }
    else e=null; // i.e; if form state change show warning box, else don't show it.
});
 if($formUser.serialize()==$formUser.data('serialize'))
 {
 $(document).on("submit", "form", function(event){
                // disable unload warning
                $(window).off('beforeunload');
});
}
});