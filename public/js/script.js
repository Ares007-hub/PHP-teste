document.addEventListener("DOMContentLoaded", () => {
    const inputSenha = document.getElementById("senha");
    const btnToggle = document.getElementById("btnToggleSenha");
    const formLogin = document.getElementById("formLogin");
    const btnSubmit = document.getElementById("btnSubmit");

    // 1. Alternar visibilidade da senha
    btnToggle.addEventListener("click", () => {
        const tipoAtual = inputSenha.getAttribute("type");
        
        if (tipoAtual === "password") {
            inputSenha.setAttribute("type", "text");
            btnToggle.textContent = "Ocultar";
        } else {
            inputSenha.setAttribute("type", "password");
            btnToggle.textContent = "Mostrar";
        }
    });

    // 2. Feedback visual ao enviar e prevenção de duplo clique
    formLogin.addEventListener("submit", () => {
        btnSubmit.disabled = true;
        btnSubmit.textContent = "Verificando...";
    });
});