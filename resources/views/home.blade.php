<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>
<body>
    <!--@auth, @else, and @endauth are called Blade directives in Laravel-->
    @auth        <!--hecks if a user is logged in. If the user is authenticated-->
    <h2>congrags you are succsessfully logged!</h2>

    @else        <!--If the user is not authenticated-->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h1>Resgister form</h1>
        <form action="/register" method="POST">
            @csrf         
            <input type="text" name="name" placeholder="Name"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button>Register</button>
        </form>
    </div>


    @endauth       <!--End of the auth check-->
    

</body>
</html>