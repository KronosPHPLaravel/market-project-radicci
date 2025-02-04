<!DOCTYPE html>
<html>

<head>
    <title>Richiesta Ricevuta</title>
</head>

<body>
    <p>Richiesta da: {{ $data['name'] }}</p>
    <p>Articolo: {{ $data['item'] }}</p>
    <p>Messaggio: {{ $data['text'] }}</p>
</body>

</html>
