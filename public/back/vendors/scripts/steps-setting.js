$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> #title#',
	labels: {
		finish: "Enviar",
        next: "Próximo",
		previous: "Anterior",
	},
	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');

	},
	onFinished: function (event, currentIndex) {
        $("#form").submit();
        $('#success-modal').modal('show');
        $('#fail-modal').modal('show');


	}
});

$(".tab-wizard2").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
	labels: {
		finish: "Enviar",
		next: "Próximo",
		previous: "Anterior",
	},
	onStepChanged: function(event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');

	},
	onFinished: function(event, currentIndex) {
		$('#success-modal-btn').trigger('click');
	}
});
