<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>User</title>

    <!-- Thư viện jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Countdown -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">

    <style>
        .container-bin{
            padding-top: 80px;
        }

        .nav-bin > li{
            margin-right: 20px;
        }
    </style>
</head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" style="font-size: 22px;"> 
            <div class="container-fluid">
                <div class="navbar-header">
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand brand-bin" style="margin-right:60px;font-size:28px;font-weight:bold;color:#fff" href="http://localhost:81/home_page/home_page_user/home_page.php">
                            Trang chủ
                        </a>
                </div>
            
                <div class="collapse navbar-collapse" id="myNavbar">
                    
                    <ul class="nav navbar-nav nav-bin">
                        <li class="active"><a href="http://localhost:81/dethi_tracnghiem/user/take_exam/">Làm bài</a></li>
                        <li><a href="http://localhost:81/dethi_tracnghiem/user/exam_history/">Xem điểm</a></li>
                        <li><a href="http://localhost:81/dethi_tracnghiem/user/update_profile/">Tài khoảng</a></li>
                    </ul>
                    <!-- 
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                    </ul> -->
                </div>
            
            </div>
        </nav> 

        <div class="container container-bin">
            <div class="panel-group" style="font-size: 18px;">
                <div class="panel panel-info">
                    <div class="panel-heading" style="font-weight:bold;">LÀM BÀI THI</div>
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                               <a href="http://localhost:81/dethi_tracnghiem/user/take_exam/"> <button type="button" name="button" class="btn btn-success btn-lg" id="btnStart">Bắt đầu</button></a>
                            </div>
                        </div>  

                    </div>
                </div>
            </div>
        </div>    

    </body>
</html>









