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
            <a href="php/deslogar.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
        </div>
        <div>
            <a type="submit"><i class="fas fa-user-times"></i><br>Excluir perfil</a>
        </div>
    </div>

    <section class="acc-container">
        <h2>Editar informações</h2>
        <form action="">
            <div class="dados-perfil">
                <ul class="ul-dados-perfil">
                    <ul class="ul-dados-perfil">
                        <li class="li-perf"><P class="text-perf">Nome</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['nome_usu'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Email</P>
                            <input type="text" id="fname" name="email" value="<?php echo $user['email_usu'] ?>" class="inp-perf2" ></li>
                        <li class="li-perf"><P class="text-perf">Data de nascimento</P>
                            <input type="date" id="birthday" name="birthday" value="<?php echo $user['nascimento_usu'] ?>" class="register"></li>
                        <li class="li-perf"><P class="text-perf">Telefone</P>
                            <input type="text" id="fname" name="cellphone" value="<?php echo $user['celular_usu'] ?>" class="inp-perf2"></li>
                    </ul>
                    <hr>
                    <ul class="ul-dados-perfil">
                        <li class="li-perf"><P class="text-perf">CEP</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['cep'] ?>" class="inp-perf2"></li>  
                        <li class="li-perf"><P class="text-perf">Estado</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['estado'] ?>" class="inp-perf2"></li>  
                        <li class="li-perf"><P class="text-perf">Cidade</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['cidade'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Bairro</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['bairro'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Rua</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['rua'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Número</P>
                            <input type="text" id="fname" name="fname" value="<?php echo $user['numero'] ?>" class="inp-perf2"></li>
                    </ul>
                </ul>
            </div>
        </form>
    </section>

    <section class="acc-container">
        <h2>Renovar senha</h2>
        <form action="">
            <div class="dados-perfil">
                <ul class="ul-dados-perfil">
                    <li class="li-perf"><P class="text-perf">Senha atual</P>
                        <input type="text" id="fname" name="fname" value="" class="inp-perf2"></li>

                    <li class="li-perf"><P class="text-perf">Senha nova</P>
                        <input type="text" id="fname" name="fname" value="" class="inp-perf2"></li>

                    <li class="li-perf"><P class="text-perf">Confirmar senha</P>
                        <input type="text" id="fname" name="fname" value="" class="inp-perf2"></li>
                </ul>
            </div>
        </form>
    </section>

    <div class="button-perfil2">
        <input class="bottom-TE2" type="submit" value="Salvar">
        <input class="bottom-TE2" type="submit" value="Cancelar">
    </div>
</div>