//Adiciona um delay de 1s pra qualquer envio de formulario e previne que um clicke duplo faça o envio de um formulario duas vezes!!!
function submitNoDouble(button){
	button.one('click', function(e){
		e.preventDefault();
		button.addClass('disabled');
		button.append(' <i class="fa fa-circle-o-notch fa-spin"></i>');
		var form = $('form');

		setTimeout(function(){
			button.removeClass('disabled');
			button.remove('i');
			form.submit();
		}, 1000);
	});
}

$(function(){
	$('.money').mask('000.000.000.000.000,00', {reverse: true});
	
	submitNoDouble($('form').find('button'));

});

