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
 
function fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}