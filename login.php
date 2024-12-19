<!DOCTYPE html>
<html>

<head>
    <title>Login Hotel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/style/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body_login">
    <div class="container">

        <section class="login-box">
            <h1>Login</h1>
            <form method="post" action="ceklogin.php">
            <div class="input-group">
                    <i class='bx bxs-user'></i>
					<input type="text" placeholder="Username" name="username">
				</div>
				<div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
					<input type="password" placeholder="Password" name="password">
				</div>
				<input type="submit" value="Login"> 
            </form>
        </section>
    </div>

</body>

</html>