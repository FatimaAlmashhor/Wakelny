        // $('personal').click($('pp').hide());
        $(document).ready(function(){

            $("#wrk,#skil,#Edu,#expe,#curs,#Edpers").hide();
    
            
            });
    
            $("#personal").click(function(){
            $("#wrk,#skil,#Edu,#expe,#curs,#Edpers").hide();
            $("#perso").show();
    
    
    
            });
    
    
            $("#Edit").click(function(){
            $("#wrk,#skil,#Edu,#expe,#curs,#Edpers,#perso").hide();
            $("#Edpers").show();
            });
    
            $("#saveEd").click(function(){
            $("#wrk,#skil,#Edu,#expe,#curs,#Edpers,#Edpers").hide();
            $("#perso").show();
            });
    
            $("#skills").click(function(){
            $("#wrk,#perso,#Edu,#expe,#curs,#Edpers").hide();
            $("#skil").show();
    
    
            });
    
            $("#skill").click(function(){
            $("#wrk,#perso,#Edu,#skil,#curs,#Edpers").hide();
            $("#expe").show();
    
    
            });
    
            $("#note").click(function(){
            $("#wrk,#perso,#expe,#skil,#curs,#Edpers").hide();
            $("#Edu").show();
    
    
            });
    
            $("#courses").click(function(){
            $("#wrk,#perso,#expe,#skil,#Edu,#Edpers").hide();
            $("#curs").show();
            
            });


            