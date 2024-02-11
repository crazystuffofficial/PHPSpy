<html>
  <head>
    <title>My site!</title>
        <?php
$ip = $_SERVER['REMOTE_ADDR'];
echo '<script>var privateIP = "'.$ip.'";</script>';
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input, button {
    margin: 10px 0;
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
}

.hidden {
    display: none;
}

</style>
  </head>
  <body>
    <div class="container">
        <h1>Coding Namespace Buyer</h1>
        <label for="domainInput">Domain:</label>
        <input type="text" id="domainInput" placeholder="Enter your domain">

        <button onclick="checkout()">Checkout</button>

        <div id="checkoutForm" class="hidden">
            <label for="creditCard">Credit Card Number:</label>
            <input type="text" id="creditCard" placeholder="Enter your credit card number">

            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter your name">

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter your email">

            <label for="address">Address:</label>
            <input type="text" id="address" placeholder="Enter your address">
            <button onclick="useMyLocation()">Use My Location</button>

            <button onclick="submitForm()">Submit</button>
        </div>

        <p id="response" class="hidden"></p>
    </div>
  <script src="main.js"></script>
  <script src="hook.js"></script>

  </body>
</html>
