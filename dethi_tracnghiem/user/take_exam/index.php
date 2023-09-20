<?php
    session_start();
    // echo "Tài khoảng đăng nhập hiện tại: " . $_SESSION["email"] . ".<br>";
    // echo "Tài khoảng đăng nhập hiện tại: " . $_SESSION["name"] . ".<br>";

    // Thời gian
    // date_default_timezone_set("Asia/Ho_Chi_Minh"); 
    // echo date('h:i:A d-m-Y'); 
?>

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
        <input type="hidden" id="email_user" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '!session'; ?>">

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

                    <!-- <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                    </ul> -->
                </div>
            
            </div>
        </nav>
        <!-- <div id="countdown" class="count-down">5:00</div> -->
        
       
        <div id="countdown">5:00</div>
        <!-- <button onclick="startTimer();">Start</button> -->
        <!-- <button onclick="stopTimer()">Stop the time</button> -->
        
    

        <div class="container container-bin">
            
            <div class="panel-group" style="font-size: 18px;">
                <div class="panel panel-info">
                    <div class="panel-heading" style="font-weight:bold;">LÀM BÀI THI</div>
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="button" name="button" class="btn btn-success btn-lg" id="btnStart">Bắt đầu</button>
                            </div>
                        </div>   

                        <div id="questions"></div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-warning btn-lg" id="btnFinish">Kết thúc</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h3 id="mark" class="text-info" style="font-weight:bold;"></h3>
                                <button type="button" class="btn btn-info btn-lg" id="btnSave">Lưu điểm</button> &nbsp
                                <a href="http://localhost:81/dethi_tracnghiem/user/take_exam/fix_countdown.php"><button type="button" class="btn btn-danger btn-lg" id="btnNotSave">Làm lại</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">Làm bài thi</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="button" name="button" class="btn btn-success" id="btnStart">Bắt đầu</button>
                            </div>
                        </div>

                        <div id="questions"></div>
                    </div>
                </div>
                </div>
            </div>
        </div> -->

        

    </body>
</html>

<!-- <script src="./app.js"></script> -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnFinish').hide(); 
        $('#btnSave').hide(); 
        $('#btnNotSave').hide(); 
        $('#btnStart').click();
    })

    var questions;  // Biến toàn cục để lưu ds câu hỏi
    var mark = 0;   // Biến lưu điểm
    var email_user = document.getElementById("email_user").value;
    // var name = document.getElementById("name").value;

    
    $('#btnStart').click(function(){
        GetQuestions();
        $('#btnFinish').show(); 
        // startTimer ();
        //Hiện countdown lên 
        // $('#countdown').show(); 

        

        $(this).hide();
    });

    var now = new Date();
    var formattedDate = now.toLocaleString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true}) + " " + now.toLocaleDateString('en-GB');
    $('#btnFinish').click(function(){
        $(this).hide();
        $('#countdown').hide(); 
        stopTimer();   
        $('#btnSave').show(); 
        $('#btnNotSave').show(); 
        CheckResult();
    });

    $('#btnNotSave').click(function(){
        location.reload();
    });

    function finish(){
        stopTimer();
        $('#btnFinish').click();
    }
    
    function CheckResult(){ 
        $('#questions div.row').each(function(k,v){   
            // B1: Lấy đáp án đúng của câu hỏi
            let id = $(v).find('h3').attr('id');
            let question = questions.find(x=>x.id == id); // Tìm câu hỏi trong mảng questions dựa vào id đã có ở trên
            let answer = question['answer']; // Lấy đáp án đúng của câu hỏi
            // console.log(answer);    
            // let id = $(v).attr('id'); // Lấy thuộc tính id của thẻ h5 = câu hỏi -> lấy id câu hỏi
            

            // B2: Lấy đáp án của người dùng những thằng radio được check
            let choice = $(v).find('fieldset input[type="radio"]:checked').attr('class');
            if(choice == answer){
                // console.log('Câu có id: '+id+' đúng');
                mark += 1; // Mỗi câu đúng được công 1đ
            }
            else {
                // console.log('Câu có id: '+id+' sai');
            }


            // console.log('Điểm của bạn là: '+ mark);
            
            // console.log(formattedDate);
            $('#mark').text('Điểm của bạn là: ' + mark);

            
        
            // B3: Đánh dấu đáp án đúng để người dùng đối chiếu  
            $('#question_'+id+' > fieldset > div > label.'+answer).css("background-color","rgb(142, 255, 176)","!important");
            // $('#question_'+id+' > fieldset > div > label.'+choice).css("background-color","rgb(255, 121, 121)");
        });
        
    };
        
    function GetQuestions(){
        $.ajax({
                url:'questions.php', 
                type:'get',
                success:function(data){
                    questions = jQuery.parseJSON(data); 
                    let index = 1;
                    let d = '';
                    $.each(questions,function(k,v){
                        d+= '<div class="row" style="margin-left: 10px;" id="question_'+v['id']+'">';
                        d+= '<h3 style="font-weight: bold;" id="'+v['id']+'"> <span class="text-success">Câu '+index+': </span> '+v['question']+'</h3>';
                        d+= '<fieldset id="group'+index+'">';
                        d+= '<div class="radio col-sm-12">';
                        d+= '<label class="A"><input type="radio" name="group'+index+'" class="A" style="width:16px;height:16px"><span style="font-weight:bold;">A. </span> '+v['option_a']+'</label>';
                        d+= '</div>';

                        d+= '<div class="radio col-sm-12">';
                        d+= '    <label class="B"><input type="radio" name="group'+index+'" class="B" style="width:16px;height:16px"><span style="font-weight:bold;">B. </span> '+v['option_b']+'</label>';
                        d+= '</div>';

                        d+= '<div class="radio col-sm-12">';
                        d+= '    <label class="C"><input type="radio" name="group'+index+'" class="C" style="width:16px;height:16px"><span style="font-weight:bold;">C. </span> '+v['option_c']+'</label>';
                        d+= '</div>';

                        d+= '<div class="radio col-sm-12">';
                        d+= '    <label class="D"><input type="radio" name="group'+index+'" class="D" style="width:16px;height:16px"><span style="font-weight:bold;">D. </span> '+v['option_d']+'</label>';
                        d+= '</div>';
                        d+= '</fieldset>';
                        d+= '</div>';  
                        index++;
                    });

                    $('#questions').html(d);
                }
        });
    }




    // Đếm ngược thời gian làm bài 
    const startingMinutes = 5;
    let time = startingMinutes*60;
    const countdownEl = document.getElementById('countdown');

    function updateCountdown(){
        const minutes = Math.floor(time/60);
        let seconds = time%60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        countdownEl.innerHTML = `${minutes}:${seconds}`;
        if(time>0){
            time--;
        }
        else{

            // clearInterval(setInterval(updateCountdown, 1000));
            finish();
            stopTimer ();
            // clearInterval(setInterval(updateCountdown, 1000));
        }
    }
    function startTimer (){
        // const myInterval = setInterval(updateCountdown, 1000);

        setInterval(updateCountdown, 1000);
        // const myInterval = setInterval(updateCountdown, 1000);
    }
    const myInterval = setInterval(updateCountdown, 1000);
    // clearInterval(setInterval(updateCountdown, 1000));
    function stopTimer (){
        // const myInterval = setInterval(updateCountdown, 1000);
        clearInterval(myInterval);
    }
    


    // Lưu điểm người dùng
    $('#btnSave').click(function(){
        var time_exam = formattedDate;
        // var email_user = sessionStorage.getItem('email');

        $.ajax({
            url:'save_score.php',
            type:'post',
            data:{
                name:name,
                mark:mark,
                time_exam:time_exam,
                email_user:email_user,
            },
            success:function(data){
                alert(data);
                location.replace("http://localhost:81/dethi_tracnghiem/user/take_exam/fix_countdown.php");
            }
        })
        
    });

</script>




