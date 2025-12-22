<!DOCTYPE html>
<html>

<head>
    <title>Nieuw Contactbericht</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Nieuw bericht van {{ $data['name'] }}</h2>

    <p><strong>Naam:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Onderwerp:</strong> {{ $data['subject'] }}</p>

    <hr>

    <h3>Bericht:</h3>
    <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #3490dc;">
        {!! nl2br(e($data['message'])) !!}
    </div>

</body>

</html>