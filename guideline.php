
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
		list-style-type: inherit;
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


<div class="modal">
	<article class="modal-container">
		<header class="modal-container-header">
			<h1 class="modal-container-title">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
					<path fill="none" d="M0 0h24v24H0z" />
					<path fill="currentColor" d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" />
				</svg>
				CLIENT'S GENERAL GUIDELINES
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

            <h1>For Venue Usage</h1>
			<h2>Vaping/Smoking o Vaping or Smoking</h2>
			<ol>
				<li>Vaping or Smoking is prohibited in our main hall - Joaquin's and Rica's Hall,
holding/preparation room, The Garden, the supplier's area, and restrooms.</li>
				<li>There is a designated area where suppliers or guests are allowed to smoke/vape.</li>
			</ol>

            <h2>Air conditioning</h2>
            <ol>
                <li>The air-conditioning units of our halls will be turned on thirty minutes before the booking
time unless advised by the management. They will be operated until the end of booking
time (as stated in the event contract). Corresponding charges shall apply if requested to be
turned on beyond the booking time period.</li>
                <li>The air conditioning units must not be blocked by any installations (eg: LED wall, ceiling
drapes, backdrop, or trussing) to avoid affecting the unit's temperature or cooling abilities.</li>
<li>Always keep the Hall doors closed at all times so as not to compromise the temperature
inside.</li>
<li>Siena's Events Place shall not be held liable if this guideline is not followed.</li>
<li>If the client does not wish to extend, air conditioning units will be turned off.</li>
            </ol>

            <h2>Electrical Use</h2>
            <ol>
                <li>The Suppliers are expected to provide electrical materials such as extension cords, and
chargers.</li>
            </ol>

            <h2>Additional Rental Hours</h2>
            <ol>
                <li>In the case of extended venue use for the halls or open patio (earlier or beyond the booking
time), corresponding charges for the additional hours shall apply.</li>
                <li><b>Joaquin's hall- Php 5,000 /hour</b></li>
                <li><b>Rica's hall - Php 4,000/ hour</b></li>
                <li><b>The Garden - Php 2,000/hour</b></li>
            </ol>

            <h2>Personnel Duties of Siena's Events Place</h2>
            <ol>
                <li>Our staff's responsibilities are the following:</li>
                <li>To man,tend, and operate the Air conditioning units</li>
                <li>General maintenance of the halls during the event but is not allowed to stay or standby.</li>
                <li>Parking attendants are designated at the parking area during the duration of the event.</li>
            </ol>

            <h2>Open Patio usage</h2>
            <ol>
                <li>Cocktail area</li>
                <li>Extension of Joaquin's Hall</li>
                <li>Supplier's Area: Photobooth/Photo Wall/Food carts etc.</li>
                <li>Registration Area</li>
            </ol>

            <h2>Staircase/Bar Area</h2>
            <ol>
                <li>The guests are allowed to use the staircase area for photoshoots and other similar purposes.</li>
                <li>The Bar area may be used by the caterer and is only for non-alcoholic beverages like juice
and water only. Corkages will apply for all alcoholic drinks brought in and consumed by the
client/supplier</li>
            </ol>

            <h2>Parking Area</h2>
            <ol>
                <li>Our parking area is spacious and can accommodate 30-40 vehicles. This area is to be used
by the clients and the guests for both Rica's Hall, Joaquins Hall, and The Garden. Siena's
Events Place shall not be held responsible for any loss or damage to any vehicle due to Acts
of God, fire, theft, breakage, or collision.</li>
            </ol>

            <h2>Holding Area/Preparation Room</h2>
            <ol>
                <li>The Holding Area/Preparation room is located on the second floor of Joaquin's Hall. This
room is strictly for the use of the client and their respective suppliers only. Guests are not
allowed to loiter on the second floor. The client is liable for any damages that may occur in
this area.</li>
            </ol>

            <h2>Corkages/Electrical Fees</h2>
            <ol>
                <h4><b>Corkages for Non-Accredited Suppliers:</b></h4>
                <li>Photo &Video - P10,000</li>
                <li>Caterer - P20,000 </li>
                <li>Coordinator - P5,000</li>
                <li>Photobooth - P3,000</li>
                <li>Mobile Bar - P5,000</li>
                <li>Grazing Table - P5,000</li>
                <li>FoodCart/BeverageCart - P3,000</li>
                <li>Ceiling Treatment (Full) - P10,000</li>
                <li>Ceiling Treatment (Partial) - P6,000</li>
                <li>Band - P 5,000</li>
                <li>LED Wall - P5,000</li>
                <li>LED Letter Lights - P500/Letter</li>
                <li>Event Stylst - P10,000</li>
                <li>Balloon Stylist - P10,000</li>
                <li>Coffee/Milktea Bar - P5,000</li>
                <li>Souvenir Bar - P3,000</li>
            </ol>

            <h2>Ingress/Egress Time</h2>
            <ol>
                <li>You are required to be aware of the agreed ingress time and are expected to arrive on time,
not earlier or late. Punctuality is always the key. In case of an early ingress, this should first be
approved by the Management of Siena and may include charges. Ingress time is 3 hours
before the event time, on the day of the event. Siena's Events Place accepts back-to-back
events, Given the time frame is manageable for both the venue and suppliers. In the case of
such, the latter event must have 3 hours of allotment time for ingress. The Suppliers are
required to inform the office that they are already within the premises.</li>
            </ol>

			
		</section>
		<footer class="modal-container-footer">
			
			<button class="button is-primary"><a href="content.php">Ok</button>
		</footer>
	</article>
</div>



<BR><BR><BR><BR>

</body>

</html>