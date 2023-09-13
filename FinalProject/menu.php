<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Menu</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/153a47b5e6.js" crossorigin="anonymous"></script>
	<script>
		function addToCart(name) {
			alert(name + " has added to cart");
		}
	</script>
</head>
<body>
	<?php 
	
	include('header.html'); 
	session_start();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  
	  $product_name = $_POST['name'];
	  $product_price = $_POST['price'];
	  $product_image = $_POST['img'];
	  $product_quantity = 1; 

	  // Check if the product is already in the cart
	  if(isset($_SESSION['cart'][$product_name])) {
		  // Increment the quantity if the product is already in the cart
		  $newprod = $_SESSION['cart'][$product_name];
		  $newqty = $newprod['quantity'] + 1;
		  $newprod['quantity'] = $newqty;
		  $_SESSION['cart'][$product_name] = $newprod;
		  echo "<script>addToCart('$product_name');</script>";
	  } else {
		  // Add the product to the cart if it's not already in the cart
		  $_SESSION['cart'][$product_name] = array(
			  'name' => $product_name,
			  'price' => $product_price,
			  'image' => $product_image,
			  'quantity' => $product_quantity
		  );
		  echo "<script>addToCart('$product_name');</script>";
	  }
	}
	?>
	<section>
		<h1>Entrees</h1>
    <div id="menu-section">
		<div class="menu-item">
			<img src="./final project imagines/burger.jpg" alt="menu item">
			<h2>Signature Burger</h2>
			<p>A juicy beef patty with vegetables on a toasted bun.</p>
			<div class="price">$12.99</div>
			<form method="post" action="menu.php" id="burger">
				<input type="hidden" name="name" value="Signature Burger">
				<input type="hidden" name="price" value=12.99>
				<input type="hidden" name="img" value="./final project imagines/burger.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
        <div class="menu-item">
			<img src="./final project imagines/chicken_alfredo.jpg" alt="menu item">
			<h2>Chicken Alfredo</h2>
			<p>Tender chicken breast and fettuccine pasta in a creamy Alfredo sauce.</p>
			<div class="price">$16.99</div>
			<form method="post" action="menu.php" id="alfredo">
				<input type="hidden" name="name" value="Chicken Alfredo">
				<input type="hidden" name="price" value=16.99>
				<input type="hidden" name="img" value="./final project imagines/chicken_alfredo.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
    	</div>
		<div class="menu-item">
			
			<img src="./final project imagines/samon.jpg" alt="menu item">
			<h2>Salmon</h2>
			<p>Fresh Atlantic salmon served with steamed vegetables.</p>
			<div class="price">$19.99</div>
			<form method="post" action="menu.php" id="salmon">
				<input type="hidden" name="name" value="Salmon">
				<input type="hidden" name="price" value=19.99>
				<input type="hidden" name="img" value="./final project imagines/samon.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
	</section>
	<section>
        <div id="menu-section">
		<h1>Main</h1>
		<div class="menu-item">
			<img src="./final project imagines/Japanese Pasta.jpg" alt="menu item">
			<h2>Spaghetti Bolognese</h2>
			<p>Spaghetti with homemade bolognese sauce and Parmesan cheese.</p>
			<div class="price">$14.99</div>
			<form method="post" action="menu.php" id="spa">
				<input type="hidden" name="name" value="Spaghetti Bolognese">
				<input type="hidden" name="price" value=14.99>
				<input type="hidden" name="img" value="./final project imagines/Japanese Pasta.jpg">
			<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
		<div class="menu-item">
			<img src="./final project imagines/traditional pizza.jpg" alt="menu item">
			<h2>Pizza Margherita</h2>
			<p>A classic pizza with tomato sauce, mozzarella cheese, and fresh basil.</p>
			<div class="price">$18.99</div>
			<form method="post" action="menu.php" id="pizza_m">
				<input type="hidden" name="name" value="Pizza Margheritta">
				<input type="hidden" name="price" value=18.99>
				<input type="hidden" name="img" value="./final project imagines/traditional pizza.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
        <div class="menu-item">
			<img src="./final project imagines/steak.jpg" alt="menu item">
			<h2>Grilled Steak</h2>
			<p>Grilled steak served with roasted vegetables and mashed potatoes.</p>
			<div class="price">$16.99</div>
			<form method="post" action="menu.php" id="steak">
				<input type="hidden" name="name" value="Grilled Steak">
				<input type="hidden" name="price" value=16.99>
				<input type="hidden" name="img" value="./final project imagines/steak.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
        </div>
	</section>
	<section>
        <div id="menu-section">
		<h1>Appetizer</h1>
		<div class="menu-item">
			<img src= "./final project imagines/Bruschetta.jpg" alt="menu item">
			<h2>Bruschetta</h2>
			<p>Toasted bread topped with diced tomatoes, garlic, and basil.</p>
			<div class="price">$7.99</div>
			<form method="post" action="menu.php" id="bruschetta">
				<input type="hidden" name="name" value="Beef Burger">
				<input type="hidden" name="price" value=7.99>
				<input type="hidden" name="img" value="./final project imagines/Bruschetta.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
		<div class="menu-item">
			<img src="./final project imagines/Mozzarella_Sticks.jpg" alt="menu item">
			<h2>Mozzarella Sticks</h2>
			<p>Deep-fried breaded mozzarella cheese sticks served with marinara sauce.</p>
			<div class="price">$8.99</div>
			<form method="post" action="menu.php" id="ms">
				<input type="hidden" name="name" value="Mozzarella Sticks">
				<input type="hidden" name="price" value=8.99>
				<input type="hidden" name="img" value="./final project imagines/Mozzarella_Sticks.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
        <div class="menu-item">
        <img src="./final project imagines/crepea.jpg" alt="menu item">
        <h2>Ravioli Carbonara</h2>
        <p>Homemade ravioli stuffed with cheese and herbs in a creamy sauce.</p>
        <div class="price">$18.99</div>
        	<form method="post" action="menu.php" id="rc">
				<input type="hidden" name="name" value="Ravioli Carbonara">
				<input type="hidden" name="price" value=18.99>
				<input type="hidden" name="img" value="./final project imagines/crepea.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
        </div>
	</section>
	<section>
        <div id="menu-section">
		<h1>Dessert</h1>
		<div class="menu-item">
			<img src="./final project imagines/chocolate_donut.jpg" alt="menu item">
			<h2>Chocolate Donut</h2>
			<p>A rich and indulgent chocolate donut, topped with chocolate glaze.</p>
			<div class="price">$6.99</div>
			<form method="post" action="menu.php" id="donut">
				<input type="hidden" name="name" value="Chocolate Donut">
				<input type="hidden" name="price" value=6.99>
				<input type="hidden" name="img" value="./final project imagines/chocolate_donut.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
		<div class="menu-item">
			<img src="./final project imagines/ice_cream.jpg" alt="menu item">
			<h2>Vanilla Ice Cream</h2>
			<p>Homemade vanilla ice cream topped with whipped cream and a cherry.</p>
			<div class="price">$4.99</div>
			<form method="post" action="menu.php" id="ic">
				<input type="hidden" name="name" value="Ice Cream">
				<input type="hidden" name="price" value=4.99>
				<input type="hidden" name="img" value="./final project imagines/ice_cream.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
        </div>
        <div class="menu-item">
            <img src="./final project imagines/apple_pie.jpg" alt="menu item">
            <h2>Apple Pie</h2>
            <p>Made with sweet and tangy apples, cinnamon, and flaky pastry crust.</p>
            <div class="price">$6.99</div>
            <form method="post" action="menu.php" id="pie">
				<input type="hidden" name="name" value="Apple Pie">
				<input type="hidden" name="price" value=6.99>
				<input type="hidden" name="img" value="./final project imagines/apple_pie.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
        </div>
		</div>
	</section>
	<section>
    <div id="menu-section">
		<h1>Drinks</h1>
		<div class="menu-item">
			<img src="./final project imagines/Coke.jpg" alt="menu item">
			<h2>Coca-Cola</h2>
			<p>A refreshing cola drink served chilled in a glass bottle.</p>
			<div class="price">$2.99</div>
			<form method="post" action="menu.php" id="coke">
				<input type="hidden" name="name" value="Coca-Cola">
				<input type="hidden" name="price" value=2.99>
				<input type="hidden" name="img" value="./final project imagines/Coke.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
		<div class="menu-item">
			<img src="./final project imagines/smoothie.jpg" alt="menu item">
			<h2>Fruit Smoothie</h2>
			<p>A blend of fresh fruits and yogurt, served cold in a tall glass.</p>
			<div class="price">$5.99</div>
			<form method="post" action="menu.php" id="smoothie">
				<input type="hidden" name="name" value="Fruit Smoothie">
				<input type="hidden" name="price" value=5.99>
				<input type="hidden" name="img" value="./final project imagines/smoothie.jpg">
				<button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			</form>
		</div>
    </div>
	</section>
	<?php include('footer.html'); ?>
</script>
</body>
</html>
