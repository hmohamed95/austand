<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .footer {
            font-size: 0.8em;
            color: #666;
            text-align: center;
            margin-top: 60px;
        }

        a{
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Dear {{$full_name}}</p>
        <p>Thank you for visiting Ahlia University stand</p>

        <p>You can find more details about our programs in our <a href="https://www.ahlia.edu.bh/programmes/">Website</a></p>

        <!-- Telephone -->

        <p>For more information, please contact us on +973 17298550</p>

    </div>
    <div class="footer">


        <img src="https://www.ahlia.edu.bh/AU_Logo.png" alt="Ahlia Logo" width="150px">

        <p>Best regards,</p>
        <p>Ahlia University - {{now()->year}}</p>
        <p>+973 17298550</p>
    </div>
</body>
</html>
