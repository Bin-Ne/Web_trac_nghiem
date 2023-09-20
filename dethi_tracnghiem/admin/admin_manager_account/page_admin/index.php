<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thư viện jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Admin</title>

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
                <a class="navbar-brand brand-bin" style="margin-right:60px;font-size:28px;font-weight:bold;color:#fff" href="http://localhost:81/home_page/home_page_admin/home_page.php">
                    Trang chủ
                </a>
            </div>
         
            <div class="collapse navbar-collapse" id="myNavbar">
                
                <ul class="nav navbar-nav nav-bin">
                    <li><a href="http://localhost:81/dethi_tracnghiem/admin/admin_manager_question/">Quản lí câu hỏi</a></li>
                    <li><a href="http://localhost:81/dethi_tracnghiem/admin/admin_manager_mark/">Quản lí điểm</a></li>
                    <li class="active"><a href="">Quản lí tài khoảng</a></li>
                </ul>

                <!-- <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                </ul> -->
            </div>
        </div>
    </nav> 


    <div class="container container-bin" style="font-size: 20px;">
        <div class="row">

            <!-- Phần tìm kiếm -->
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="txtSearch"  style="font-size: 20px;"/>
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit" id="btnSearch">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Phần phân trang -->
            <div class="col-sm-6">
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="pagination" style="margin-top:0px;margin-left:100px;">
                        <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                         
                        
                        <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                    </ul>
                </nav>
            </div>

            <div class="col-sm-2 text-right">
                <button id="btnQuestion" class="btn btn-success btn-lg" style="font-size:18px;font-weight:bold;">+</button>
            </div>
        </div>

        <table class="table table-striped" style="margin-top: 40px;">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Lịch sử thi</th>
                </tr>
            </thead>
            <tbody id="questions">
                
            </tbody>
        </table>
    </div>
</body>
</html>

<?php include('mdlQuestion.php') ?>

<script type="text/javascript">
    var page = 1;

    // Trong sự kiện trang được load xong thì gọi tới hàm load ds câu hỏi
    $(document).ready(function(){
        
        // ReadData();
        $('#btnSearch').click();
    })

    $('#btnQuestion').click(function(){
        // Khi thêm mới mặc định id của câu hỏi là một chuỗi trống
        $('#txtUserId').val('');

        // set các giá trị mặc định cho các input khi thêm mới
        $('#txaRole').val('');
        $('#txaName').val('');
        $('#txaEmail').val('');
        $('#txaPassword').val('');

        $('#modalQuestion').modal();
    })

    $('#btnSearch').click(function(){
        let search = $('#txtSearch').val().trim(); 
        ReadData(search);
        Pagination(search);
    });

    // $("input[name='view']").click(function() {
    //     // var bid = this.id; // button ID 
    //     var trid = $(this).closest('tr').attr('id'); // Lấy id của dòng được chọn trên table khi click vào button có tên là view
    //     GetDetail(trid); // Lấy dữ liệu câu hỏi dựa vào id tìm được ở trên và đỗ dữ liệu cho input

    //     // Click button view chỉ xem không cho chỉnh sửa
    //     $('#txaQuestion').attr('readonly','readonly');
    //     $('#txaOptionA').attr('readonly','readonly');
    //     $('#txaOptionB').attr('readonly','readonly');
    //     $('#txaOptionC').attr('readonly','readonly');
    //     $('#txaOptionD').attr('readonly','readonly');

    //     $('#rdOptionA').attr('disabled','readonly');
    //     $('#rdOptionB').attr('disabled','readonly');
    //     $('#rdOptionC').attr('disabled','readonly');
    //     $('#rdOptionD').attr('disabled','readonly');

    //     $('#btnSubmit').hide();
    // });

    // $("input[name='update']").click(function() {
    //     // var bid = this.id; // button ID 
    //     var trid = $(this).closest('tr').attr('id'); // table row ID 
    //     GetDetail(trid);

    //     $('#txaQuestion').attr('readonly',false);
    //     $('#txaOptionA').attr('readonly',false);
    //     $('#txaOptionB').attr('readonly',false);
    //     $('#txaOptionC').attr('readonly',false);
    //     $('#txaOptionD').attr('readonly',false);

    //     $('#rdOptionA').attr('disabled',false);
    //     $('#rdOptionB').attr('disabled',false);
    //     $('#rdOptionC').attr('disabled',false);
    //     $('#rdOptionD').attr('disabled',false);

    //     $('#txtQuestionId').val(trid);

    //     $('#btnSubmit').show();
    // });

    // Xem câu hỏi
    $(document).on('click',"input[name='view']",function(){
        var bid = this.id; // button ID 
        var trid = $(this).closest('tr').attr('id'); // Lấy id của dòng được chọn trên table khi click vào button có tên là view
        GetDetail(trid); // Lấy dữ liệu câu hỏi dựa vào id tìm được ở trên và đỗ dữ liệu cho input

        // Click button view chỉ xem không cho chỉnh sửa
        $('#txaRole').attr('readonly','readonly');
        $('#txaName').attr('readonly','readonly');
        $('#txaEmail').attr('readonly','readonly');
        $('#txaPassword').attr('readonly','readonly');

        $('#btnSubmit').hide();
    });

    // Cập nhật câu hỏi
    $(document).on('click',"input[name='update']",function(){
        var trid = $(this).closest('tr').attr('id'); // table row ID 
        GetDetail(trid);

        $('#txaRole').attr('readonly',true);
        $('#txaName').attr('readonly',false);
        $('#txaEmail').attr('readonly',false);
        $('#txaPassword').attr('readonly',false);
        $('#txaOptionD').attr('readonly',false);

        $('#txtUserId').val(trid);

        $('#btnSubmit').show();
    });

    // Xóa câu hỏi
    $(document).on('click',"input[name='delete']",function(){
        var trid = $(this).closest('tr').attr('id'); // table row ID 
        if(confirm("Bạn muốn xóa tài khoảng này không!") == true){
            $.ajax({
                url:'delete.php', // Dẫn tới file delete.php để lấy dữ liệu câu hỏi
                type:'post',
                data:{
                    id:trid
                },
                success:function(data){
                    alert(data);
                    ReadData();
                }
            });
            location.reload();
        }
    });

    // Hàm load thông tin câu hỏi qua id 
    function GetDetail(id){
        $.ajax({
            url:'detail.php', // Dẫn tới file detail.php để lấy dữ liệu câu hỏi
            type:'get',
            data:{
                id:id
            },
            success:function(data){
                var q = jQuery.parseJSON(data);  // Ép dữ liệu trả về qua json
                $('#txaRole').val(q['role']); // set giá trị cho textarea có id là txaQuestion
                $('#txaName').val(q['name']);
                $('#txaEmail').val(q['email']);
                $('#txaPassword').val(q['password']);
                $('#modalQuestion').modal();
            }
        })
    }

    // Load ds câu hỏi
    function ReadData(search){
        $.ajax({
            url:'view.php', // Dẫn tới file detail.php để lấy dữ liệu câu hỏi
            type:'get',
            data:{
                search:search,
                page:page
            },
            success:function(data){
                // console.log(data);
                $('#questions').empty(); // set tbody trống trước khi đổ dữ liệu
                $('#questions').append(data);
            }
        });
    }

    $('#txtSearch').on('keypress', function (e) {
         if(e.which === 13){
            $('#btnSearch').click();
         }
   });


    $("#pagination").on("click", "li a", function(event) {
        event.preventDefault();
        page = $(this).text();
        ReadData($('#txtSearch').val());
    });


   function Pagination(search){
        $.ajax({
            url:'pagination.php', // Dẫn tới file detail.php để lấy dữ liệu câu hỏi
            type:'get',
            data:{
                search:search
            },
            success:function(data){
                console.log(data); 
                if(data <= 1){
                    $('#pagination').hide();
                }
                else{
                    $('#pagination').show();
                    $('#pagination').empty();
                    let pagi = '';
                    for(i = 1; i <= data; i++){
                        pagi += '<li class="page-item"><a class="page-link" href="#">'+i+'</a></li>'; 
                    }
                    $('#pagination').append(pagi);
                }
            }
        });
   }
</script>