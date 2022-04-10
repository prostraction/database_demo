$(document).ready(function() {
    $("#search_motherboard").keyup(function() {
         var name = $('#search_motherboard').val();
         if (name === "") {
            $("#display_motherboard").html("");
        }
        else {
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: {
                    search_motherboard: name
                },
                success: function(response) {
                    $("#display_motherboard").html(response).show();
                }
            });
 
        }
 
    });
 
});
 
function fill(Value) {
    $('#search_motherboard').val(Value);
    $('#display_motherboard').hide();
}