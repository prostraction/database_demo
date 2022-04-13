$(document).ready(function() {
	display_item("#test_ram", '#show_ram', "show_ram");
	display_item("#test_gpu", '#show_gpu', "show_gpu");
	display_item("#value_motherboard", '#show_motherboard', "show_motherboard");
	
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
		//display_item("#test_ram", '#show_ram', "show_ram");
	});
	$("#sata_count").keyup(function() {
		//$(#sata_count).value = "42";
	});
	$("#search_gpu").keyup(function() {
		display_item("#display_gpu", '#search_gpu', "search_gpu");
		//display_item("#test_gpu", '#show_gpu', "show_gpu");
	});
	$("#search_psu").keyup(function() {
		display_item("#display_psu", '#search_psu', "search_psu");
	});
	$("#search_pc_case").keyup(function() {
		display_item("#display_pc_case", '#search_pc_case', "search_pc_case");
	});
});
 
function fill(Key, Value, Display, Search, Action, ShowAction) {
    //$(Key).text(Value); //////////////////////////////
	$(Search).val('');
    $(Display).hide();
	update_item(Action, Value, Display, Action, Action);
	display_item2(Key, ShowAction);
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

function update_item(Action, ValueId, Display1, Display2, Display3) {
	var PostedValue = $(ValueId).val();
	if (PostedValue !== "") {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: Action+'='+ValueId,
			success: function(response) {
                    display_item(Display1, Display2, Display3);
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

function display_item2(Display, Search_Object) {
	$.ajax({
            type: "POST",
            url: "handler.php",
            data: {action: Search_Object},
            success: function(response) {
				$(Display).html(response).show();
        }
    });
}