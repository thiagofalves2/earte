$(document).ready(function(){
	var i=0;

	new dgCidadesEstados({
		cidade: document.getElementById('cidade'),
		estado: document.getElementById('estado'),
		change: true
	});
	
	$(".question").click(function (e) {
		$(this).toggleClass('qticked');
		if($(this).children('input').is(':checked')){
			$(this).children('input').removeAttr('checked');
		}else{
			$(this).children('input').attr('checked','checked');
		}
		e.preventDefault();
		return false;
	});
	
	$("input[value='licenciatura']").click(function(){
		$("label[for='arealicenS']").toggleClass('nodisplay');
	});
	$("input[value='outra']","#q2").click(function(){
		$("label[for='outraareaSA']").toggleClass('nodisplay');
	});
	$("input[value='outra']","#q4").click(function(){
		$("label[for='outraareaSB']").toggleClass('nodisplay');
	});
	
	$("input[value='escolar']","#q0").click(function(){
		if(!$("input[value='generica']:checked","#q0").length){
			$("#q1,#q2").toggle();
		}else{
			return false;
		}
	});
	$("input[value='naoescolar']","#q0").click(function(){
		if(!$("input[value='generica']:checked","#q0").length){
			if($("input[value='naoescolar']:checked,input[value='generica']:checked","#q0").length){
				$("#q4").show();
			}else{
				$("#q4").hide();
			}
			if($("input[value='naoescolar']:checked","#q0").length){
				$("#q3").show();
			}else{
				$("#q3").hide();
			}
		}else{
			return false;
		}
	});
	$("input[value='generica']").click(function(){
		if(!$("input[value='naoescolar']:checked,input[value='escolar']:checked","#q0").length){
			if($("input[value='naoescolar']:checked,input[value='generica']:checked","#q0").length){
				$("#q4").show();
			}else{
				$("#q4").hide();
			}
		}else{
			return false;
		}
	});
	
	$("input[value='regular']","#q1").click(function(){
		if($("input[value='regular']:checked","#q1").length){
			$("#q6").show();
		}else{
			$("#q6").hide();
		}
	});
	$("input[value='expandir']","#q4").click(function(){
		if($("input[value='expandir']:checked","#q4").length){
			$("#exp_area_conhecimento").show();
		}else{
			$("#exp_area_conhecimento").hide();
		}
	});

	$("select[name='outraareaSA']","#q2").change(function(){
		if ($("select[name='outraareaSA']").val() == 'new') {
			$("label[for='outraareaA']").removeClass('nodisplay');
		}else{
			$("label[for='outraareaA']").addClass('nodisplay');
		}
	});
	$("select[name='outraareaSB']","#q4").change(function(){
		if ($("select[name='outraareaSB']").val() == 'new') {
			$("label[for='outraareaB']").removeClass('nodisplay');
		}else{
			$("label[for='outraareaB']").addClass('nodisplay');
		}
	});
	$("select[name='arealicenS']","#q2").change(function(){
		if ($("select[name='arealicenS']").val() == 'new') {
			$("label[for='arealicen']").removeClass('nodisplay');
		}else{
			$("label[for='arealicen']").addClass('nodisplay');
		}
	});
	$("select[name='temaambS']").change(function(){
		if ($("select[name='temaambS']").val() == 'new') {
			$("label[for='temaamb']").removeClass('nodisplay');
		}else{
			$("label[for='temaamb']").addClass('nodisplay');
		}
	});
	$("select[name='naoescolarS']","#q3").change(function(){
		if ($("select[name='naoescolarS']").val() == 'new') {
			$("label[for='naoescolar']").removeClass('nodisplay');
		}else{
			$("label[for='naoescolar']").addClass('nodisplay');
		}
	});
	$("input[name='focotematico']").change(function(){
		if ($("input[name='focotematico']:checked").val() == 'outro') {
			$("label[for='outrofocoS']").removeClass('nodisplay');
		}else{
			$("label[for='outrofocoS']").addClass('nodisplay');
		}
	});
	$("select[name='outrofocoS']").change(function(){
		if ($("select[name='outrofocoS']").val() == 'new') {
			$("label[for='outrofoco']").removeClass('nodisplay');
		}else{
			$("label[for='outrofoco']").addClass('nodisplay');
		}
	});
});