<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }
        img{
    border: solid;
    padding: 10px;
    border-radius: 5px;
    width: 80px;
    position: absolute;
    top:10px;
    right:10px
}

    </style>
</head>
<body>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">  
    <h1>{{ $recette->title }}</h1>
    <p>{{ $recette->description }}</p>
    <hr>
    <ul>
        <li><strong>Completed:</strong> {{ $recette->completed ? 'Yes' : 'No' }}</li>
        <li><strong>Due Date:</strong> {{ $recette->due_date }}</li>
        <li><strong>Author:</strong> {{ $recette->user->name}}</li>
        <li><strong>Category:</strong> {{ $recette->category->category[app()->getLocale()] ?? $recette->category->category['en'] }}</li>
    </ul>
    <hr>
</body>
</html>