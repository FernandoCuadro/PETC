$(function(){
  var flag=0;
  
  $('.share').on('click',function(){
   if(flag == 0)
    {
      $(this).siblings('.one').animate({
      bottom:'260px',
      right:'-10px',
    },200);
    
     $(this).siblings('.two').delay(200).animate({
      bottom:'180px',
      right:'70px'
    },200);
    
     $(this).siblings('.three').delay(300).animate({
      bottom:'100px',
      right:'-10px'
    },200);
              
    $('.one i,.two i, .three i').delay(500).fadeIn(200);  
      flag = 1;
    }
    
    
  else{
    $('.one, .two, .three').animate({
        bottom:'180px',
        right:'-10px'
      },400);
      
  $('.one i,.two i, .three i').delay(500).fadeOut(200);
      flag = 0;
    }
  });
});
