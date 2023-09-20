<div class="modal" tabindex="-1" role="dialog" id="modalQuestion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h2 class="modal-title" style="font-weight:bold;">CẬP NHẬT THÔNG TIN </h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>

        <div class="modal-body" style="font-size: 18px;">
            <!-- Modal thêm câu hỏi -->
            <input type="hidden" id="txtUserId">

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Vai trò</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaRole" rows="1" placeholder="Vai trò"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Tên người dùng</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaName" rows="1" placeholder="Tên người dùng"  pattern="[a-zA-Z0-9_-]{4,16}" required></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Email</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaEmail" rows="1" placeholder="Email"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Mật khẩu</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaPassword" rows="1" placeholder="Mật khẩu"></textarea>
            </div>
  
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnSubmit">Xác nhận</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('#btnSubmit').click(function(){
        
        let role = $('#txaRole').val(); // lấy giá trị textarea có id là txaQuestion gán cho biến question
        let name = $('#txaName').val();
        let email = $('#txaEmail').val();
        let password = $('#txaPassword').val();

        // Ràng buộc dữ liệu
        if(name.length == 0 || email.length == 0 || password.length == 0){
            alert('Vui lòng nhập đầy đủ câu hỏi và đáp án!');
            return;
        }

        let UserId = $('#txtUserId').val();

        if(UserId.length == 0){ // trường hợp thêm mới câu hỏi
            // Liên kết với file add_question để thêm câu hỏi
            $.ajax({
                url:'add_question.php',
                type:'post',
                data:{
                    role:role,
                    name:name,
                    email:email,
                    password:password,
                },
                success:function(data){
                    alert(data); 
                    $('#modalQuestion').modal('hide');

                    // reset lại giá trị cho các textarea
                    $('#txaRole').val().trim();
                    $('#txaName').val().trim();
                    $('#txaEmail').val().trim();
                    $('#txaPassword').val().trim();

                    $('#btnSearch').click();
                    // ReadData($('txtSearch').val()); // cập nhật lại ds câu hỏi
                }
            })
        }

        else{ // Trường hợp cập nhật thông tin người dùng
            $.ajax({
                url:'update.php',
                type:'post',
                data:{
                    id:UserId,
                    role:role,
                    name:name,
                    email:email,
                    password:password,
                },
                success:function(data){
                    alert(data); 
                    $('#modalQuestion').modal('hide'); // ẩn modal sau khi update

                    $('#btnSearch').click();
                    // ReadData(); // cập nhật lại ds câu hỏi
                    // // reset lại giá trị cho các textarea
                    // $('#txaQuestion').val().trim();
                    // $('#txaOptionA').val().trim();
                    // $('#txaOptionB').val().trim();
                    // $('#txaOptionC').val().trim();
                    // $('#txaOptionD').val().trim();

                    // // reset lại giá trị của radio
                    // $('#rdOptionA').prop('checked',false);
                    // $('#rdOptionB').prop('checked',false);
                    // $('#rdOptionC').prop('checked',false);
                    // $('#rdOptionD').prop('checked',false);

                }
            })
        }

    });
</script>