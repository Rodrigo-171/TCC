<?php 
include_once("php/conexao.php")
?>
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
            <p>Rafel</p><!-- nome do usuario-->
            <i onclick="abrirAlert()" class="fas fa-ellipsis-v"></i>
        </div>
        
        <img class="img-post" src="imagens/fotos/1.jpg" alt=""><!-- img do animal-->
        <button onclick="abrirModalPet()">Ver mais</button>
        <button>Adotar</button>
        <div class="bg-modal-pet" id="modal-pet">
            <div class="modal-pet">
                <span class="close" onclick="fecharModalPet()">&times;</span>
                    <h2>Informações</h2>
                    <ul class="ul-pai">
                        <ul class="ul-left">
                            <li>Nome: </li>
                            <li>Especie: </li>
                            <li>Raça: </li>
                        </ul>

                        <ul class="ul-right">
                            <li>Idade: </li>
                            <li>Sexo: </li>
                            
                        </ul>
                    </ul>
            </div>
        </div>
    </section>
        
    <!-- janela de denuncias-->
    
</main>