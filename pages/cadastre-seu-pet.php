<?php $user = $_SESSION['user_logado']; ?>
<body class="bg-abstratact"> 
    
<div class="cadastroPet">
    
    <!-- CONTEUDO-->
    <form action="./php/cadastrar-pet.php" id="cadastroPet" method="POST">
        <div id="passo">
            <div id="passo-1" class="div-cadastro passo-ativo">
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Olá <?php echo $user['nome_usu']?>, qual a espécie do seu pet?</h2>
                </div>
                <?php
                    if (isset($_SESSION['animal_nao_cadastrado'])): ?>
                        <div class="notification is-danger">
                            <p style="color: #c61111">Erro ao cadastrar pet tente novamente.</p>
                        </div>
                    <?php endif;
                    unset($_SESSION['animal_nao_cadastrado']);
                ?>
                <div class="div-cadastro-opcao">
                    <button type="button" class="botao-pet" onclick="selecionarPet(this, 1, 'cachorro')">
                        <img class="img-pets" src="imagens/cachorro/cachorro.gif">
                        <h3 class="h3-pets">Cachorro</h3>
                    </button>
                    <input type="radio" name="especie" class="radio-especie" value="cachorro">
                </div>
                <div class="div-cadastro-opcao" >
                    <button type="button" class="botao-pet" onclick="selecionarPet(this, 2,'gato')">
                        <img class="img-pets" src="imagens/gato/gato.gif">
                        <h3 class="h3-pets">Gato</h3>
                    </button>
                    <input type="radio" name="especie" class="radio-especie" value="gato">
                </div>
                <div class="div-cadastro-opcao">
                    <button type="button" class="botao-pet" onclick="selecionarPet(this, 3, 'coelho')">
                        <img class="img-pets" src="imagens/coelho/coelho.gif">
                        <h3 class="h3-pets">Coelho</h3>
                    </button>
                    <input type="radio" name="especie" class="radio-especie" value="coelho">
                </div>
                <div class="div-cadastro-opcao">
                    <button type="button" class="botao-pet" onclick="selecionarPet(this, 4, 'roedor')">
                        <img class="img-pets" src="imagens/roedor/roedor.gif">
                        <h3 class="h3-pets">Roedor</h3>
                    </button>
                    <input type="radio" name="especie" class="radio-especie" value="roedor">
                </div>
            </div>

            <div id="passo-2" class="div-cadastro depois"></div>

            <div id="passo-3" class="div-cadastro depois"></div>

            <div id="passo-4" class="div-cadastro depois">
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Qual o nome do animal?</h2>
                    <img src="imagens/all-pet.png" class="img-cadastro">
                </div>
                <div class="div-cadastro-opcao">
                    <input type="text" placeholder="Nome" name="nomeAnimal">
                </div>
            </div>

            <div id="passo-5" class="div-cadastro depois">
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Nascimento do Animal</h2>
                    <img src="imagens/all-pet.png" class="img-cadastro">
                </div>
                <div class="div-cadastro-opcao">
                    <input type="date" name="nascimentoAnimal">
                </div>
            </div>

            <div id="passo-6" class="div-cadastro depois">
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">O animal é para Venda, Adoção ou Namoropet?</h2>
                    <label for="venda" class="button-default">Venda</label>
                    <input type="radio" name="paraQue" id="venda" value="venda" onselect="show_hide()">
                    <label for="adocao" class="button-default">Adoção</label>
                    <input type="radio" name="paraQue" id="adocao" value="adocao">
                    <label for="namoropet" class="button-default">NamoroPet</label>
                    <input type="radio" name="paraQue" id="namoropet" value="namoropet">
                </div>
                <div class="div-cadastro-opcao">
                    <input id="preco-animal" type="text" name="precoAnimal" placeholder="Valor do animal">
                </div>
            </div>
            <!--
            <div id="passo-7" class="div-cadastro depois">
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Escolha as fotos</h2>
                    <img src="imagens/undraw/undraw_Camera.png" class="img-cadastro2">
                </div>
                <div class="div-cadastro-foto">
                    
                </div>
            </div>-->

        </div>

        
        <div class="div-cadastro-botao">
            <button type="button" id="botao-passo1" onclick="mudarPasso(2)">Proximo</button>
            <button type="button" id="botao-passo2" onclick="mudarPasso(3)">Proximo</button>
            <button type="button" id="botao-passo3" onclick="mudarPasso(4)">Proximo</button>
            <button type="button" id="botao-passo4" onclick="mudarPasso(5)">Proximo</button>
            <button type="button" id="botao-passo5" onclick="mudarPasso(6)">Proximo</button>
            
            
            <button type="submit" id="botao-salvar">Salvar</button>
        </div>
    </form>
    
</div>
</body>