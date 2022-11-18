let profile = document.querySelector('.profile-container'),
	updateInfo = document.querySelector('.update-info-container'),
	changePw = document.querySelector('.change-pw-container'),
	editProfileBtn = document.querySelector('button.edit-profile'),
	twoFactorCont = document.querySelector('.tow-factor-container'),
	pwBtn = document.querySelector('.user-pw'),
	profileBtn = document.querySelector('.user-profile'),
	twoFactorBtn = document.querySelector('.two-factor-btn');
	closeProfileBtn = document.querySelector('.close-profile-btn');

editProfileBtn.addEventListener('click', () => {
	profile.classList.add('hidden'),
		twoFactorCont.classList.add('hidden'),
		updateInfo.classList.remove('hidden'),
		changePw.classList.add('hidden'),
		document
			.querySelectorAll('.user-pw, .user-profile, .two-factor-btn')
			.forEach((btn) => {
				btn.querySelector('span:first-of-type').classList.remove('active');
			});
		profileBtn.querySelector('span:first-of-type').classList.add('active');	
}),
	closeProfileBtn.addEventListener('click', () => {
		profile.classList.remove('hidden'),
			twoFactorCont.classList.add('hidden'),
			updateInfo.classList.add('hidden'),
			changePw.classList.add('hidden'),
			document
				.querySelectorAll('.user-pw, .user-profile, .two-factor-btn')
				.forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
	}),
	pwBtn.addEventListener('click', () => {
		changePw.classList.remove('hidden'),
			profile.classList.add('hidden'),
			twoFactorCont.classList.add('hidden'),
			updateInfo.classList.add('hidden'),
			document
				.querySelectorAll('.user-pw, .user-profile, .two-factor-btn')
				.forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
		pwBtn.querySelector('span:first-of-type').classList.add('active');
	}),
	profileBtn.addEventListener('click', () => {
		profile.classList.remove('hidden'),
			updateInfo.classList.add('hidden'),
			changePw.classList.add('hidden'),
			twoFactorCont.classList.add('hidden'),
			document
				.querySelectorAll('.user-pw, .user-profile, .two-factor-btn')
				.forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
		profileBtn.querySelector('span:first-of-type').classList.add('active');
	}),
	twoFactorBtn.addEventListener('click', () => {
		twoFactorCont.classList.remove('hidden'),
			profile.classList.add('hidden'),
			updateInfo.classList.add('hidden'),
			changePw.classList.add('hidden'),
			document
				.querySelectorAll('.user-pw, .user-profile, .two-factor-btn')
				.forEach((btn) => {
					btn.querySelector('span:first-of-type').classList.remove('active');
				});
		twoFactorBtn.querySelector('span:first-of-type').classList.add('active');
	});
