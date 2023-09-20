<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assest/css/style.css">
    <link rel="stylesheet" href="./assest/img/fontawesome-free-6.2.1-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="./app.js"> -->
    <title>Đăng nhập</title>
</head>

<body>
<form class="logIn-page" action="login_submit.php" method="POST">

    <div class="home_page">
        <a href="http://localhost:81/home_page/home_page/home_page.php" style="color: #000;"><i class="fa-solid fa-circle-arrow-left" style="font-size: 40px;padding-left:30px;padding-top:30px"></i></a> 
    </div>
        <div class="logIn-modal" style="margin-top: -58px;height:660px">
            <div class="logIn-modal-content">
                <div class="header-logIn-modal">
                    <h2>Đăng nhập</h2>
                </div>

                <div class="logIn-quick">
                    <div class="logIn-gg">
                        <div class="logIn-gg-content">
                            <a href="">
                                <img src="https://banner2.cleanpng.com/20181108/bow/kisspng-google-logo-google-search-search-engine-optimizati-5be4b4e62f2cf8.5260885315417151741932.jpg" alt="">
                            </a>

                            <p>Google</p>
                        </div>
                    </div>

                    <div class="logIn-fb">
                        <div class="logIn-fb-content">
                            <div class="box-fb">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                            
                            <p>Facebook</p>
                        </div>
                    </div>
                </div>


                <div class="Or">
                    <hr class="hr-or">
                    <span class="or">hoặc</span>
                </div>

                <div class="input-form-login">
                    <div class="email-input">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="email" id="logIn-user" placeholder="Nhập email" pattern="[^\s@]+@[^\s@]+\.[^\s@]+$" title="Hãy nhập đúng định dạng email!">
                    </div>  

                    <div class="pass-input">
                        <i class="fa-sharp fa-solid fa-key"></i>
                        <input type="password" name="password" id="logIn-pass" placeholder="Nhập mật khẩu" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}" title="Mật khẩu chứa tối thiểu 6 kí tự, một chữ cái và một số!">
                        <div class="eye">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                </div>

                <div class="Forget-pass">
                    <a class="forget-pass js-fgPass-btn" href="#">Quên mật khẩu</a>
                </div>

                <div class="logIn-btn">
                    <button type="submit" name="submit" class="logIn-Btn">Đăng nhập</button>
                </div>

                <div class="register">
                    <p class="register-p js-register-btn">Nếu chưa có tài khoảng hãy </p>
                        <a class="register-p js-register-btn"
                        href="http://localhost:81/php/register.php">Đăng kí ngay</a>
                </div>
            </div>
            
        </div>
    </form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script src="./app.js"></script>
</body>
</html>

