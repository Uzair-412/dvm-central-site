function myfunction() {
	let overviewContainer = document.querySelector('.overview-container'),
		deseasesContainer = document.querySelector('.deseases-container'),
		healthyContainer = document.querySelector('.healthy-container'),
		healthyPetContainer = document.querySelector('.healthyPet-container'),
		healthyBtn = document.querySelector('.healthy-btn'),
		resourcesContainer = document.querySelector('.resouces-container'),
		deseasesBtn = document.querySelector('.deseases-btn'),
		overviewBtn = document.querySelector('.overview-btn'),
		resourcesBtn = document.querySelector('.resources-btn');
	healthyPetBtn = document.querySelector('.healthyPet-btn');

	healthyBtn?.addEventListener('click', () => {
		overviewContainer.classList.add('hidden'),
			resourcesContainer.classList.add('hidden'),
			healthyPetContainer.classList.add('hidden'),
			deseasesContainer.classList.add('hidden'),
			healthyContainer.classList.remove('hidden'),
			document.querySelectorAll('.healthy-btn,.healthyPet-btn, .deseases-btn, .overview-btn, .resources-btn').forEach((btn) => {
				btn.querySelector('span:first-of-type').classList.remove('active');
			});
		healthyBtn.querySelector('span:first-of-type').classList.add('active');
	}),
		deseasesBtn?.addEventListener('click', () => {
			healthyContainer.classList.add('hidden'),
				overviewContainer.classList.add('hidden'),
				resourcesContainer.classList.add('hidden'),
				deseasesContainer.classList.remove('hidden'),
				healthyPetContainer.classList.add('hidden'),
				document.querySelectorAll('.healthy-btn,.healthyPet-btn, .deseases-btn, .overview-btn, .resources-btn').forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
			deseasesBtn.querySelector('span:first-of-type').classList.add('active');
		}),
		overviewBtn?.addEventListener('click', () => {
			overviewContainer.classList.remove('hidden'),
				deseasesContainer.classList.add('hidden'),
				healthyContainer.classList.add('hidden'),
				resourcesContainer.classList.add('hidden'),
				healthyPetContainer.classList.add('hidden'),
				document.querySelectorAll('.healthy-btn,.healthyPet-btn, .deseases-btn, .overview-btn, .resources-btn').forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
			overviewBtn.querySelector('span:first-of-type').classList.add('active');
		}),
		resourcesBtn?.addEventListener('click', () => {
			resourcesContainer.classList.remove('hidden'),
				overviewContainer.classList.add('hidden'),
				deseasesContainer.classList.add('hidden'),
				healthyContainer.classList.add('hidden'),
				healthyPetContainer.classList.add('hidden'),
				document.querySelectorAll('.healthy-btn,.healthyPet-btn, .deseases-btn, .overview-btn, .resources-btn').forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
			resourcesBtn.querySelector('span:first-of-type').classList.add('active');
		});

	healthyPetBtn?.addEventListener('click', () => {
		overviewContainer.classList.add('hidden'),
			resourcesContainer.classList.add('hidden'),
			healthyPetContainer.classList.remove('hidden'),
			deseasesContainer.classList.add('hidden'),
			healthyContainer.classList.add('hidden'),
			document.querySelectorAll('.healthy-btn,.healthyPet-btn, .deseases-btn, .overview-btn, .resources-btn').forEach((btn) => {
				btn.querySelector('span:first-of-type').classList.remove('active');
			});
		healthyPetBtn.querySelector('span:first-of-type').classList.add('active');
	});
}

myfunction();
