$(document).ready(function() {
    $("#search_motherboard").keyup(function() {
         var PostedValue = $('#search_motherboard').val();
         if (PostedValue === "") {
            $("#display_motherboard").html("");
        }
        else {
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: {
                    search_motherboard: PostedValue
                },
                success: function(response) {
                    $("#display_motherboard").html(response).show();
                }
            });
 
        }
 
    });
 
});
 
function fill(Value) {
	$('#value_motherboard').empty();
    $('#value_motherboard').append(Value);
    $('#display_motherboard').hide();
}