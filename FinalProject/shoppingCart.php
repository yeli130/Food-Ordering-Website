<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
  <?php //error_reporting(0); ?> 
    <div class="container">
      <h1>Shopping Cart</h1>
      <div class="cart">
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>
          <?php
            session_start();

            // remove item
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
              if (isset($_GET['delete_id'])) {
                $item_id = $_GET['delete_id'];
                if(isset($_SESSION['cart'][$item_id])) {
                  unset($_SESSION['cart'][$item_id]);
                }
              }
            }

            // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //   // Retrieve the product information from the form data
            //   $product_name = $_POST['name'];
            //   $product_price = $_POST['price'];
            //   $product_image = $_POST['img'];
            //   $product_quantity = 1; // Default quantity is 1

            //   // Check if the product is already in the cart
            //   if(isset($_SESSION['cart'][$product_name])) {
            //       // Increment the quantity if the product is already in the cart
            //       $newprod = $_SESSION['cart'][$product_name];
            //       $newqty = $newprod['quantity'] + 1;
            //       $newprod['quantity'] = $newqty;
            //       $_SESSION['cart'][$product_name] = $newprod;
            //   } else {
            //       // Add the product to the cart if it's not already in the cart
            //       $_SESSION['cart'][$product_name] = array(
            //           'name' => $product_name,
            //           'price' => $product_price,
            //           'image' => $product_image,
            //           'quantity' => $product_quantity
            //       );
            //   }
            // }
        ?>
          <?php 
            $keys = array_keys($_SESSION['cart']);
            $cart = $_SESSION['cart'];
            $subtotal = 0;
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
              $prodname = $keys[$i];
              $prodtotal = $cart[$prodname]['quantity']*$cart[$prodname]['price'];
              $subtotal = $subtotal + $prodtotal;
          ?>
            <tr>
              <td class="product-name">
                <img src="<?php echo $cart[$prodname]['image']; ?>" width="80px" alt="<?php echo $prodname; ?>">
                <p><?php echo $prodname; ?></p>
              </td>
              <td class="product-price"><?php echo '$' . number_format($cart[$prodname]['price'], 2);?></td>
              <td class="product-quantity"><?php echo $cart[$prodname]['quantity'];?></td>
              <td class="product-total"><?php echo '$' . number_format($prodtotal, 2); ?></td>
              <td><form method="GET"><button class="remove"  name="delete_id" value="<?php echo $prodname ?>">Remove</button></form></td>
            </tr>
          <?php }; ?>
          </tbody>
            
          <tfoot>
            <tr>
              <td colspan="3">Subtotal</td>
              <td class="subtotal">$<?php echo number_format($subtotal,2)?></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3">Tax</td>
              <td class="tax">$<?php echo number_format($subtotal*0.13,2)?></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3">Total</td>
              <td class="total">$<?php echo number_format($subtotal*1.13,2)?></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
        <div class="checkout">
          <a href="./menu.php">Continue Shopping</a>
          <button class="checkout-btn">Checkout</button>
        </div>
      </div>
    </div>
  </body>
</html>
