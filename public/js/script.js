function ativarloading() {
    const btn = document.getElementById('btn-submit');
    const overlay = document.getElementById('loading-overlay');

    btn.disabled = true;
    if (overlay) {
        overlay.classList.add('is-active');
        overlay.setAttribute('aria-hidden', 'false');
    }
}

function desativarloading() {
    const btn = document.getElementById('btn-submit');
    const overlay = document.getElementById('loading-overlay');

    btn.disabled = false;
    if (overlay) {
        overlay.classList.remove('is-active');
        overlay.setAttribute('aria-hidden', 'true');
    }
}

function showPopup(message, type) {
    const popup = document.getElementById('popup');
    const title = document.getElementById('popup-title');
    const text = document.getElementById('popup-message');
    const card = document.querySelector('.popup-card');

    if (!popup || !title || !text || !card) {
        alert(message);
        return;
    }

    if (type === 'success') {
        title.textContent = 'Tudo certo';
        card.classList.add('is-success');
        card.classList.remove('is-error');
    } else {
        title.textContent = 'Atenção';
        card.classList.add('is-error');
        card.classList.remove('is-success');
    }

    text.textContent = message;
    popup.classList.add('is-active');
    popup.setAttribute('aria-hidden', 'false');
}

function hidePopup() {
    const popup = document.getElementById('popup');
    if (popup) {
        popup.classList.remove('is-active');
        popup.setAttribute('aria-hidden', 'true');
    }
}

function validarform(event){

    event.preventDefault();
    const form = event.target;
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('telefone').value;
    const idade = document.getElementById('idade').value;
    const curso = document.getElementById('curso').value;
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regexTelefone = /^\(\d{2}\) \d{5}-\d{4}$/;

    if(nome === '' || email === '' || telefone === '' || idade === '' || curso === ''){
        showPopup('Por favor, preencha todos os campos obrigatórios.', 'error');
        return false;
    }

    if(!regexEmail.test(email)){
        showPopup('Por favor, insira um email válido.', 'error');
        return false;
    }

    if(!regexTelefone.test(telefone)){
        showPopup('Por favor, insira um telefone válido.', 'error');
        return false;
    }

    ativarloading();

    fetch('/empregameto/api/routes/inscrever.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(async (res) => {
        const data = await res.json().catch(() => ({}));
        if (!res.ok || !data.ok) {
            throw new Error(data.message || 'Não foi possível concluir sua inscrição.');
        }
        window.location.href = '/empregameto/public/html/sucesso.html';
    })
    .catch((err) => {
        showPopup(err.message, 'error');
    })
    .finally(() => {
        desativarloading();
    });

    return false;
}

document.addEventListener('DOMContentLoaded', () => {
    // detect Firefox and add class for CSS fallback
    try {
        if (navigator.userAgent && navigator.userAgent.toLowerCase().includes('firefox')) {
            document.documentElement.classList.add('is-firefox');
        }
    } catch (e) {}
    const closeBtn = document.getElementById('popup-close');
    const okBtn = document.getElementById('popup-ok');
    const popup = document.getElementById('popup');

    if (closeBtn) closeBtn.addEventListener('click', hidePopup);
    if (okBtn) okBtn.addEventListener('click', hidePopup);
    if (popup) {
        popup.addEventListener('click', (e) => {
            if (e.target === popup) hidePopup();
        });
    }
});


    