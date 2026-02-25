<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulaire</h1>

    <form action="{{ route('create_user') }}" method="post">
        @csrf
    
    <label for="name">Name</label> <input type="text" name="name" placeholder="Enter your name"> <br>
     <label for="email">
        Email
     </label>
     <input type="email" name="email" id="email"> <br>
     <label for="password">
        Password
     </label>
    <input type="password" name="password" id="password">
    <button type="submit">Register</button>
    </form>
</body>
</html>