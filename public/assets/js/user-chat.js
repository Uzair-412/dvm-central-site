let msgsContainer = document.querySelector('.chat-msgs-container'),
	msgsContainerbd = document.querySelector('.chat-msgs-container-bd'),
	chatPersons = document.querySelectorAll('.chat-with-wrapper'),
	chatClsBtn = document.querySelector('.chat-close-btn');

chatPersons.forEach((person) => {
	person.addEventListener('click', () => {
		msgsContainer.classList.add('show-msg-container');
	});
});

chatClsBtn?.addEventListener('click', () => {
	msgsContainer.classList.remove('show-msg-container');
});
