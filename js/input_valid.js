const valids = {};

const inputs = document.querySelectorAll('.form-control');

const listaclass = 'form-control form-control-user';
let invalid = listaclass + ' is-invalid';
let valid = listaclass + ' is-valid';
mail_exp = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
pass_exp = new RegExp("^(?=.*[A-Z])(?=.*[!#@$%&])(?=.*[0-9])(?=.*[a-z]).{6,15}$");


function validInput(id){
    let field = inputs[id];
    if(id == 0){
        if (field.value.length < 8){
            field.classList['value'] = invalid;
            document.getElementById(field.placeholder+'-valid').innerHTML = 'O nome deve ter 8 ou mais caracteres!';
            valids[field.placeholder] = false;
        }else{
            field.classList['value'] = valid;
            valids[field.placeholder] = true;
            
        }
    }else if (id == 1){
        if (!mail_exp.test(field.value)){
            field.classList['value'] = invalid;
            document.getElementById(field.placeholder+'-valid').innerHTML = 'Digite um e-mail válido!';
            valids[field.placeholder] = false; 
        }else{
            field.classList['value'] = valid;
            valids[field.placeholder] = true;
        }
    }else if (id == 2){
        if (!pass_exp.test(field.value)){
            field.classList['value'] = invalid;
            document.getElementById(field.placeholder+'-valid').innerHTML = "<ul style='padding: 0; margin: 0;'><b>A sua senha deve ter:</b></ul><li>Entre 6 e 15 caracteres</li><li>Letras maiúsculas, minúsculas, números e símbolos.</li></ul>";
            valids[field.placeholder] = false; 
        }else{
            field.classList['value'] = valid;
            valids[field.placeholder] = true;
        }
    }else{
        if (!field.value == inputs[2].value){
            field.classList['value'] = invalid;
            document.getElementById(field.placeholder+'-valid').innerHTML = "As senhas não coincidem!";
            valids[field.placeholder] = false; 
        }else{
            field.classList['value'] = valid;
            valids[field.placeholder] = true;
        }
    }
};

