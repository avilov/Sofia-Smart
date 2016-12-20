$(document).ready(function(){
    // плавный скроллинг к якорям
    $("#main a, #back").click(function(event) {
        event.preventDefault();
        var id = $(this).attr('href'), top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
    });
   // открытие кадендаря
   $("open").click(function(){
       if($(this).hasClass('close')){
           $(this).removeClass('close');
           $('.nav-even').removeClass('open');
       }
       else{
         $(this).addClass('close');
         $('.nav-even').addClass('open');  
       }
   });

   $("#calendar li").click(function(){
       $('.dialog-menu').fadeIn(500);
   })
   $(".dialog-menu close").click(function(){
       $('.dialog-menu').fadeOut(500);
   })

   $('.prev-month').click(function(event){
    event.preventDefault();
    alert("click");
   });

   $('.next-month').click(function(event){
    event.preventDefault();
    alert("click");
   });

   // открытие события
   $(".description links").click(function(){
      var object = $(this).parent('div');
      var text = $(object).children('description').text();
      $('.window-history p').text(text);
      $('.window-history').fadeIn(500);
   });
   $(".window-history close").click(function(){
       $('.window-history').fadeOut(500);
   });
   
});
