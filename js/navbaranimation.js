function animateIn() {
	let masterTimeline = new TimelineMax();

	const t1 = new TimelineMax();

	t1Setup(t1);

	masterTimeline.add(t1);
}

function t1Setup(t1) {
	t1.set('.navbar__navigation', {
		opacity: 0
	})

		.set('.page-header', {
			backgroundColor: '#000'
		})

		.set('.dropdown', {
			opacity: 0
		})

		.set('#site-logo', {
			opacity: 0
		})

		.to('.navbar__inner--after', 0.6, {
			width: '100%',
			ease: Power1.easeInOut
		})

		.to('#site-logo', 0.6, {
			opacity: 1
		})

		.to(
			'.navbar__navigation',
			0.6,
			{
				opacity: 1
			},
			'-=0.6'
		)

		.to(
			'.navbar__upper',
			0.6,
			{
				opacity: 1
			},
			'-=0.6'
		)

		.to(
			'.dropdown',
			0.6,
			{
				opacity: 1
			},
			'-=0.6'
		);
}

jQuery(document).ready(() => {
	animateIn();
});
