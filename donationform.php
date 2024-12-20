<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex; /* Added flexbox */
            align-items: center; /* Vertically align items */
            justify-content: space-between; /* Add space between items */
        }

        header .logo {
            max-width: 40px; /* Reduced the max-width for smaller logo */
            height: auto;
        }

        header h2 {
            margin: 0;
            margin-left: 10px; /* Add left margin for spacing */
        }

        header h3 {
            margin: 0;
            flex-grow: 1; /* Occupy remaining space */
            text-align: center; /* Center align the text */
        }

        .donation-section {
            padding: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .donation-content {
            display: flex; /* Add flexbox to the donation content */
            align-items: center;
        }

        .photo {
            flex: 1; /* Occupy 50% of the space */
            margin-right: 20px; /* Add some spacing between photo and paragraph */
        }

        .photo img {
            max-width: 100%;
            height: auto;
        }

        .paragraph {
            flex: 1; /* Occupy 50% of the space */
            text-align: left; /* Align text to the left */
        }

        .donation-form {
            padding: 50px;
            background-color: rgb(224,224,224);
            position: relative; /* Added relative positioning */
        }

        .donation-form h2 {
            margin-bottom: 20px;
            text-align: center; /* Center align the text */
            font-size: 24px; /* Adjust font size */
            font-family: Arial, sans-serif; /* Change font family */
        }

        .qr-code {
            padding: 10px;
            text-align: center; /* Center align the QR code */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="number"],
        form select,
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('arrow.png') no-repeat right;
            background-size: 15px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #555;
        }
        .paragraph h2 {
            margin-bottom: 10px; /* Reduce margin for better spacing */
        }

        .paragraph h4 {
            font-size: 1.2em; /* Increase font size for better visibility */
            margin-top: 10px; /* Add margin to separate from the heading */
            font-family: "Source Serif Pro", serif;
            font-size: 35px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <header>
        <img src="v1008-35.jpg" alt="Logo of the page" class="logo">
        <h2>Pet Re Homing</h2>
        <h3>Donate and make a change.</h3>
    </header>

    <section class="donation-section">
        <div class="donation-content">
            <div class="photo">
                <img src="bigphoto.jpg" alt="Big Photo">
            </div>
            <div class="paragraph">
                
                <h4>Join us in helping animals find their forever homes. Currently, over 9,000 pets are awaiting adoption through Pet Re Homing. Be a part of their journey and change a life today.</h4>
                <p>At Pet Re Homing, we believe every pet deserves a loving home. With your support, we can provide shelter, care, and hope to thousands of animals in need. Join us in making a difference today!</p>
                <p>Every pet deserves a loving home, and with your support, Pet Re Homing ensures they find one. Your donations provide sanctuary for pets in need, bridging the gap between homelessness and a forever family.

Your contributions fuel essential programs such as Crisis Care Support and Food Donations, sustaining rescue efforts and ensuring no pet goes hungry. Additionally, funds support innovative offering alternatives to surrender and keeping pets out of harm's way.

Surrendering a pet can be heart-wrenching, but your generosity offers hope and security. Together, we're making a difference, one furry friend at a time.</p>
            </div>
        </div>
    </section>

    <section class="donation-form">
        <h2>Make a Donation</h2>
        <form action="process_donation.php" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address"><br>

            <label for="donationamount">Donation Amount:</label>
            <input type="number" id="donationamount" name="donationamount" required><br>

            <label for="donationmethod">Donation Method:</label>
            <select id="donationmethod" name="donationmethod" required>
            <option value="Select">Select</option>
                <option value="Online">Online</option>
                <option value="Cash">Cash</option>
            </select><br>

            <div class="qr-code">
                <img src="qr.png" alt="QR Code for online payments">
            </div>

            <label for="donationdate">Donation Date:</label>
            <input type="date" id="donationdate" name="donationdate" required><br>

            <input type="submit" value="Submit Donation">
        </form>
    </section>
</body>
</html>
