
$(document).ready(function () {


	$("button#sinup").click(function () {
		$("form#sighnin").hide(2500)
		$("form#sighnup").show(2500);
		$("form#sighnup").slideDown(200);
	})

	$("button#sininup").click(function () {
		$("form#sighnup").hide(2500);
		$("form#sighnin").slideDown(200);
	})
	$("button#sin").click(function(){
		$("#skills-modal").modal("show");
		
	})
})
