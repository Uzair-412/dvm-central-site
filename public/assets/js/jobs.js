let jobAccordionOpener = document.querySelectorAll('.j-accordion-wrapper');

jobAccordionOpener.forEach((acc) => {
	acc.querySelector('.filter-open').addEventListener('click', () => {
		if (!acc.classList.contains('active')) {
			acc.classList.add('active');
			console.log('height', acc?.querySelector('.filter-hider')?.style.maxHeight);
			console.log('scroll height', acc.querySelector('.filter-hider')?.scrollHeight);
			if (acc?.querySelector('.filter-hider')?.style.maxHeight !== undefined && acc.querySelector('.filter-hider')?.scrollHeight !== undefined) {
				acc.querySelector('.filter-hider').style.maxHeight = acc.querySelector('.filter-hider').scrollHeight + 'px';
			}
			acc.querySelector('.filter-open-icon').classList.add('icon-rotated');
			acc.querySelector('.filter-open-icon').style.transform = 'rotate(180deg)';
		} else {
			acc.classList.remove('active');
			acc.querySelector('.filter-hider').style.maxHeight = null;
			acc.querySelector('.filter-open-icon').classList.remove('icon-rotated');
			acc.querySelector('.filter-open-icon').style.transform = 'rotate(0)';
		}
	});
});

// range slider
function range() {
	let minVal = Number(document.querySelector('#min_price').value);
	let maxVal = Number(document.querySelector('#max_price').value);
	return {
		minprice: minVal,
		maxprice: maxVal,
		min: minVal,
		max: maxVal,
		minthumb: 0,
		maxthumb: 0,
		mintrigger() {
			this.validation();
			this.minprice = Math.min(this.minprice, this.maxprice - 500);
			this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
			livewire.emit('updatedMaxPrice', this.maxprice);
			livewire.emit('updatedMinPrice', this.minprice);
		},
		maxtrigger() {
			this.validation();
			this.maxprice = Math.max(this.maxprice, this.minprice + 200);
			this.maxthumb = 100 - ((this.maxprice - this.min) / (this.max - this.min)) * 100;
			livewire.emit('updatedMaxPrice', this.maxprice);
			livewire.emit('updatedMinPrice', this.minprice);
		},
		validation() {
			if (/^\d*$/.test(this.minprice)) {
				if (this.minprice > this.max) {
					this.minprice = 9500;
				}
				if (this.minprice < this.min) {
					this.minprice = this.min;
				}
			} else {
				this.minprice = minVal;
			}
			if (/^\d*$/.test(this.maxprice)) {
				if (this.maxprice > this.max) {
					this.maxprice = this.max;
				}
				if (this.maxprice < this.min) {
					this.maxprice = 200;
				}
			} else {
				this.maxprice = maxVal;
			}
			livewire.emit('updatedMaxPrice', this.maxprice);
			livewire.emit('updatedMinPrice', this.minprice);
		}
	};
}
