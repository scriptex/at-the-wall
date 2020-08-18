const CACHE_NAME = 'at-the-wall-cache ' + new Date().getTime();
const urlsToCache = [
	'./manifest.json',
	'./index.html',
	'./at-the-wall.appcache',
	'./service-worker.js',
	'./assets/dist/app.css',
	'./config.xml',
	'./icons/icon-72x72.png',
	'./icons/icon-96x96.png',
	'./icons/icon-128x128.png',
	'./icons/icon-144x144.png',
	'./icons/icon-152x152.png',
	'./icons/icon-192x192.png',
	'./icons/icon-384x384.png',
	'./icons/icon-512x512.png',
	'./launch-screens/launch-screen-2048x2732.png',
	'./launch-screens/launch-screen-2732x2048.png',
	'./launch-screens/launch-screen-1668x2388.png',
	'./launch-screens/launch-screen-2388x1668.png',
	'./launch-screens/launch-screen-1668x2224.png',
	'./launch-screens/launch-screen-2224x1668.png',
	'./launch-screens/launch-screen-1536x2048.png',
	'./launch-screens/launch-screen-2048x1536.png',
	'./launch-screens/launch-screen-1242x2688.png',
	'./launch-screens/launch-screen-2688x1242.png',
	'./launch-screens/launch-screen-1125x2436.png',
	'./launch-screens/launch-screen-2436x1125.png',
	'./launch-screens/launch-screen-828x1792.png',
	'./launch-screens/launch-screen-1792x828.png',
	'./launch-screens/launch-screen-1242x2208.png',
	'./launch-screens/launch-screen-2208x1242.png',
	'./launch-screens/launch-screen-750x1334.png',
	'./launch-screens/launch-screen-1334x750.png',
	'./launch-screens/launch-screen-640x1136.png',
	'./launch-screens/launch-screen-1136x640.png',
	'./favicons/apple-touch-icon-57x57.png',
	'./favicons/apple-touch-icon-60x60.png',
	'./favicons/apple-touch-icon-72x72.png',
	'./favicons/apple-touch-icon-76x76.png',
	'./favicons/apple-touch-icon-114x114.png',
	'./favicons/apple-touch-icon-120x120.png',
	'./favicons/apple-touch-icon-144x144.png',
	'./favicons/apple-touch-icon-152x152.png',
	'./favicons/favicon-16x16.png',
	'./favicons/favicon-32x32.png',
	'./favicons/favicon-96x96.png',
	'./favicons/favicon-128x128.png',
	'./favicons/favicon-196x196.png',
	'./favicons/ms-tile-70x70.png',
	'./favicons/ms-tile-144x144.png',
	'./favicons/ms-tile-150x150.png',
	'./favicons/ms-tile-310x150.png',
	'./favicons/ms-tile-310x310.png',
	'./favicons/favicon.ico'
];

self.addEventListener('install', event => {
	self.skipWaiting();

	event.waitUntil(caches.open(CACHE_NAME).then(cache => cache.addAll(urlsToCache)));
});

self.addEventListener('fetch', event => {
	event.respondWith(
		caches.match(event.request).then(response => {
			if (response) {
				return response;
			}

			const fetchRequest = event.request.clone();

			return fetch(fetchRequest).then(response => {
				if (!response || response.status !== 200 || response.type !== 'basic') {
					return response;
				}

				const responseToCache = response.clone();

				event.waitUntil(
					caches.open(CACHE_NAME).then(cache => {
						cache.put(event.request, responseToCache);
					})
				);

				return response;
			});
		})
	);
});

self.addEventListener('activate', event => {
	console.log(event);
	event.waitUntil(
		caches
			.keys()
			.then(cacheNames =>
				Promise.all(
					cacheNames.filter(cacheName => cacheName !== CACHE_NAME).map(cacheName => caches.delete(cacheName))
				)
			)
	);
});
