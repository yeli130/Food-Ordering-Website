<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
    <script src="https://kit.fontawesome.com/153a47b5e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        textarea {
            width: 500px;
            height: 220px;
        }
        .submitMessage {
            color: red;
        }
    </style>
</head>
<body>
    <?php error_reporting(E_ERROR | E_PARSE) ?>
	<header>
        <?php include('header.html')?>
	</header>
	
	<main>
    <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $submitMessage = "";
                if (empty($name) || empty($email) || empty($message)) {
                    $submitMessage = "Error: All fields are required.";
                } else {
                    // send email
                    $to = 'info@example.com';
                    $subject = 'New message from contact form';
                    $body = "Name: $name\n\nEmail: $email\n\nMessage: $message";
                    $headers = "From: $email";
                
                    if (mail($to, $subject, $body, $headers)) {
                        $submitMessage = "Thank you for contacting us! We'll get back to you soon.";
                    } else {
                        $submitMessage = "Unable to submit form. Please try again later.";
                    }
                }
            }
            ?>
		<p>For any inquiries or feedback, please fill out the form below or contact us at the following:</p>

		<ul>
			<li>Phone: 1-800-123-4567</li>
			<li>Email: info@example.com</li>
			<li>Address: 123 Main St, Anytown USA 12345</li>
		</ul>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <span class="submitMessage"><?php echo $submitMessage ?></span><br>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required><br>

			<label for="message">Message:</label><br>
			<textarea id="message" name="message" required></textarea><br>

			<button type="submit">Submit</button>
		</form>
        
	</main>

	<footer>
        <?php include('footer.html'); ?>
	</footer>
</body>
</html>
