<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .details {
            margin-top: 20px;
        }
        .details p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
            line-height: 1.6;
        }
        .details p strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Received</h1>
        <div class="details">
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Phone:</strong> {{ $data['phone'] ?? 'Not provided' }}</p>
            <p><strong>Amount:</strong> {{ $data['amount'] }}</p>
            <p><strong>Packge url:</strong> {{ $data['url'] }}</p>
        </div>
    </div>
</body>
</html>
