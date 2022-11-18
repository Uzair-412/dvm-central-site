// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
	apiKey: "AIzaSyCrg0z7MjVTtbq4zIOjoVP5gkZeEkXpHvM",
	authDomain: "test-web-7db6d.firebaseapp.com",
	// databaseURL: 'db-url',
	projectId: "test-web-7db6d",
	storageBucket: "test-web-7db6d.appspot.com",
	messagingSenderId: "426077082662",
	appId: "1:426077082662:web:401e6fe74e780fd0dd02e7",
	measurementId: "G-VTB4409CTF"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
	console.log('Message received.', payload);
	const title = 'Hello world is awesome';
	const options = {
		body: 'Your notificaiton message .',
		icon: '/firebase-logo.png'
	};
	return self.registration.showNotification(title, options);
});