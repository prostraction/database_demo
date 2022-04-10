$(document).ready(fanction() {
    $("#search_motherboard").keyup(fanction() {
		display_item("#display_motherboard", '#search_motherboard', "search_motherboard");
    });
	$("#search_cpu").keyup(fanction() {
		display_item("#display_cpu", '#search_cpu', "search_cpu");
	});
	$("#search_cpu_fan").keyup(fanction() {
		display_item("#display_cpu_fan", '#search_cpu_fan', "search_cpu_fan");
	});
});
 
fanction fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}

fanction display_item(Display, Search, Search_Object) {
        var PostedValue = $(Search).val();
        if (PostedValue === "") {
            $(Display).html("");
        }
        else {
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: Search_Object+'='+PostedValue,
                success: fanction(response) {
                    $(Display).html(response).show();
                }
            });
        }
    }