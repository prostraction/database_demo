$(document).ready(function() {
	display_item("#test_ram", '#show_ram', "show_ram");
	$("#search_motherboard").keyup(function() {
		display_item("#display_motherboard", '#search_motherboard', "search_motherboard");
	});
	$("#search_cpu").keyup(function() {
		display_item("#display_cpu", '#search_cpu', "search_cpu");
	});
	$("#search_cpu_fan").keyup(function() {
		display_item("#display_cpu_fan", '#search_cpu_fan', "search_cpu_fan");
	});
	$("#search_ram").keyup(function() {
		display_item("#display_ram", '#search_ram', "search_ram");
		display_item("#test_ram", '#show_ram', "show_ram");
		// TO DO: copy to autoload
	});
});
 
function fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}

function fill_computer_ram(Key, ValueId, ValueName, Display, Search) {
	var PostedValue = $(ValueId).val();
	//$(Key).text(ValueName);
	$(Search).val('');
    $(Display).hide();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'insert_ram', argument_ram_id: ValueId}
        });
		//alert(ValueId);
		//alert(ValueName);
    }
	display_item("#test_ram", '#show_ram', "show_ram");
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