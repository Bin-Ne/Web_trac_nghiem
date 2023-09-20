<div class="modal" tabindex="-1" role="dialog" id="modalQuestion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h2 class="modal-title" style="font-weight:bold;">Cập nhật thông tin</h2>
      </div>

        <div class="modal-body" style="font-size: 20px;">
            <!-- Modal thêm câu hỏi -->
            <input type="hidden" id="txtQuestionId">

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Tên người dùng</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaQuestion" rows="1" placeholder="Tên người dùng"></textarea>
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left:6px">Email</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaOptionA" rows="1" placeholder="Email"></textarea>
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left:6px">Vai trò</label>
                <textarea style="font-size: 18px;" class="form-control" id="txaOptionB" rows="1" placeholder="Vai trò"></textarea>
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
        let name = $('#txaQuestion').val(); // lấy giá trị textarea có id là txaQuestion gán cho biến question
        let email = $('#txaOptionA').val();
        let role = $('#txaOptionB').val();

        // Ràng buộc dữ liệu
        // if(name.length == 0 || option_a.length == 0 || option_b.length == 0 || option_c.length == 0 || option_d.length == 0){
        //     alert('Vui lòng nhập đầy đủ câu hỏi và đáp án!');
        //     return;
        // }

        let id = $('#txtQuestionId').val();

        if(id.length == 0){ // trường hợp thêm mới câu hỏi
            // Liên kết với file add_question để thêm câu hỏi
            // $.ajax({
            //     url:'add_question.php',
            //     type:'post',
            //     data:{
            //         question:question,
            //         option_a:option_a,
            //         option_b:option_b,
            //         option_c:option_c,
            //         option_d:option_d,
            //         answer:answer
            //     },
            //     success:function(data){
            //         alert(data); 
            //         $('#modalQuestion').modal('hide');

            //         // reset lại giá trị cho các textarea
            //         $('#txaQuestion').val().trim();
            //         $('#txaOptionA').val().trim();
            //         $('#txaOptionB').val().trim();
            //         $('#txaOptionC').val().trim();
            //         $('#txaOptionD').val().trim();

            //         // reset lại giá trị của radio
            //         $('#rdOptionA').prop('checked',false);
            //         $('#rdOptionB').prop('checked',false);
            //         $('#rdOptionC').prop('checked',false);
            //         $('#rdOptionD').prop('checked',false);

            //         $('#btnSearch').click();
            //         // ReadData($('txtSearch').val()); // cập nhật lại ds câu hỏi
            //     }
            // })
        }

        else{
            $.ajax({
                url:'update.php',
                type:'post',
                data:{
                    id:id,
                    name:name,
                    email:email,
                    role:role,
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