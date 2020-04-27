$(document).ready(function() {

	$("#form-1").submit(function() {
		$.ajax({
			type: "POST",
			url: "contact.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
			$("#form-1").trigger("reset");
		});
		return false;
	});
	
	$("#form-2").submit(function() {
		$.ajax({
			type: "POST",
			url: "brief-sites.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
			$("#form-2").trigger("reset");
		});
		return false;
	});
	
	$("#form-3").submit(function() {
		$.ajax({
			type: "POST",
			url: "brief-smm.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
			$("#form-2").trigger("reset");
		});
		return false;
	});
	
});