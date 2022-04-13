$(document).ready(function() {
	display_item("#test_ram", '#show_ram', "show_ram");
	display_item("#test_gpu", '#show_gpu', "show_gpu");
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
	$("#sata_count").keyup(function() {
		//$(#sata_count).value = "42";
	});
	$("#search_gpu").keyup(function() {
		display_item("#display_gpu", '#search_gpu', "search_gpu");
		display_item("#test_gpu", '#show_gpu', "show_gpu");
	});
});
 
function fill(Key, Value, Display, Search) {
    $(Key).text(Value);
	$(Search).val('');
    $(Display).hide();
}

function fill_computer_ram(Key, ValueId, ValueName, Display, Search) {
	var PostedValue = $(ValueId).val();
	$(Search).val('');
    $(Display).hide();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'insert_ram', argument_ram_id: ValueId},
			success: function(response) {
                    display_item("#test_ram", '#show_ram', "show_ram");
            }
        });
    }
}

function delete_computer_ram(Key, ValueId) {
	var PostedValue = $(ValueId).val();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'delete_ram', argument_ram_id: ValueId},
			success: function(response) {
                    display_item("#test_ram", '#show_ram', "show_ram");
            }
        });
    }
}

function fill_computer_gpu(Key, ValueId, ValueName, Display, Search) {
	var PostedValue = $(ValueId).val();
	$(Search).val('');
    $(Display).hide();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'insert_gpu', argument_gpu_id: ValueId},
			success: function(response) {
                    display_item("#test_gpu", '#show_gpu', "show_gpu");
            }
        });
    }
}

function delete_computer_gpu(Key, ValueId) {
	var PostedValue = $(ValueId).val();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data:{action:'delete_gpu', argument_gpu_id: ValueId},
			success: function(response) {
                    display_item("#test_gpu", '#show_gpu', "show_gpu");
            }
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