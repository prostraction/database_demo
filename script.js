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
	$("#search_cpu").keyup(function() {
		display_item("#display_cpu", '#search_cpu', search_cpu);
	});
});
 
function fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}

function display_item(Display, Search, Data) {
         var PostedValue = $(Search).val();
         if (PostedValue === "") {
            $(Display).html("");
        }
        else {
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: {
                    Data: PostedValue
                },
                success: function(response) {
                    $(Display).html(response).show();
                }
            });
        }
    }