<!DOCTYPE html>
<html>
<head>
	<title>Tours and Travels</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="style.js"></script>
	<script src="home.js"></script>
</head>
<body>
<?php
session_start();
?>
<header>
    <h1>Tours and Travels</h1>
    <nav>
        <ul>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'tat');
        $sel = "SELECT * FROM login";
        $query = mysqli_query($conn,$sel);
        $result = mysqli_fetch_assoc($query);
        ?>

            <li><a href="#about">About Us</a></li>
            <li><a href="#tours">Tours</a></li>
            <li><a href="#contact">Contact Us</a></li>
			<?php if (isset($_SESSION['email'])) { ?>
                <li class="email"><?php echo $_SESSION['email']; ?></li>
            <?php } else { ?>
                <li class="email"><?php echo $_SESSION['email']; ?></li>
            <?php } ?>

        </ul>
    </nav>
</header>




    <!-- <?php if (isset($_SESSION['email'])) { ?>
                <li class="email"><?php echo $_SESSION['email']; ?></li>
				<?php } else { ?>
                <li><a href="signup.php">Signup</a></li>


				<?php if (isset($_SESSION['email'])) { ?>
                <li class="email"><?php echo $_SESSION['email']; ?></li>
            <?php } else { ?>
                <li><a href="signup.php">Signup</a></li>
            <?php } ?>


            <?php } ?> -->

	
    

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
					<h3>Namche Bazzar</h3>
					<img src="https://cdn.himalayanglacier.com/wp-content/uploads/2017/11/Night-View-of-Namche-Bazzar.jpg" alt="Tour Image">
					<p>Namche Bazaar Nepal or Namche Bazar is a town that most trekkers pass through on the Everest Base Camp trek. Namche Bazaar is a real hub and important acclimatisation stop for trekkers and it’s grown from a market town to a tourist destination in itself. If you’re heading to Everest, Gokyo Lakes, Island Peak or any of the classic routes, this post is about what to expect in Namche. </p>	
						<p class="card-price">$100</p>
					<a href="#" class="btn">Book Now</a>
				</li>
				<li>
					<h3>Kanchenjunga</h3>
					<img src="https://i0.wp.com/ghumante.com/wp-content/uploads/2022/08/KBC21-scaled.jpg?resize=1140%2C855&ssl=1" alt="Tour Image">
					<p>Kanchenjunga South Base Camp Trek is one of the best off-the-beaten trekking trails in Nepal but receives much lesser explorers and trekkers than the Everest and Annapurna region. The world's third-highest peak, Kanchenjunga (8,586 meters/28,169 feet), stands majestically over the Indian and Nepalese border in the northeast corner of Nepal’s Taplejung District.</p>
					<p class="card-price">$150</p>
					<a href="#" class="btn">Book Now</a>
				</li>
				<li>
					<h3>Shey Phoksundo</h3>
					<img src="https://i0.wp.com/ghumante.com/wp-content/uploads/2021/03/72879400_3594431213904214_4152555221370798080_o.jpg?resize=1080%2C720&ssl=1" alt="Tour Image">
					<p>6 nights 7 days trip, with 2 days to trek up to the lake, spend a day around the lake and get back down in 2 days.
Beautiful lake that actually looks like shape of the Lungs of a human being, hence the name derived from "phokso" which means lungs in Nepali.</p>
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
