<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assest/css/style.css">
    <link rel="stylesheet" href="./assest/img/fontawesome-free-6.2.1-web/css/all.min.css">
    <title>Đăng xuất</title>
</head>

<body>

    <form class="logOut-page" action="logout_submit.php" method="POST">
        <div class="logOut-modal">
            <div class="header-logOut-modal">
                <h2>Thông tin người dùng</h2>
            </div>

            <div class="inf-user">
                <p>Tên người dùng: </p>
                <p>Email:</p>
            </div>

            <div class="logOut-btn">
                <button type="submit" name="logout" class="btnLogOut">Đăng xuất</button>
            </div>

        </div>
    </form>
</body>

</html>