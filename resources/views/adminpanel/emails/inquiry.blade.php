<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Inquiry</title>
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
        <h1>{{ $data['heading'] ?? 'Not provided' }}</h1>
        <div class="details">
            <p><strong>Name:</strong> {{ $data['name'] ?? 'Not provided' }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'Not provided' }}</p>
            <p><strong>Phone:</strong> {{ $data['phone'] ?? 'Not provided' }}</p>
            <p><strong>Selected Date:</strong> {{ $data['selected_date'] ?? 'N/A' }}</p>
            <p><strong>Time Slot:</strong> {{ $data['time_slot'] ?? 'N/A' }}</p>
            <p><strong>Adult Tickets:</strong> {{ isset($data['adult_tickets']) ? $data['adult_tickets'] : 'N/A' }}</p>
            <p><strong>Child Tickets:</strong> {{ isset($data['child_tickets']) ? $data['child_tickets'] : 'N/A' }}</p>
            <p><strong>Private Transport:</strong> {{ isset($data['private_transport']) && $data['private_transport'] ? 'Yes' : 'No' }}</p>
              
        </div>
    </div>
</body>
</html>
