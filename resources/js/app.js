require('./bootstrap');
require('alpinejs');
window.onload = () => {
	'use strict';
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker
		.register('./sw.js');
	}
}