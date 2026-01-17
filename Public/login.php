<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Register</title>
</head>
<body class="bg-red-300 flex justify-center items-center min-h-screen">
    <form action="../Controllers/AuthController.php" method="POST">
        <div class="card bg-white w-[300px] h-[50vh] p-[10px] rounded-[10px]">
            <label for="first_name">First Name:</label><br>
            <input class="rounded-[8px] bg-gray-300" type="text" name="first_name" id="first_name"><br><br>
            <label for="email">Email:</label><br>
            <input class="rounded-[8px] bg-gray-300" type="email" id="email" name="email"><br><br>
            <label for="password">Password:</label><br>
            <input class="rounded-[8px] bg-gray-300" type="password" name="password" id="password"><br><br>
            <div class="btn-div flex justify-center items-center">
                <button name="Login-Btn" type="submit" class="register-btn bg-red-300 text-white px-[20px] py-[10px] rounded-[8px]">Register</button>
            </div><br>
            <p>Don't <a style="text-decoration: none; color: rgb(99, 99, 244);" href="register.php">have an account?</a></p>
        </div>
    </form>
</body>
</html>