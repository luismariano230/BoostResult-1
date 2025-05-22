<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoostResult</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background-color: #f5f8fa;
            cursor: url('https://cdn.custom-cursor.com/packs/1863/pack2490.png'), auto;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        body,
        html {
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            padding: 20px;
            border-right: 1px solid #e1e8ed;
            height: 100vh;
        }

        .sidebar h2 {
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 20px 0;
            font-size: 18px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .main {
            flex: 1;
            padding: 20px;
        }

        .profile {
            background: #fff;
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .cover {
            background: #000;
            height: 150px;
        }

        .cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            margin: -40px 20px 10px;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #fff;
            border: 2px white solid;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .profile-info {
            padding: 0 20px 20px;
            text-align: left;
        }

        .profile-info h1 {
            font-size: 20px;
        }

        .profile-info p {
            color: #657786;
            font-size: 14px;
        }

        .right-sidebar {
            width: 300px;
            padding: 20px;
        }

        .Users {
            background: #fff;
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            padding: 15px;
        }

        .Users h3 {
            margin-bottom: 15px;
        }

        .Users .user {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .Users .user img {
            width: 60px;
            border-radius: 50%;
        }

        .Users .user button {
            background-color: #269126;
            border: none;
            padding: 10px;
            border-radius: 3px;
            color: #ffff;
        }

        .tweet-btn {
            background: #1da1f2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 9999px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            font-size: 16px;
        }

        .search-container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .search-input {
            width: 100%;
            padding: 12px 40px 12px 16px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: #269126;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .search-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            fill: #9ca3af;
            pointer-events: none;
        }

        #sair {
            padding: 10px;
            width: 70px;
            border-radius: 3px;
            border: none;
            background-color: gray;
        }

        .button-container {
            position: relative;
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            align-items: center;
        }

        .button-container button {
            background: #fff;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
            margin: auto;
        }

        #underline-indicator {
            position: absolute;
            bottom: 0;
            height: 3px;
            background-color: black;
            width: 0;
            left: 0;
            transition: none;
            /* Remover transição */
        }

        /* Adicionar a transição quando a underline for movida */
        .button-container.transition #underline-indicator {
            transition: all 0.3s ease;
        }

        iframe {
            width: 100%;
            height: 100vh;
            border: 1px solid #ccc;
        }

        .Underline {
            border-bottom: 3px solid black;
        }

        #nomeConta,
        #tipoConta {
            display: inline-block;
        }

        #nomeConta {
            font-size: 2em;
        }

        .cover {
            position: relative;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            border-radius: 8px;
        }

        .cover img {
            width: 100%;
            height: auto;
            transition: filter 0.3s ease;
        }

        .cover:hover #imgCover {
            filter: brightness(0.5);
        }

        .cover .emoji {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .cover:hover .emoji {
            opacity: 1;
        }

        .avatar {
            position: relative;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            border-radius: 13px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter 0.3s ease;
        }

        .avatar:hover #imgAvatar {
            filter: brightness(0.5);
        }

        .avatar .emoji {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .avatar:hover .emoji {
            opacity: 1;
        }

        /* Estilo para o painel de mensagens */
        .mensagens-panel {
        position: fixed;
        top: 0;
        left: -500px; /* Ajuste a posição inicial para a nova largura */
        width: 500px; /* Aumentei a largura do painel */
        height: 100%;
        background: #fff;
        box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
        transition: left 0.3s ease;
        z-index: 1000;
        padding: 20px;
        border-right: 1px solid #e1e8ed;
    }

    .mensagens-panel.open {
        left: 0;
    }

    .mensagens-panel h2 {
        margin-bottom: 20px;
    }

    .mensagens-panel .message {
        margin-bottom: 15px;
        padding: 10px;
        border-bottom: 1px solid #e1e8ed;
    }

    .mensagens-panel .message .sender {
        font-weight: bold;
    }

    .mensagens-panel .message .text {
        color: #657786;
    }

    /* Estilo para o botão de fechar */
    .close-btn {
        background: none;
        border: none;
        font-size: 24px;
        color: #333;
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .close-btn:hover {
        color: red;
    }
    </style>
</head>

<body>
    <div class="mensagens-panel" id="mensagens-panel">
        <button class="close-btn" id="close-btn">X</button>
        <h2>Mensagens</h2>
        <div class="message">
            <div class="sender">Luan Pinto</div>
            <div class="text">Oi, como você está?</div>
        </div>
        <div class="message">
            <div class="sender">Luizao</div>
            <div class="text">Vamos treinar amanhã?</div>
        </div>
        <div class="message">
            <div class="sender">Davi</div>
            <div class="text">Te espero no horário combinado!</div>
        </div>
    </div>
    <div class="sidebar">
        <ul>
            <li>Minha Conta</li>
            <li>
                <?php
                echo ($_SESSION['tipo'] == "aluno") ? 'Personais' : 'Alunos';
                ?>
            </li>
            <li id="mensagens-btn">Mensagens</li>
            <li>Suporte</li>
            <form method="post" action="../../app/controller/UsuarioController.php">
                <button type="submit" name="acao" value="DESLOGAR" id="sair">Sair</button>
            </form>
        </ul>
    </div>

    <div class="main">
        <div class="profile">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="fileUpload">
                    <div class="cover">
                        <img src="https://preview.redd.it/34mmdb3oo42d1.png?auto=webp&s=5b038c9df7e574ce5b88b9664471e7bd83fc94ca"
                            alt="Clique para enviar uma imagem" width="150" id="imgCover">
                        <span class="emoji"><img src="../../imagens/icongaleria.png" alt=""></span>
                    </div>
                </label>
                <input type="file" id="fileUpload" name="foto" accept="image/*" style="display:none;"
                    onchange="this.form.submit();">
            </form>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="fileUpload">
                    <div class="avatar">
                        <img src="https://dimensaosete.com.br/static/7fc311549694666167a49cdb0fb1293c/2493a/gojo.webp"
                            alt="Clique para enviar uma imagem" width="150" id="imgAvatar">
                        <span class="emoji"><img src="../../imagens/icongaleria.png" alt=""></span>
                    </div>
                </label>
                <input type="file" id="fileUpload" name="foto" accept="image/*" style="display:none;"
                    onchange="this.form.submit();">
            </form>
    <p>gledson</p>
            <div class="profile-info">
                <h1 id="nomeConta">
                    <?php echo $_SESSION['nome'] ?>
                </h1>
                <p id="tipoConta">
                    <?php echo $_SESSION['tipo']; ?>
                </p>
                <p>
                    ✨ Criando com paixão | 🌍 Explorando ideias<br>
                    📸 Compartilhando momentos e inspirações<br>
                    📬 Contato: seu e-mail ou link
                </p>
            </div>

            <div class="button-container">
                <button onclick="loadPageAndHighlight(this, 'informacoes/treinos.php')" id="button1">Meus
                    Treinos</button>
                <button onclick="loadPageAndHighlight(this, 'informacoes/medidas.php')" id="button2">Medidas</button>
                <button onclick="loadPageAndHighlight(this, 'informacoes/dados.php')" id="button3">Dados
                    Pessoais</button>
                <div id="underline-indicator"></div>
            </div>

            <iframe id="myIframe" src="https://www.example.com"></iframe>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="Users">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Pesquisar..." />
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <br>
            <h3>Personais Em Destaque</h3>
            <br>
            <div class="user">
                <img src="https://pbs.twimg.com/profile_images/875391618634977280/-UYcaL0-_400x400.jpg" alt="">
                <span>LUAN PINTO</span>
                <button>Perfil</button>
            </div>
            <div class="user">
                <img src="https://pbs.twimg.com/profile_images/875391618634977280/-UYcaL0-_400x400.jpg" alt="">
                <span>LUISAO</span>
                <button>Perfil</button>
            </div>
            <div class="user">
                <img src="https://pbs.twimg.com/profile_images/875391618634977280/-UYcaL0-_400x400.jpg" alt="">
                <span>DAVI</span>
                <button>Perfil</button>
            </div>
        </div>
    </div>



    <script>
        // Função para movimentar a underline entre os botões
        function loadPageAndHighlight(button, url) {
            // Atualiza o conteúdo do iframe
            document.getElementById('myIframe').src = url;

            // Obtém a underline e os elementos do botão
            const underline = document.getElementById('underline-indicator');
            const rect = button.getBoundingClientRect();
            const containerRect = button.parentElement.getBoundingClientRect();

            // Aplica a posição e o tamanho da underline
            underline.style.width = rect.width + "px";
            underline.style.left = (rect.left - containerRect.left) + "px";

            // Ativa a transição (apenas se não for o botão inicial)
            setTimeout(() => {
                button.parentElement.classList.add('transition');
            }, 10); // Atrasar um pouco para garantir que a transição funcione

            // Adiciona uma classe para que a transição ocorra depois de clicar em um botão
            document.querySelectorAll('.button-container button').forEach(btn => {
                btn.classList.remove('active'); // Remove a classe "active" dos outros botões
            });
            button.classList.add('active'); // Adiciona a classe "active" ao botão clicado
        }

        // Adiciona a underline no botão 1 ao carregar a página
        window.onload = function () {
            const firstButton = document.getElementById('button1');
            loadPageAndHighlight(firstButton, 'informacoes/treinos.php'); // URL padrão ao carregar
        };

        // Controla a abertura e fechamento do painel de mensagens
        document.getElementById('mensagens-btn').addEventListener('click', function () {
            const panel = document.getElementById('mensagens-panel');
            panel.classList.toggle('open');
        });

        // Fecha o painel de mensagens quando o botão "X" for clicado
        document.getElementById('close-btn').addEventListener('click', function () {
            const panel = document.getElementById('mensagens-panel');
            panel.classList.remove('open');
        });
    </script>
</body>

</html>