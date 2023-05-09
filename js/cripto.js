function toHash(){
    
    var form_login = document.getElementById("InputEmail");
    var form_senha = document.getElementById("InputPassword");
    var hash_key = document.getElementById("sessHash");
    let form = document.getElementById('UserForm');

    if (form_login.value == '' || form_senha.value ==''){
        alert("Preencha todos os campos!");
        window.location.href('login.php');
    }



    const criptoKey = '0cb1d8445ff50b8ef17e2fe20a1bf0031a2bb7229c449b7df28e19293b49c800'
    let inputs = document.querySelectorAll('input');

    var senha = inputs[1].value.split('').reverse();
    var email = inputs[0].value.split('').reverse();

    
    
    let mail_hash = '';
    let pass_hash = '';
    let date_hash = ''

    let i = 0;
    email.forEach(element => {
        mail_hash += element;
        mail_hash += criptoKey[i];
        i ++;

    })

    i = 0;

    senha.forEach(element => {
        pass_hash += element;
        pass_hash += criptoKey[i];
        i ++;
    });

    i = 0;



    sess_hash = sausage+mail_hash+'/'+pass_hash+sausage;

    
    hash_key.value = sess_hash;
    // form_login.value = '';
    form.submit();
}