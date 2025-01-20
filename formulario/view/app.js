function validateNumber(number) {
    const sanitizedNumber = number.replace(/\D/g, '');
    if (sanitizedNumber.length < 10 || sanitizedNumber.length > 11) {
        return false;
    }
    return true;
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}

function validateName(name) {
    const namePattern = /^[a-zA-Z\s]+$/;
    return namePattern.test(name);
}

document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;
    const email = document.getElementById("email").value;

    if (!validateName(name)) {
        alert("Erro: O nome não pode conter números ou estar vazio.");
        return;
    }

    if (!validateNumber(phone)) {
        alert("Erro: O número de telefone deve ter 10 ou 11 dígitos.");
        return;
    }

    if (!validateEmail(email)) {
        alert("Erro: O formato do e-mail é inválido ou o campo está vazio.");
        return;
    }

    alert("Formulário enviado com sucesso!");
    this.submit();
});