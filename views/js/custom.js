$(document).ready(function (){
    //$( "#sendFilm" ).hide();
    
    $("#add").click(function(){
    if (!$("#sendFilm").is(":visible")) {
      $( "#sendFilm" ).show(); 
    }else{
        $( "#sendFilm" ).hide();
    }
  });
    
});
