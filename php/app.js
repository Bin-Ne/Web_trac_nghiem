// Jquerry để ẩn hiện mật khẩu
$(document).ready(function(){
    $('.eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye')
        if($(this).hasClass('open')){
            // alert('Change type text');
            $(this).prev().attr('type', 'text');
        }
        else{
            $(this).prev().attr('type', 'password');
        }
    });
});



//Validate form register
// var name = document.querySelector('.username')
// var email = document.querySelector('.email')
// var password = document.querySelector('.password')
// var repassword = document.querySelector('.repassword')
// var form = document.querySelector('form')

// function showError(input, message) {
//     let parent = input.parentElement;
//     let small = parent.querySelector('small');
//     parent.classList.add('error');
//     small.innerText = message
// }

// function showSuccess(input) {
//     let parent = input.parentElement;
//     let small = parent.querySelector('small');
//     parent.classList.remove('error');
//     small.innerText = ''
// }

// function checkEmptyError(listInput) {
//     let isEmptyError = false;
//     listInput.forEach(input => {
//         input.value = input.value.trim()

//         if (!input.value) {
//             isEmptyError = true;
//             showError(input, 'Không được để trống!')
//         }
//         else {
//             showSuccess(input)
//         }
//     });
//     return isEmptyError
// }


// function checkUsernameError(input) {
//     const regexUsername =  '^[a-zA-Z0-9\+]*$'
//     input.value = input.value.trim()

//     let isUsernameError = !regexUsername.test(input.value)
//     if (regexUsername.test(input.value)) {
//         showSuccess(input)
//     }
//     else {
//         showError(input, 'Username không hợp lệ!')
//     }

//     return isUsernameError
// }

// function checkEmailError(input) {
//     const regexEmail =
//         /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
//     input.value = input.value.trim()

//     let isEmailError = !regexEmail.test(input.value)
//     if (regexEmail.test(input.value)) {
//         showSuccess(input)
//     }
//     else {
//         showError(input, 'Email không hợp lệ!')
//     }

//     return isEmailError
// }

// function checkLengthError(input, min, max) {
//     input.value = input.value.trim()
//     if (input.value.length < min) {
//         showError(input, `Phải có ít nhất ${min} kí tự`)
//         return true
//     }

//     if (input.value.length > max) {
//         showError(input, `Không được quá ${max} kí tự`)
//         return true
//     }

//     showSuccess(input)
//     return false
// }

// function checkMatchPassError(passInput, repassInput) {
//     if (passInput.value !== repassInput.value) {
//         showError(repassInput, 'Mật khẩu không trùng khớp')
//         return true
//     }

//     return false
// }

// form.addEventListener('submit', function (e) {
//     e.preventDefault()

//     checkEmptyError([username, email, password, repassword])
//     checkEmailError(email)
//     checkUsernameError(username)
//     checkLengthError(username, 6, 15)
//     checkLengthError(password, 6, 15)
//     checkMatchPassError(password, repassword)



//     // let isEmptyError = checkEmptyError([username, email, password, repassword])
//     // let isEmailError = checkEmailError(email)
//     // // let isUsernameError = checkUsernameError(username)
//     // let isUsernameLengthError = checkLengthError(username, 6, 15)
//     // let isPassLengthError = checkLengthError(password, 6, 15)
//     // let isMatchError = checkMatchPassError(password, repassword)
//     // // let isRePassLengthError = checkLengthError(repassword)

//     // if (isEmptyError || isEmailError || isUsernameLengthError || isPassLengthError || isMatchError) {
//     //     // do nothing
//     // }

//     // else {
//     //     // do
//     // }
// })


 