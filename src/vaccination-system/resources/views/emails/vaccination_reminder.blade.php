<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaccination Reminder</title>
</head>

<body>
  <h1>Hello, {{ $name }}</h1>
  <p>This is a reminder that you are scheduled for a vaccination on {{ $scheduled_date->format('F j, Y') }}.</p>
  <p>Please ensure to arrive at your selected vaccination center on time.</p>
  <p>Thank you!</p>
</body>

</html>