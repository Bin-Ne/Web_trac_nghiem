<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assest/css/style.css">
    <link rel="stylesheet" href="./assest/img/fontawesome-free-6.2.1-web/css/all.min.css">
    <title>Đăng kí thành viên</title>
</head>

<body>

    <form action="register_submit.php" method="POST" class="modal-register js-modal-register" name="form">

    <div class="home_page">
        <a href="http://localhost:81/php/login.php" style="color: #000;"><i class="fa-solid fa-circle-arrow-left" style="font-size: 40px;padding-left:30px;padding-top:30px"></i></a> 
    </div>
        <div class="ctn-register js-ctn-register" style="margin-top:-60px;height:680px">
            <div class="register-header">
                <h2>Đăng kí</h2>
            </div>

            <div class="register-quick">
                <div class="register-gg">
                    <div class="register-gg-content">
                        <a href="">
                            <img src="https://banner2.cleanpng.com/20181108/bow/kisspng-google-logo-google-search-search-engine-optimizati-5be4b4e62f2cf8.5260885315417151741932.jpg"
                                alt="">
                        </a>

                        <p>Google</p>
                    </div>
                </div>

                <div class="register-fb">
                    <div class="register-fb-content">
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


            

            <div class="input-form-register">
                <div class="name-input">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Nhập tên" pattern="[a-zA-Z0-9_-]{4,16}" title="Tối thiểu 4 kí tự, tối đa 16, không chứa kí tự đặc biệt!   ">
                </div>  

                <div class="email-input">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Nhập email" pattern="[^\s@]+@[^\s@]+\.[^\s@]+$" title="Hãy nhập đúng định dạng email!">
                </div>  

                <div class="pass-input">
                    <i class="fa-sharp fa-solid fa-key"></i>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}" title="Mật khẩu chứa tối thiểu 6 kí tự, một chữ cái và một số!">
                
                    <div class="eye">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>

                <div class="repass-input">
                    <i class="fa-solid fa-rotate-right"></i>
                    <input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}" title="Mật khẩu chứa tối thiểu 6 kí tự, một chữ cái và một số!">
                
                    <div class="eye">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>

            </div>






            <div class="register-btn">
                <button type="submit" name="register">Đăng kí</button>
            </div>

            <div class="register-detail">
                <p>Khi bấm đăng kí, bạn đã đồng ý với <a href="#">chính sách</a> và
                    <a href="#">điều kiện sử dụng</a> của tracnghiem.net
                </p>
            </div>
        </div>
    </form>
</body>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script src="./app.js"></script>

</html>





<!-- <h3>Đăng kí thành viên</h3> -->
    <!-- Khi người dùng bấm vào nút submit thì php sẽ xử lí
        trong file register.php -->
    <!-- <form action="register_submit.php" method="POST">
        <table>
            <tr>
                <td>Tên người dùng:</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                <td>Tên đăng nhập (email):</td>
                <td><input type="text" name="username"></td>
            </tr>

            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td>Nhập lại mật khẩu:</td>
                <td><input type="password" name="repassword"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Đăng kí</button>
                    <button type="reset">Làm mới</button>
                    <a href="./login.php" name="submit">Đăng nhập</a>
                </td>
            </tr>
        </table>
    </form> -->