$(document).ready(function(){
    // active thumbnail
    $("#thumbSlider .thumb").on("click", function(){
              $(this).addClass("active");
              $(this).siblings().removeClass("active");
          
          });
  })


