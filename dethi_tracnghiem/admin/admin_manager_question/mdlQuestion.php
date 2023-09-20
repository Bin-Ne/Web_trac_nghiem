<div class="modal" tabindex="-1" role="dialog" id="modalQuestion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h1 class="modal-title">Thông tin câu hỏi</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>

        <div class="modal-body" style="font-size: 18px;">
            <!-- Modal thêm câu hỏi -->
            <input type="hidden" id="txtQuestionId">

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Thêm câu hỏi</label>
                <textarea class="form-control" id="txaQuestion" rows="1" placeholder="Câu hỏi"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Đáp án A</label>
                <textarea class="form-control" id="txaOptionA" rows="1" placeholder="Đáp án A"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Đáp án B</label>
                <textarea class="form-control" id="txaOptionB" rows="1" placeholder="Đáp án B"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Đáp án C</label>
                <textarea class="form-control" id="txaOptionC" rows="1" placeholder="Đáp án C"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:6px">Đáp án D</label>
                <textarea class="form-control" id="txaOptionD" rows="1" placeholder="Đáp án D"></textarea>
            </div>

            <hr class="clearfix">

            <div class="form-group">
                <div class="row">
                    <div class="radio col-sm-3">
                        <label><input type="radio" name="optradio" id="rdOptionA" style="width:16px;height:16px">Đáp án A</label>
                    </div>

                    <div class="radio col-sm-3">
                        <label><input type="radio" name="optradio" id="rdOptionB" style="width:16px;height:16px">Đáp án B</label>
                    </div>

                    <div class="radio col-sm-3">
                        <label><input type="radio" name="optradio" id="rdOptionC" style="width:16px;height:16px">Đáp án C</label>
                    </div>

                    <div class="radio col-sm-3">
                        <label><input type="radio" name="optradio" id="rdOptionD" style="width:16px;height:16px">Đáp án D</label>
                    </div>
                </div>
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
        let question = $('#txaQuestion').val(); // lấy giá trị textarea có id là txaQuestion gán cho biến question
        let option_a = $('#txaOptionA').val();
        let option_b = $('#txaOptionB').val();
        let option_c = $('#txaOptionC').val();
        let option_d = $('#txaOptionD').val(); 
        let answer = $('#rdOptionA').is(':checked')?'A':$('#rdOptionB').is(':checked')?'B':
        $('#rdOptionC').is(':checked')?'C':$('#rdOptionD').is(':checked')?'D':'';
        // console.log(question,option_a,option_b,option_c,option_d, answer);    


        // Ràng buộc dữ liệu
        if(question.length == 0 || option_a.length == 0 || option_b.length == 0 || option_c.length == 0 || option_d.length == 0){
            alert('Vui lòng nhập đầy đủ câu hỏi và đáp án!');
            return;
        }
        if(answer.length == 0){
            alert('Vui lòng chọn đáp án đúng!');
            return;
        }

        let questionId = $('#txtQuestionId').val();

        if(questionId.length == 0){ // trường hợp thêm mới câu hỏi
            // Liên kết với file add_question để thêm câu hỏi
            $.ajax({
                url:'add_question.php',
                type:'post',
                data:{
                    question:question,
                    option_a:option_a,
                    option_b:option_b,
                    option_c:option_c,
                    option_d:option_d,
                    answer:answer
                },
                success:function(data){
                    alert(data); 
                    $('#modalQuestion').modal('hide');

                    // reset lại giá trị cho các textarea
                    $('#txaQuestion').val().trim();
                    $('#txaOptionA').val().trim();
                    $('#txaOptionB').val().trim();
                    $('#txaOptionC').val().trim();
                    $('#txaOptionD').val().trim();

                    // reset lại giá trị của radio
                    $('#rdOptionA').prop('checked',false);
                    $('#rdOptionB').prop('checked',false);
                    $('#rdOptionC').prop('checked',false);
                    $('#rdOptionD').prop('checked',false);

                    $('#btnSearch').click();
                    // ReadData($('txtSearch').val()); // cập nhật lại ds câu hỏi
                }
            })
        }

        else{ // Cập nhật câu hỏi đã có
            $.ajax({
                url:'update.php',
                type:'post',
                data:{
                    id:questionId,
                    question:question,
                    option_a:option_a,
                    option_b:option_b,
                    option_c:option_c,
                    option_d:option_d,
                    answer:answer
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