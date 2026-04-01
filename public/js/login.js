function ativarloading() {
    const btn = document.getElementById('btn-submit');
    const overlay = document.getElementById('loading-overlay');

    if (btn) btn.disabled = true;
    if (overlay) {
        overlay.classList.add('is-active');
        overlay.setAttribute('aria-hidden', 'false');
    }
}

function desativarloading() {
    const btn = document.getElementById('btn-submit');
    const overlay = document.getElementById('loading-overlay');

    if (btn) btn.disabled = false;
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

function validarLogin(event) {
    event.preventDefault();

    const form = document.getElementById('login-form');
    if (!form) return;

    const email = (form.querySelector('[name="email"]')?.value || '').trim();
    const senha = (form.querySelector('[name="senha"]')?.value || '').trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email || !senha) {
        showPopup('Por favor, preencha e-mail e senha.', 'error');
        return;
    }

    if (!regexEmail.test(email)) {
        showPopup('Por favor, insira um e-mail válido.', 'error');
        return;
    }

    ativarloading();

    fetch('/empregameto/api/controllers/login.php', {
        method: 'POST',
        body: new FormData(form)
    })
        .then(async (res) => {
            const data = await res.json().catch(() => ({}));
            if (!res.ok || !data.ok) {
                throw new Error(data.message || 'Falha no login. Verifique suas credenciais.');
            }
            if(data.primeiro_login == 1){

                window.location.href = '/empregameto/public/html/primeiro_login.php';  

                return;
            }

            if (data.tipo === 'admin') {
                window.location.href = '/empregameto/admin.php';
            } else {
                window.location.href = '/empregameto/usuario.php';
            }
        })
        .catch((err) => {
            showPopup(err.message, 'error');
        })
        .finally(() => {
            desativarloading();
        });
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('login-form');
    if (form) form.addEventListener('submit', validarLogin);

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
