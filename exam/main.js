$(function(){
    //USER Registration
    $("#regSubmit").click(function(){
        var name      = $("#name").val();
        var password  = $("#password").val();
        var email     = $("#email").val();
        var dataString= 'name=' + name + '&password=' + password + '&email=' + email;
        $.ajax({
            type: "POST",
            url : "getregister.php",
            data: dataString,
            success: function(data){
                if($.trim(data) == "empty"){
                    $(".empty").show();
                    setTimeout(function(){
                        $(".empty").hide();
                   }, 3000);
                }else if($.trim(data) == "validemail"){
                    $(".validemail").show();
                    setTimeout(function(){
                        $(".validemail").hide();
                   }, 3000);
                    
                }else if($.trim(data) == "exists"){
                    $(".exists").show();
                    setTimeout(function(){
                        $(".exists").hide();
                   }, 3000);
                }else if($.trim(data) == "success"){
                    $(".success").show();
                    setTimeout(function(){
                        $(".success").hide();
                   }, 3000);
                }
                else{
                    $(".failed").show();
                    setTimeout(function(){
                        $(".failed").hide();
                   }, 3000);
                }
            }
            
        });
        return false;
    });

        //USER Login
        $("#loginsubmit").click(function(){
            var email     = $("#email").val();
            var password  = $("#password").val();
            
            var dataString= '&email=' + email + '&password=' + password;
            $.ajax({
                type: "POST",
                url : "getlogin.php",
                data: dataString,
                success: function(data){
                    if($.trim(data) == "empty"){
                        $(".empty").show();
                        setTimeout(function(){
                            $(".empty").hide();
                       }, 3000);
                    }else if($.trim(data) == "disable"){
                        $(".disable").show();
                        setTimeout(function(){
                            $(".disable").hide();
                       }, 3000);
                    }else if($.trim(data) == "error"){
                        $(".error").show(); 
                        setTimeout(function(){
                            $(".error").hide();
                       }, 3000);    
                    }else{
                        window.location = "exam.php";
                    }
                }
                
            });
            return false;
        });
});
