$(document).ready(function() {
	$("#search_motherboard").keyup(function() {
		display_item("#display_motherboard", '#search_motherboard', "search_motherboard");
	});
	$("#search_cpu").keyup(function() {
		display_item("#display_cpu", '#search_cpu', "search_cpu");
	});
	$("#search_cpu_fan").keyup(function() {
		display_item("#display_cpu_fan", '#search_cpu_fan', "search_cpu_fan");
	});
});
 
function fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}

function display_item(Display, Search, Search_Object) {
        var PostedValue = $(Search).val();
        if (PostedValue === "") {
            $(Display).html("");
        }
        else {
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: Search_Object+'='+PostedValue,
                success: function(response) {
                    $(Display).html(response).show();
                }
            });
        }
}