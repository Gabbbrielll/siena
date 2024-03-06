
<!DOCTYPE html>
<br lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siena's Events Place</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
  

  <style>
@import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*,
*:before,
*:after {
	box-sizing: border-box;
}


body {
	line-height: 1.5;
	min-height: 100vh;
	font-family: 'Poppins', sans-serif;
	color: #50262f;
	background: url("bg.jpg");
	position: relative;
}

button,
input,
select,
textarea {
	font: inherit;
}

a {
	color: inherit;
    text-decoration: none;
}

/* End basic CSS override */

* {
	scrollbar-width: 0;
}

*::-webkit-scrollbar {
	background-color: transparent;
	width: 12px;
}

*::-webkit-scrollbar-thumb {
	border-radius: 99px;
	background-color: #ddd;
	border: 4px solid #fff;
}

.modal {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: rgba(#000, 0.25);
}

.modal-container {
	max-height: 90vh;
	max-width: 500px;
	margin-left: auto;
	margin-right: auto;
	background-color: #fff;
	border-radius: 16px;
	overflow: hidden;
	display: flex;
	flex-direction: column;
	box-shadow: 0 15px 30px 0 rgba(#000, 0.25);
	@media (max-width: 600px) {
		width: 90%;
	}
}

.modal-container-header {
	padding: 16px 32px;
	border-bottom: 1px solid #ddd;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.modal-container-title {
	display: flex;
	align-items: center;
	gap: 8px;
	line-height: 1;
	font-weight: 700;
	font-size: 1.125;
	svg {
		width: 32px;
		height: 32px;
		color: #750550;
	}
}

.modal-container-body {
	padding: 24px 32px 51px;
	overflow-y: auto;
}

.rtf {
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-weight: 700;
	}

	h1 {
		font-size: 1.5rem;
		line-height: 1.125;
	}

	h2 {
		font-size: 1.25rem;
		line-height: 1.25;
	}

	h3 {
		font-size: 1rem;
		line-height: 1.5;
	}

	& > * + * {
		margin-top: 1em;
	}

	& > * + :is(h1, h2, h3) {
		margin-top: 2em;
	}

	& > :is(h1, h2, h3) + * {
		margin-top: 0.75em;
	}

	ul,
	ol {
		margin-left: 20px;
		list-style-position: inside;
	}

	ol {
		list-style-type: inherit;
	}

	ul {
		list-style: disc;
	}
}

.modal-container-footer {
	padding: 20px 32px;
	display: flex;
	align-items: center;
	justify-content: flex-end;
	border-top: 1px solid #ddd;
	gap: 12px;
	position: relative;
	&:after {
		content: "";
		display: block;
		position: absolute;
		top: -51px;
		left: 24px;
		right: 24px;
		height: 50px;
		flex-shrink: 0;
		background-image: linear-gradient(to top, rgba(#fff, 0.75), transparent);
		pointer-events: none;
	}
}

.button {
	padding: 12px 20px;
	border-radius: 8px;
	background-color: transparent;
	border: 0;
	font-weight: 600;
	cursor: pointer;
	transition: 0.15s ease;

	&.is-ghost {
		&:hover,
		&:focus {
			background-color: #dfdad7;
		}
	}

	&.is-primary {
		background-color: #750550;
		color: #fff;
		&:hover,
		&:focus {
			background-color: #4a0433;
		}
	}
}

.icon-button {
	padding: 0;
	border: 0;
	background-color: transparent;
	width: 40px;
	height: 40px;
	display: flex;
	align-items: center;
	justify-content: center;
	line-height: 1;
	cursor: pointer;
	border-radius: 8px;
	transition: 0.15s ease;
	svg {
		width: 24px;
		height: 24px;
	}

	&:hover,
	&:focus {
		background-color: #dfdad7;
	}
}

    </style>
</head>
<script>
function goBack() {
  window.history.back();
}
</script>

<div class="modal">
	<article class="modal-container">
		<header class="modal-container-header">
			<h1 class="modal-container-title">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
					<path fill="none" d="M0 0h24v24H0z" />
					<path fill="currentColor" d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" />
				</svg>
				Terms & Conditions
			</h1>
			<button class="icon-button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
					<path fill="none" d="M0 0h24v24H0z" />
                    <a href="content.php">
					<path fill="currentColor" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
				</svg>
			</button>
		</header>
		<section class="modal-container-body rtf">
			<h2>Payment (Downpayment)</h2>

			<p>Reservation fee of PHP10,000 upon confirmation (non- consumable, non-transferable and non-refundable). This will serve as security deposit which is subject for refund three (3) working days after the event date. 50% downpayment upon signing of contract two (2) months prior to event date. Full payment is due two (2) weeks before the event. </p>

			
			<ol>
				<li>Rates are subject to change without prior notice</li>
				<li>Venue capacity may adjust depending on the LGU guidelines</li>
			</ol>

			
		</section>
		<footer class="modal-container-footer">
			<button class="button is-ghost"><a href="content.php">Decline</button>
			<button class="button is-primary" onclick="goBack()">Accept</button>
		</footer>
	</article>
</div>



<BR><BR><BR><BR>

</body>

</html>