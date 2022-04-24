        // $('personal').click($('pp').hide());
        $(document).ready(function(){

            $("#wrk,#skil,#Edu,#curs,#Edpers").hide();
    
            
            });
    
            $("#personal").click(function(){
            $("#wrk,#skil,#Edu,#curs,#Edpers").hide();
            $("#perso").show();
    
    
    
            });
    
    
            $("#Edit").click(function(){
            $("#wrk,#skil,#Edu,#curs,#Edpers,#perso").hide();
            $("#Edpers").show();
            });
    
            $("#saveEd").click(function(){
            $("#wrk,#skil,#Edu,#curs,#Edpers,#Edpers").hide();
            $("#perso").show();
            });
    
            $("#skills").click(function(){
            $("#wrk,#perso,#Edu,#curs,#Edpers").hide();
            $("#skil").show();
    
    
            });
    
            $("#skill").click(function(){
            $("#wrk,#perso,#Edu,#skil,#curs,#Edpers").hide();
            $("#expe").show();
    
    
            });
    
            $("#note").click(function(){
            $("#wrk,#perso,#skil,#curs,#Edpers").hide();
            $("#Edu").show();
    
    
            });
    
            $("#courses").click(function(){
            $("#wrk,#perso,#skil,#Edu,#Edpers").hide();
            $("#curs").show();
            
            });


            