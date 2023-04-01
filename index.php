<!DOCTYPE html>
<html>
<head>
	<title>Tours and Travels</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="home.js"></script>
</head>
<body>
	<header>
		<h1>Tours and Travels</h1>
		<nav>
			<ul>
				<li><a href="#about">About Us</a></li>
				<li><a href="#tours">Tours</a></li>
				<li><a href="#contact">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
		<section id="banner">
			<h2>Discover new places with us</h2>
			<p>Join our tours and explore the world</p>
			<a href="#tours" class="btn">View Tours</a>
		</section>
		
		<section id="about">
			<h2>About Us</h2>
			<p>Are you looking for an individualized and customized tour? With the ASA Tour Travel Generator can you easily create your own premium tour in Ecuador. Just put in your information and select the desired elements for your tour. You can choose from Acclimatization Tours, Glacier Tours, Technical Tours and Activities which will give you some relaxation. If you also like one of our travel packages, it's also possible to combine it with your customized tour. In the end please let us know how you want to stay in contact with us to make the planning process as comfortable as possible for you.</p>
		</section>
		
		<section id="tours">
			<h2>Tours</h2>
			<ul>
				<li>
					<h3>Tour Name Wan</h3>
					<img src="https://cdn.7tv.app/emote/62544245c2be2d716f88afec/4x.webp" alt="Tour Image">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>	
						<p class="card-price">$100</p>
					<a href="#" class="btn">Book Now</a>
				</li>
				<li>
					<h3>Tour Name Too</h3>
					<img src="https://cdn.7tv.app/emote/639b09b72e88644f3d92e85b/4x.webp" alt="Tour Image">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<p class="card-price">$150</p>
					<a href="#" class="btn">Book Now</a>
				</li>
				<li>
					<h3>Tour Name Thiri</h3>
					<img src="https://cdn.7tv.app/emote/61627b3318f0c6373068eb00/4x.webp" alt="Tour Image">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<p class="card-price">$200</p>
					<a href="#" class="btn">Book Now</a>
				</li>
			</ul>
		</section>
		
		<section id="contact">
			<h2>Contact Us</h2>
			<form>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<label for="message">Message:</label>
				<textarea id="message" name="message" required></textarea>
				<button type="submit" class="btn">Send</button>
			</form>
		</section>
	</main>
	
	<footer>
		<p>&copy; 2023 Tours and Travels</p>
	</footer>
</body>
</html>
