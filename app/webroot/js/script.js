$(document).ready(function (){
   $(document).delegate(".close","click",function (){
       $(this).parent("div.alert").fadeOut();
   }) 
});