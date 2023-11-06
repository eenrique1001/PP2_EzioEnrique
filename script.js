document.addEventListener('DOMContentLoaded', () => {
    var botao = document.querySelector("#verifica")
    botao.onclick = verifica;
});

function verifica(){

    var flag = true;

    const formulario = document.querySelector('form');
    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const checks = document.querySelectorAll("input[name='checks']")
    const texto = document.getElementById('areaTexti');

    const spans = document.querySelectorAll('span');

    const spanNome = spans[0];
    const spanEmail = spans[1];
    const spanCheck = spans[2];
    const spanText = spans[3];

    spanNome.textContent = "✔";
    spanEmail.textContent = "✔";
    spanCheck.textContent = "✔";
    spanText.textContent = "✔";

    for(let span of spans){
        span.style.color = 'red';
    }

    nome.value = escapeInput(nome.value)
    email.value = escapeInput(email.value)
    texto.value = escapeInput(texto.value)

    nome.value.toLowerCase();
    email.value.toLowerCase();
    texto.value.toLowerCase();
       
    if(nome.value.length > 100 ) {
        spanNome.textContent = 'O nome não pode conter mais de 100 caracteres';
        flag = false;
    }

    if(nome.value.length == 0) {
        spanNome.textContent = 'Por favor insira seu nome';
        flag = false;
    }


    var emaillength = email.value.length;

    if(emaillength > 100 ) {
        spanEmail.textContent = 'O email não pode conter mais de 100 caracteres';
        flag = false;
    }

    if(emaillength == 0) {
        spanEmail.textContent = 'Por favor insira seu email';
        flag = false;
    }
    else { 
        if (!email.value.includes('@', 1) || !email.value.includes('.', email.value.length-1)) {
            spanEmail.textContent = 'Por favor insira um email válido';
            flag = false;
        }
        else if(email.value.indexOf('@') > email.value.indexOf('.')){
            spanEmail.textContent = 'Por favor insira um email válido';
            flag = false;
        }
    }

    const opcoesSelecionadas = [];
    let flag1 = false;
    for(let check of checks){
        if(check.checked){
            flag1 = true;
            ocument.querySelector(`label[for="${check.id}"]`)
            opcoesSelecionadas.push(label);
        }
    }
    if(!flag1){
        spanCheck.textContent = 'Nenhuma opção selecionada';
        flag = false;
    }

    if(texto.value.length > 1000 ) {
        spanText.textContent = 'O texto não pode conter mais de 1000 caracteres';
        flag = false;
    }

    if(texto.value.length == 0) {
        spanText.textContent = 'Por favor insira sua dúvida ou sugestão';
        flag = false;
    }

    

    

    return flag;
}

function escapeInput(input) {
    return String(input)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
}