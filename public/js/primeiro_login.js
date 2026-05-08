const senha = document.getElementById("nova_senha");
const confirmar = document.getElementById("confirmar_senha");
const mostrarSenha = document.getElementById("mostrarSenha");
const popup = document.getElementById("popup");
const popupTitle = document.getElementById("popup-title");
const popupMessage = document.getElementById("popup-message");
const popupCard = document.querySelector(".popup-card");
const popupClose = document.getElementById("popup-close");
const popupOk = document.getElementById("popup-ok");
let redirectTo = null;

function showPopup(message, type) {
    if (!popup || !popupTitle || !popupMessage || !popupCard) {
        alert(message);
        return;
    }

    if (type === "success") {
        popupTitle.textContent = "Tudo certo";
        popupCard.classList.add("is-success");
        popupCard.classList.remove("is-error");
    } else {
        popupTitle.textContent = "Atenção";
        popupCard.classList.add("is-error");
        popupCard.classList.remove("is-success");
    }

    popupMessage.textContent = message;
    popup.classList.add("is-active");
    popup.setAttribute("aria-hidden", "false");
}

function hidePopup() {
    if (popup) {
        popup.classList.remove("is-active");
        popup.setAttribute("aria-hidden", "true");
    }
    if (redirectTo) {
        const next = redirectTo;
        redirectTo = null;
        window.location.href = next;
    }
}

function validarSenha() {

    const valor = senha.value;
    const valorConfirmar = confirmar.value;

    const regras = {

        tamanho: valor.length >= 8,

        maiuscula: /[A-Z]/.test(valor),

        minuscula: /[a-z]/.test(valor),

        numero: /[0-9]/.test(valor),

        especial: /[^A-Za-z0-9]/.test(valor),

        confirmacao:
            valor !== "" &&
            valor === valorConfirmar

    };

    atualizarRegra("regra-tamanho", regras.tamanho);
    atualizarRegra("regra-maiuscula", regras.maiuscula);
    atualizarRegra("regra-minuscula", regras.minuscula);
    atualizarRegra("regra-numero", regras.numero);
    atualizarRegra("regra-especial", regras.especial);
    atualizarRegra("regra-confirmacao", regras.confirmacao);

    return Object.values(regras).every(v => v);

}

function atualizarRegra(id, ok) {

    const el = document.getElementById(id);

    if (ok) {

        el.classList.add("ok");

    } else {

        el.classList.remove("ok");

    }

}

senha.addEventListener("input", validarSenha);
confirmar.addEventListener("input", validarSenha);
if (mostrarSenha) {
    mostrarSenha.addEventListener("change", () => {
        const tipo = mostrarSenha.checked ? "text" : "password";
        senha.type = tipo;
        confirmar.type = tipo;
    });
}

document
.getElementById("trocarSenha")
.addEventListener("submit", async (e) => {

    e.preventDefault();

    if (!validarSenha()) {

        showPopup("Senha não atende aos requisitos.", "error");
        return;

    }

    const form = e.target;

    const response = await fetch(
        "/empregameto/api/controllers/mudar_senha.php",
        {
            method: "POST",
            body: new FormData(form)
        }
    );

    const data = await response.json();

    if (data.ok) {

        redirectTo = "/empregameto/public/html/login.html";
        showPopup("Senha alterada com sucesso!", "success");



    } else {

        showPopup(data.message || "Erro ao alterar senha.", "error");

    }

});

if (popupClose) popupClose.addEventListener("click", hidePopup);
if (popupOk) popupOk.addEventListener("click", hidePopup);
if (popup) {
    popup.addEventListener("click", (e) => {
        if (e.target === popup) hidePopup();
    });
}
