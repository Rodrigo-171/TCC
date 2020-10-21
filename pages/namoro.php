<?php $user = $_SESSION['user_logado']; ?>
<header>
    <div class="div-header-adote">
        <div class="search-box">
            <input class="search-txt" type="text" name="" placeholder="Pesquisar">
            <a class="search-btn" href="#"><i class="fas fa-search"></i></a>
        </div>
        <i class="fas fa-filter i-header"></i>
    </div>
</header>

<main class="main-adote">
    <section class="section-post">
        <div class="div-header-post">
            <img class="foto-icone" src="imagens/fotos_usuario/fotoPerfil.jpg" alt=""> <!-- img do perfil do usuario-->
            <p><?php echo $user['nome_usu']?></p><!-- nome do usuario-->
            <i onclick="abrirModalDenuncia()" class="fas fa-ellipsis-v"></i>
            
        </div>
        <!-- janela de denuncias-->
        

        <img class="img-post" src="imagens/fotos/1.jpg" alt=""><!-- img do animal-->
        
        <button onclick="abrirModal()">Ver mais</button>
        <button>Bate-papo</button>
        <div class="bg-modal-pet" id="modal-pet">
            <div class="modal-pet">
                <span class="close" onclick="fecharModal()">&times;</span>
                    <h2>Informações</h2>
                    <ul class="ul-pai">
                        <ul class="ul-left">
                            <li>Nome: Zeus</li>
                            <li>Especie: Cachorro</li>
                            <li>Raça: Vira-lata</li>
                        </ul>

                        <ul class="ul-right">
                            <li>Idade: 4 anos</li>
                            <li>Sexo: Macho</li>
                            
                        </ul>
                    </ul>
            </div>
        </div>
    </section>
    <div class="bg-modal-denuncia" id="modal-denuncia">
        <div class="modal-denuncia">
            <button class="button-denuncia">Denunciar</button>
            <button class="button-denuncia" onclick="fecharModalDenuncia()">Cancelar</button>
        </div>
    </div>
</main>