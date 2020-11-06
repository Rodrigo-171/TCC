<?php 
$user = $_SESSION['user_logado']; 
$cod_usu = $user['cod_usu'];
include("php/conexao.php");
?>
<div class="body-perfil-pet">
    
    <main class="div-foto"> 
        <div>
            <img src="foto/<?php echo $user['imagem_usu'] ?>">
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
        <h2>Editar informações</h2>
        <div class="dados-perfil">
            <form action="php/upload.php" method="POST" enctype="multipart/form-data">
                <div class="fileUpload">
                    <i class="fas fa-camera"></i><br>
                    Trocar foto
                    <input type="file" class="upload" name="arquivo" id="imagem" onchange="previewImagem()">
                </div><br><br>
                <img id="foto" style="width: 130px; height: 130px; border-radius:100%"><br>
                <input class="submit-foto"type="submit" value="Enviar"> 
            </form>
        </div>

        <form action="php/alterar-perfil.php" method="POST">
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
                            <input type="text" id="fname" name="cep" value="<?php echo $user['cep'] ?>" class="inp-perf2"></li>  
                        <li class="li-perf"><P class="text-perf">Estado</P>
                            <input type="text" id="fname" name="estado" value="<?php echo $user['estado'] ?>" class="inp-perf2"></li>  
                        <li class="li-perf"><P class="text-perf">Cidade</P>
                            <input type="text" id="fname" name="cidade" value="<?php echo $user['cidade'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Bairro</P>
                            <input type="text" id="fname" name="bairro" value="<?php echo $user['bairro'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Rua</P>
                            <input type="text" id="fname" name="rua" value="<?php echo $user['rua'] ?>" class="inp-perf2"></li>
                        <li class="li-perf"><P class="text-perf">Número</P>
                            <input type="text" id="fname" name="numero" value="<?php echo $user['numero'] ?>" class="inp-perf2"></li>
                    </ul>
                </ul>
                <div class="button-perfil2">
                    <input class="bottom-TE3" type="submit" value="Salvar">   
                </div>
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
        <input class="bottom-TE2" type="submit" value="Enviar">   
        <input class="bottom-TE2" type="submit" value="Cancelar">
    </div>
</div>

<script>
    function previewImagem(){
        var imagem = document.querySelector('input[name=arquivo]').files[0];
        var preview = document.querySelector('img[id=foto]');

        var reader = new FileReader();

        reader.onloadend = function(){
            preview.src = reader.result;
        }
        if(imagem){
            reader.readAsDataURL(imagem);
        }else{
            preview.src = "";
        }
    }   
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>