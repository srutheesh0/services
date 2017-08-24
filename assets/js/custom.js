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
       }else{
           err['username']=false;   
       }
       if(password==''){
           err['password']=true;  
       }else{
           err['password']=false;   
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
                console.log(response.Message);
                if(response.Message=="Success"){
                  
                    window.location= base_url + 'index.php/Login';
                 }
             }
         });
    
    }
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