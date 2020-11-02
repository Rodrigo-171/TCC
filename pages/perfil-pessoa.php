<?php $user = $_SESSION['user_logado']; ?>

<div class="body-perfil-pet">
    
    <main class="div-foto">
        <div>
            <img src="imagens/fotos_usuario/<?php echo $user['imagem_usu'] ?>">
        </div>
    </main>
    
    <div class="button-perfil">
        <div>
            <a href="php/deslogar.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
        </div>
        
        <div>
            <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $user['nome_usu'] ?>?'))
			location.href='php/apagar-usuario.php?p=deletar&usuario=<?php echo $user['cod_usu'];?>';"><i class="fas fa-user-times"></i><br>Excluir perfil</a>
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
                        <li class="li-perf"><P class="text-perf">Estado</P>
                            <p class="inp-perf" ><?php echo $user['estado'] ?></p>
                        </li>
                    </ul>
                    <ul class="ul-dados-perfil">
                        <li class="li-perf"><P class="text-perf">Cidade</P>
                            <p class="inp-perf"><?php echo $user['cidade'] ?></p></li>
                        <li class="li-perf"><P class="text-perf">Email</P>
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
    <section class="acc-container">
        <h2>Avaliação</h2>
        <div class="avaliacao">
            <img class="img-avaliacao" src="imagens/undraw/feedback.png" alt="ilustração do undraw">
            <form method="POST" action="./php/processa.php" enctype="multipart/form-data">
                <?php
                    if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg']."<br><br>";
                    unset($_SESSION['msg']);
                    }
                ?>
            
                <div class="estrelas">
                    <input type="radio" id="vazio" name="estrela" value="" checked>

                    <label for="estrela_um"><i class="fas fa-star"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">

                    <label for="estrela_dois"><i class="fas fa-star"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">

                    <label for="estrela_tres"><i class="fas fa-star"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">

                    <label for="estrela_quatro"><i class="fas fa-star"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">

                    <label for="estrela_cinco"><i class="fas fa-star"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>

                    <input class="button-default button-default-avaliar"type="submit" value="Avaliar">
                    
                </div>
                
            </form>
        </div>
    </section>
</div>