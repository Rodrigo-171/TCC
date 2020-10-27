<?php $user = $_SESSION['user_logado']; ?>

<div class="body-perfil-pet">
    
    <main class="div-foto">
        <div>
            <img src="imagens/fotos_usuario/<?php echo $user['imagem_usu'] ?>">
        </div>
    </main>

    <div class="button-perfil">
        <div>
            <a href="#"><i class="fas fa-camera"></i><br>Trocar de foto</a>
        </div>
        <div>
            <a type="submit"><i class="fas fa-user-times"></i><br>Excluir perfil</a>
        </div>
    </div>
    

    <section class="acc-container">
        <h2>Dados Pessoais</h2>
        <div class="dados-perfil">
            <ul class="ul-dados-perfil">
                <ul>
                    <ul class="ul-dados-perfil">
                        <li class="li-perf"><P class="text-perf">Nome</P>
                            <p class="inp-perf"><?php echo $user['nome_usu'] ?></p></li>
                        <li class="li-perf"><P class="text-perf">Especie</P>
                            <p class="inp-perf" ><?php echo $user['estado'] ?></p>
                        </li>
                    </ul>
                    <ul class="ul-dados-perfil">
                        <li class="li-perf"><P class="text-perf">Raça</P>
                            <p class="inp-perf"><?php echo $user['cidade'] ?></p></li>
                        <li class="li-perf"><P class="text-perf">Sexo</P>
                            <p class="inp-perf"><?php echo $user['email_usu'] ?></p></li>  
                    </ul>

                    <ul class="ul-dados-perfil">

                        <li class="li-perf"><P class="text-perf">Data de nascimento</P>
                            <p class="register"><?php echo $user['nascimento_usu'] ?></p></li>
                    </ul>
                    
            </ul>
            <hr>
            <a href="editar-perfil" class="link-edit">Editar dados</a>
        </div>
    </section>
</div>