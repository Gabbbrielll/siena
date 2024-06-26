
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
	background-size: cover;
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
		list-style-type: inherit;;
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


<div class="modal">
	<article class="modal-container">
		<header class="modal-container-header">
			<h1 class="modal-container-title">
				Payment Terms
			</h1>
		</header>
		<section class="modal-container-body rtf">
			<h2>INITIAL DOWNPAYMENT: P10,000 (Security Deposit)</h2>
			<ol>
                <li>Payable upon booking/reservation</li>
                <li>The initial down payment of P10,000 will be considered as a security deposit.</li>
                <li>The security deposit will be refunded via cheque within 3-5 working days after the event.</li>
			</ol>
            <h2>PARTIAL DOWNPAYMENT: P10,000 (Non-Refundable)</h2>
			<ol>
                <li>The payment will be due within 3-5 working days after making the reservation.</li>
			</ol>
            <h2>FULL PAYMENT (Non-Refundable)</h2>
			<ol>
                <li>Payment is due 60 days prior the event date.</li>
			</ol>
            <br>

			<ol>
                <li style="list-style-type: upper-roman">Failure to comply with the payment terms shall cause the automatic cancellation of the client's booking and the full forfeiture of all the payment made, no refunds.</li>
                <li style="list-style-type: upper-roman">All payment are non-refundable, non-transferable (to another date/client/other services) & non-consumable.</li>
			</ol>
            <br>
            <center>
            <h2>NO PENCIL BOOKING. FIRST COME, FIRST SERVE</h2>
            <h4>NO FULL PAYMENT, NO SET-UP</h4> 
            </center>
			
		</section>
		<footer class="modal-container-footer">
			<button class="button is-primary"><a href="content.php">Ok</button>
		</footer>
	</article>
</div>



<BR><BR><BR><BR>

</body>

</html>