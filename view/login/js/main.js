$("#form-total").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "fade",
    enableAllSteps: true,
    autoFocus: true,
    transitionEffectSpeed: 500,
    titleTemplate : '<span class="title">#title#</span>',
    labels: {
        previous : 'Previous',
        next : 'Next Step',
        finish : 'Submit',
        current : ''
    },

    
    onStepChanging: function (event, currentIndex, newIndex) {
        if (currentIndex === 0) {
            
            const nome = $("#nome").val().trim();
            const nascimento = $("#data").val();
            const sexo = $("#sexo").val();

            if (!nome || !nascimento || !sexo) {
                alert("Preencha todos os campos da etapa 1");
                return false;
            }

           
            const dataNascimento = new Date(nascimento);
            const hoje = new Date();
            let idade = hoje.getFullYear() - dataNascimento.getFullYear();
            const m = hoje.getMonth() - dataNascimento.getMonth();
            if (m < 0 || (m === 0 && hoje.getDate() < dataNascimento.getDate())) {
                idade--;
            }
            
        }

        if (currentIndex === 1) {
            
            const email = $("#email").val().trim();
            const telefone = $("#telefone").val().trim();
            const senha = $("#senha").val();
            const confirmarSenha = $("input[placeholder='Confirmar Senha']").val();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const telefoneRegex = /^\d+$/;

            if (!email || !telefone || !senha || !confirmarSenha) {
                alert("Preencha todos os campos da etapa 2");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("Digite um e-mail válido");
                return false;
            }

            if (!telefoneRegex.test(telefone)) {
                alert("O telefone deve conter apenas números");
                return false;
            }

            if (senha.length < 6 || /\s/.test(senha)) {
                alert("A senha deve ter no mínimo 6 caracteres e não conter espaços");
                return false;
            }

            if (senha !== confirmarSenha) {
                alert("As senhas não coincidem");
                return false;
            }
        }

        return true; 
    }
});
