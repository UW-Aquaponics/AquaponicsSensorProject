setInterval(function(){attemptInsert();}, 5000);

function attemptInsert()
{
    
    document.write("test");
    
    $.ajax({
               
        type: "GET",
        url: "insert.php",
        data: {check: "1"},
        cache: false,
        
        success: function(){
           alert("Success!");
        }
    
}); 

}





