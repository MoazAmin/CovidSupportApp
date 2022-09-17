self.addEventListener('install', function(event) {
	caches.delete("v1fundamentals");
	caches.delete("v1pages");
    console.log("service worker installed")
    event.waitUntil(
        caches.open("v1" + 'fundamentals')
            .then(cache => cache.addAll(['','/','index.php']))
            .then(() => console.log("Worker: Install completed"))
    )
})

self.addEventListener('activate', evt => {
    console.log("service worker activated")
})

self.addEventListener("fetch", function(event) {
	console.log('WORKER: fetch event in progress.');
	if (event.request.method !== 'GET') {
		console.log('WORKER: fetch event ignored.', event.request.method, event.request.url);
		return;
	}
	event.respondWith(
		caches
			.match(event.request)
			.then(function(cached) {
				let networked = fetch(event.request)
					.then(fetchedFromNetwork, unableToResolve)
					.catch(unableToResolve);
				console.log('WORKER: fetch event', cached ? '(cached)' : '(network)', event.request.url);
				return cached || networked

				function fetchedFromNetwork(response) {
					let cacheCopy = response.clone();
					console.log('WORKER: fetch response from network.', event.request.url);
					caches
						.open("v1" + 'pages')
						.then(function add(cache) {
							cache.put(event.request, cacheCopy);
						})
						.then(function() {
							console.log('WORKER: fetch response stored in cache.', event.request.url);
						});

					return response;
				}
				function unableToResolve () {
					console.log('WORKER: fetch request failed in both cache and network.');
					return new Response('<h1>Service Unavailable</h1>', {
						status: 503,
						statusText: 'Service Unavailable',
						headers: new Headers({
							'Content-Type': 'text/html'
						})
					});
				}
			})
	);
});

self.addEventListener('activate', function(event) {
	console.log("clearing caches");
  	let cacheAllowlist = ["v1fundamentals"];

  	event.waitUntil(
    	caches.keys().then(function(cacheNames) {
			return Promise.all(
				cacheNames.map(function(cacheName) {
					if (!cacheAllowlist.includes(cacheName)) {
						return caches.delete(cacheName);
					}
				})
			);
    	})
  	);
});
