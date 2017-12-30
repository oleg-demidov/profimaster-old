jQuery(function ($) {

	var $form = $('.socialauth-settings form');

	$('.js-checkbox-enable-network').on('change', function () {
		var $this = $(this),
			$fieldset = $this.closest('fieldset'),
			$settings_area = $fieldset.find('.settings-area');

		if ($this.is(':checked') === true) {
			$settings_area.slideDown();
		} else {
			$settings_area.slideUp();
		}
	});

	$form.on('reset', function () {
		setTimeout(function () {
			$('.js-checkbox-enable-network').trigger('change');
		}, 100)
	});
});