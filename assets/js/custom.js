var Pagehandler = function(){
    
     var loginhandler = function(){
     var err =[];
     var regex1 = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
$('body').on('click', '.login', function() {
    
    // Write your custom Javascript codes here...
       //var base_url=
       var username= $('.username').val();
       var password= $('.password').val();
       if(username==''){
           err['username']=true;  
           $( ".username" ).addClass( "errorinput" );
           $('.erroruser').text("please enter your username");
           $('.erroruser').show();   
       }else{
           err['username']=false;  
           $('.erroruser').hide();   
       }
       if(password==''){
           err['password']=true; 
            $( ".password" ).addClass( "errorinput" );
             $('.errorpass').text("please enter your password");
             $('.errorpass').show();   
       }else{
           err['password']=false; 
            $('.errorpass').hide();  
       }
       
       if((err['username']==false)&&(err['password'] == false)){
       
         $.ajax({
             url: base_url + 'index.php/Login/user_login_process',
             type: "POST",
             async: false,
             dataType: "json",
             data: {username:username,password:password},
             success: function(response){
                console.log(response.Message);
                if(response.Message=="Success"){
                   
                    window.location= base_url + 'index.php/Login/admin_home';
                 }
                  else
                 {
            
                  $('.errormessage').text("Invalid username and password");
                 }
             }
         });
     }
   
});
$('body').on('click', 'li[data-logout="true"]', function() {
   
    var logout_err =[];
    var log = '';
   
   if($('body').find('.logout-class')){
       logout_err['log']=true;
        var test = $('body').find('.logout-class').data('log');

   if(test=='test'){
      
        $.ajax({
             url: base_url + 'index.php/Login/logout',
             type: "POST",
             async: false,
             dataType: "json",
             data: {logout_err:logout_err,test:test},
             success: function(response){
                //console.log(response.Message);
                if(response.Message=="Success"){
                  
                    window.location= base_url + 'index.php/Login';
                 }
                
             }
         });
    
    }
       }
});
$('body').on('click', '.forgot', function() {
   $('body').find('.login-box').addClass('hidden');
   $('body').find('.forgot-box').removeClass('hidden');
   
});
//alert("a");
$('body').on('click', '.reset_password', function() {
  //alert("b");
   var emailId=$('.email-p').val(); 
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
   if(emailId=='' ){

           err['email-p']=true;  
           $( ".email-p" ).addClass( "errorinput" );
           $('.errorreset').text("please enter your emailId");
           $('.errorreset').show();   
       }else if(!mailformat.test(emailId))
       {
         err['email-p']=true;  
         //  $( ".email-p" ).addClass( "errorinput" );
           $('.errorreset').text("please enter a valid emailId");
           $('.errorreset').show();   
          
           }  
           else
           {
       
 err['email-p']=false;  
           $('.errorreset').hide();


//if(inputText.value.match(mailformat))
       
   $.ajax({
             url: base_url + 'index.php/Login/forgot',
             type: "POST",
             async: false,
             dataType: "json",
             data: {useremail:emailId},
             success: function(response){
                console.log(response.Message);
                if(response.Message=="Success"){
                  window.location= base_url + 'index.php/Login';
                   
                 }
                 else
                 {
            
                  $('.errorreset').text("Invalid emailId");
                 }
             }
         });
 }
    
});
}
return{
    init:function(){
        
    },
    loginpage:function(){
       loginhandler(); 
    }
}
}(jQuery)