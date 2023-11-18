document.addEventListener('DOMContentLoaded', () => {
    var botao = document.querySelector("#verifica");
    botao.onclick = verifica;
    var botaolimpa = document.getElementById('limpa');
    botaolimpa.onclick = limpa;
    var botaolimpa2 = document.getElementById('limpa2');
    botaolimpa2.onclick = limpa;
    var botaoedita = document.getElementById('edita');
    botaoedita.onclick = fecha;

});

function limpa() {
    const spans = document.querySelectorAll('span');
        for(let span of spans){
            span.textContent = "";
        }

}

function fecha() {
    var apresentacao = document.getElementById('escondida');
    apresentacao.style.display = 'none';
}

function verifica(){

    var flag = true;

    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const checks = document.querySelectorAll("input[name='checks']");
    const radio = document.querySelector("input[name='opcoes']:checked");
    const texto = document.getElementById('areaTexti');

    const spans = document.querySelectorAll('span');

    const spanNome = spans[0];
    const spanEmail = spans[1];
    const spanCheck = spans[2];
    const spanText = spans[3];

    for(let span of spans){
        span.textContent = "✔";
        span.style.color = 'red';
    }

    nome.value = escapeInput(nome.value)
    email.value = escapeInput(email.value)
    texto.value = escapeInput(texto.value)
       
    if(nome.value.length > 100 ) {
        spanNome.textContent = 'O nome não pode conter mais de 100 caracteres';
        flag = false;
    }

    else if(nome.value.length == 0) {
        spanNome.textContent = 'Por favor insira seu nome';
        flag = false;
    }


    var emaillength = email.value.length;


    if(emaillength > 100 ) {
        spanEmail.textContent = 'O email não pode conter mais de 100 caracteres';
        flag = false;
    }

    else if(emaillength == 0) {
        spanEmail.textContent = 'Por favor insira seu email';
        flag = false;
    }
    else if (!email.value.includes('@') || !email.value.includes('.')) {
        spanEmail.textContent = 'Por favor insira um email válido';
        flag = false;
    }
    else if(email.value.indexOf('@') > email.value.indexOf('.') || email.value.indexOf('@') == 0 || email.value.indexOf('.') == emaillength-1) {
        spanEmail.textContent = 'Por favor insira um email válido';
        flag = false;
    }
    

    const opcoesSelecionadas = [];
    let flag1 = false;
    for(let check of checks){
        if(check.checked){
            flag1 = true;
            label = document.querySelector('label[for="'+check.id+'"]');
            opcoesSelecionadas.push(label.textContent);
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

    const opcao = radio.nextElementSibling.textContent;
    
    if(flag){
        apresentar(nome.value, email.value, opcoesSelecionadas, opcao, texto.value);
        flag = false;
    }
    

    return flag;
}

function apresentar(nome, email, assunto, opcoes, texto){
    const flag = false;
    var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
    myModal.show();
    const span = document.querySelectorAll('span[name="spans"]');

    for(let spans of span){
        spans.style.color = 'rgb(0, 112, 97)';
    }

    span[0].textContent = nome;
    span[1].textContent = email;
    var assuntospan = "";
    for(let assuntos of assunto){
        assuntospan += "<br>"+assuntos;
    }
    span[2].innerHTML = assuntospan;
    span[3].textContent = opcoes;
    span[4].textContent = texto;

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