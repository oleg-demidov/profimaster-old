jQuery(function ($) {

	var $btn_auth_vk = $('a.js-auth-vk');

	$btn_auth_vk.on('click', function () {
		if (vk_app_id.length <= 0) {
			console.error('Не указано ID приложения вконтакте.');
		} else {
			var url = 'https://oauth.vk.com/authorize?client_id=' + vk_app_id
				+ '&scope=notify&redirect_uri=' + vk_redirect + '&response_type=code';

			window.open(url, 'vk-auth-popup', 'width=600,height=300');
		}

		return false;
	});
});