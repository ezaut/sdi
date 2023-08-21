$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
    transitionEffectSpeed: 500,
	titleTemplate: '<span class="step">#index#</span> #title#',
	labels: {
		finish: "Enviar",
        next: "Próximo",
		previous: "Anterior",
	},

    onStepChanging: function (event, currentIndex, newIndex) {

        return true;
    },

	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');

	},

    onFinishing: function (event, currentIndex) {

        return true;

    },

	onFinished: function (event, currentIndex) {
        $('#form').submit();
    },
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
