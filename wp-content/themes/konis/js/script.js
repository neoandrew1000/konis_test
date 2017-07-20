jQuery(function($) {


$('#mmenu').click(function(){
    $('#menu-menu').toggle();

});


$.mask.definitions['~']='[+-]';

$('#phone, #mod_phone, #uphone').mask('+7 (999) 999-99-99');

$('.lb_ul a').hover(function(){
  //if(animated){return false;}
  //animated = true; 
  heightBlock = $(this).children('span').height();
  //console.log(heightBlock);
  $(this).children('span').animate({height:341} ,400,function() {animated = false;});
},
function(){
  $(this).children('span').animate().stop();
  $(this).children('span').animate({height:117} ,400);
  
});

$('#phone').keyup(function(){
  //console.log('change');
  
  var phone = $(this).val();
  var chifru = phone.replace(/[^0-9]/gim,'');
  
  if(chifru.length==11)
  {
    $('.phone_submit').show();
  }
  else{
    $('.phone_submit').hide();
  }
    
  console.log(chifru.length);


});
  
  $('.menu > li').hover(function () {
     clearTimeout($.data(this,'timer'));
     $('ul',this).stop(true,true).slideDown(200);
     if($(this).hasClass('menu-item-has-children'))
     {
       $(this).addClass('border_bottom');
     }
     
  }, function () {
    $.data(this,'timer', setTimeout($.proxy(function() {
      $('ul',this).stop(true,true).slideUp(200);
      $(this).delay(200).removeClass('border_bottom');
    }, this), 100));
    //$(this).delay(200).removeClass('border_bottom');
  });
  
  $('.modal').click(function(){
    var id = $(this).attr('href');
    //console.log(id);
    $('.popup').removeClass('hide');
    $(id).removeClass('hide');
    return false;
  });
  
  $('.close').click(function(){
    $('.popup').addClass('hide');
    $('.thisform').addClass('hide');
  });
  
  $('.ajax').submit(function(){
    
    var error = false;
    
    var re = /^[\+][\d]{1}\ \([\d]{3}\)\ [\d]{3}-[\d]{2}-[\d]{2}$/;
    
    var formData = new FormData($(this).get(0)); 
    var form_id = '#'+$(this).attr('id');
    
    //console.log($(form_id).is(':has(.req_phone)'));
    
    if($(form_id).is(':has(.req_name)') && $(form_id+' .req_name').val() == '')
    {
      //console.log('error');
      $(form_id +' .req_name').addClass('error_field');
      error = true;
      setTimeout(function() { $(form_id+' .req_name').removeClass('error_field'); }, 2000);
    }
    
    if($(form_id).is(':has(.req_phone)'))
    {
      if(!re.test($(form_id+' .req_phone').val()))
      {
        console.log('error mask');
        $(form_id +' .req_phone').addClass('error_field');
        error = true;
        setTimeout(function() { $(form_id+' .req_phone').removeClass('error_field'); }, 2000);
      }
      
    }
    
    if($(form_id).is(':has(.req_email)') && $(form_id+' .req_email').val() == '')
    {
      //console.log('error');
      $(form_id +' .req_email').addClass('error_field');
      error = true;
      setTimeout(function() { $(form_id+' .req_email').removeClass('error_field'); }, 2000);
    }
    
    if($(form_id).is(':has(.req_mess)') && $(form_id+' .req_mess').val() == '')
    {
      //console.log('error');
      $(form_id +' .req_mess').addClass('error_field');
      error = true;
      setTimeout(function() { $(form_id+' .req_mess').removeClass('error_field'); }, 2000);
    }
    
    //error = true;
    if(!error)
    {
      $(form_id +' input[type=submit]').hide();
    
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        contentType: false, 
        processData: false, 
        data: formData,
        dataType: 'json',
        success: function(dat){
          //$('.loader').hide();
          
          //console.log(dat);
          
          if(dat.result == false)
          {
            
          }
          else
          {
             //console.log(dat);
            $(form_id+' input[type=text]').val('');
            $(form_id+' textarea').val('');
            
            if(form_id != '#phoneform')
            {
              $(form_id +' input[type=submit]').show();
            }
            else
            {
              $(form_id +' input[type=submit]').hide();
            }
            
            
            $(form_id+' .result').html(dat.text);
            //$('.result').removeClass('hide');
          }
          
          setTimeout(function() { $(form_id+' .result').html(''); }, 2000);
        }
      });
    }
    
    
    
    return false
    
  });

});