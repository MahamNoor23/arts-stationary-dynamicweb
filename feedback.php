<?php
include 'config.php';
if (isset($_POST['submit'])) {

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_message = $_POST['customer_message'];
    $customer_rating = $_POST['customer_rating'];

    $insert_feedback = "INSERT INTO `customer's_feedbak` (`customer_name`, `customer_email`, `customer_message`, `customer_rating`) VALUES ('$customer_name', '$customer_email', '$customer_message', '$customer_rating')";
    $feedback_result = mysqli_query($conn, $insert_feedback);

    if ($feedback_result) {
        // Sending the customer an email
        $to = $customer_email;
        $subject = 'Thank you for your feedback';
        $message = "Dear $customer_name,\n\nThank you for your feedback! We appreciate your input and will do our best to improve.\n\nBest regards,\nThe Feedback Team";
        $headers = "From: mahamamin183@gmail.com"; // Replace with your email
        mail($to, $subject, $message, $headers);

        echo "
        <script>
            window.location.href='index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form with Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        select {
            height: 40px;
        }

        .rating-label {
            display: block;
            margin-bottom: 8px;
        }

        .rating-input {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Share your feedback with us!</h2>
    <form method="post">
        <label for="name">What's your name?</label>
        <input type="text" id="name" name="customer_name" placeholder="Enter your name here" required>

        <label for="email">What's your email address?</label>
        <input type="email" id="email" name="customer_email" placeholder="Enter your email address here" required>

        <label for="message">Message:</label>
        <textarea id="message" name="customer_message" rows="4" cols="50" placeholder="Enter your message here"></textarea>

        <label class="rating-label">Rating:</label>
        <label class="rating-label">
            <input class="rating-input" type="radio" value="Excellent" name="customer_rating">
            Excellent
        </label>
        <label class="rating-label">
            <input class="rating-input" type="radio" value="Good" name="customer_rating">
            Good
        </label>
        <label class="rating-label">
            <input class="rating-input" type="radio" value="Alright" name="customer_rating">
            It was alright
        </label>
        <label class="rating-label">
            <input class="rating-input" type="radio" value="Bad" name="customer_rating">
            Bad
        </label>
        <label class="rating-label">
            <input class="rating-input" type="radio" value="Very bad" name="customer_rating">
            Very bad
        </label>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
