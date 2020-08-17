import 'scriptex-socials';
import 'html-head-component';

if ('serviceWorker' in navigator) {
	window.addEventListener('load', () => {
		navigator.serviceWorker.register('./service-worker.js');
	});
}
