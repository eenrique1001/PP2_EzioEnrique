document.onload = () => {
    alert('sssss');
    var botao = document.querySelector("#verifica")
    botao.onclick = verifica;
}

function verifica(){

    var flag = true;

    const formulario = document.querySelector('form');
    const nome = formulario.getElementById('nome');
    const email = formulario.getElementById('email');

    const spanNome = nome.nextSibling;
    const spanEmail = email.nextSibling;
    const spanCheck = formulario[1].lastChild;
    const spanText = formulario[3].lastChild;

    spanNome.textContent = "";
    spanEmail.textContent = "";
    spanCheck.textContent = "";
    spanText.textContent = "";
    

    if(nome.value.length() > 5){
        spanNome.textContent = "O nome não pode conter mais de 100 caracteres!"
        flag = false;
    }
}