        // $('personal').click($('pp').hide());
      
        $(document).ready(function(){

            $("#post,#project,#user_m,#date_m").hide();    
            $("#user,#pro_m").show();
            });

            $("#users").click(function(){
                $("#post,#project,#user_m,#date_m").hide();
                $("#user,#pro_m").show();
            });
            $("#posts").click(function(){
            $("#user,#project,#post_m,#date_m").hide();
            $("#post,#user_m,#pro_m").show();
            });
        
            $("#projects").click(function(){
            $("#user,#post,#pro_m,#post_m,#mes_m").hide();
            $("#project,#user_m,#date_m").show();
            });

           

    


            