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
	$("#search_ram").keyup(function() {
		display_item("#display_ram", '#search_ram', "search_ram");
	});
});
 
function fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}

function set_text(Key, Value) {
	$(Key).text(Value);
}

function aaa(Key, Value) {
	alert(Value);
}

function find_ram_id(Key, Value, Display, Search) {
    var PostedValue = $(Value).val();
	$(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'ram_id_find', argument_ram_id: Value}
        });
		alert("hello");
    }
}

function fill_ram_value(Value1, Value2) {
    var PostedValue = $(Value).val();
    if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'ram', argument1_ram: Value1, argument2_ram: Value2}
        });
    }
}

function fill_multiple(Key, Value, Display, Search) {
    $(Key).append("<a>"+Value+"</a>");
	$(Search).val('');
    $(Display).hide();
	var PostedValue = $(Value).val();
    if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'ram', argument_ram:'123'}
        });
    }
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