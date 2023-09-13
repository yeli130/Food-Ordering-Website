<!DOCTYPE html>
<html>
  <head>
    <title>Eat Restaurant</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/153a47b5e6.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include('header.html'); ?>
    <main>
        <div class="banner">
            <h1>Bringing Joy Through Food</h1>
            <button onclick="window.location.href='menu.php';">Order Now</button>
        </div>
        
        <h2>Popular Food</h2>
        <div class="favorites">
          <div class="menu-item">
            <img src="./final project imagines/Japanese Pasta.jpg" alt="noodles">
            <h5>Spaghetti Bolognese</h5>
            <p>Fired noodles with sweet&sour chicken and brown rice</p>
            <form method="post" action="menu.php" id="spa">
              <input type="hidden" name="name" value="Spaghetti Bolognese">
              <input type="hidden" name="price" value=14.99>
              <input type="hidden" name="img" value="./final project imagines/Japanese Pasta.jpg">
              <button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			      </form>
          </div>
          <div class="menu-item">
            <img src="./final project imagines/burger.jpg" alt="burger">
            <h5>Signiture Burger</h5>
            <p>Signature burger features a juicy beef patty, melted cheddar cheese,fresh vegetables,between two soft brioche buns.</p>
            <form method="post" action="menu.php" id="burger">
              <input type="hidden" name="name" value="Signature Burger">
              <input type="hidden" name="price" value=12.99>
              <input type="hidden" name="img" value="./final project imagines/burger.jpg">
              <button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
			      </form>
          </div>
          <div class="menu-item">
            <img src="./final project imagines/apple_pie.jpg" alt="pie">
            <h5>Apple Pie</h5>
            <p>Locally-sourced apples baked with a buttery crust, drizzled with caramel sauce.</p>
            <form method="post" action="menu.php" id="pie">
              <input type="hidden" name="name" value="Apple Pie">
              <input type="hidden" name="price" value=6.99>
              <input type="hidden" name="img" value="./final project imagines/apple_pie.jpg">
              <button class="add-to-cart" type="submit" value="submit">Add to Cart</button>
            </form>
          </div>
        </div>
    </main>
    <?php include('footer.html') ?>
  </body>
</html>
