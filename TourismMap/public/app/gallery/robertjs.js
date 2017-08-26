$(document).ready(function() {
  console.log('Init Token',_token);
  var jsonForm={
      '_token':_token,
      'title':null,
      'description':null,
      'image':[],
  };
  var jsonFormImage=[];  

$( "#title" ).keyup(function( event ) {
  jsonForm.title=$(this).val();
  console.log(jsonForm);
});
$( "#description" ).keyup(function( event ) {
  jsonForm.description=$(this).val();
});
});