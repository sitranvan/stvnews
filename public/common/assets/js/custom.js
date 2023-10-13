const buttonRegister = document.querySelector('.btn-register')
const checkTerms = document.querySelector('.check-terms');


// Còn lỗi khi đã đăng ký thành công back lại thì checkbox được checked như button lại disable
if (checkTerms) {

    checkTerms.addEventListener('click', () => {
        if (buttonRegister) {
            if (checkTerms.checked == true) {
                buttonRegister.removeAttribute('disabled')

            } else {
                buttonRegister.setAttribute('disabled', '')

            }
        }
    })

}    
