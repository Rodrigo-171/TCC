<?php $user = $_SESSION['user_logado']; ?>
<div class="body-perfil-pet">
    <header>
        <div class="div-home">
            <h1 class="h1-home">NetworkPet's</h1>
        </div>
    </header>

    <div class="div-foto">
        <img class="foto-perfil" src="imagens/fotos_usuario/<?php echo $user['imagem_usu'] ?>">
    </div>

    <div class="button-perfil">
        <input class="bottom-TE" type="submit" value="Trocar foto">
        <a href="php/deslogar.php" class="bottom-TE">Sair</a>
        <input class="bottom-TE" type="submit" value="Excluir perfil">
    </div>

    <div class="dados-perfil">
        <ul class="ul-dados-perfil">
            <ul>
                <ul class="ul-dados-perfil">
                    <li class="li-perf"><P class="text-perf">Nome</P>
                        <input class="inp-perf" type="text" id="fname" name="fname" value="<?php echo $user['nome_usu'] ?>" ></li>
                    <li class="li-perf"><P class="text-perf">Estado</P>
                        <select class="inp-perf" >
                            <option value="">Estado</option>
                            <option value="AC" <?php echo ($user['estado'] == 'AC' ) ? 'selected' : '' ?>>Acre</option>
                            <option value="AL" <?php echo ($user['estado'] == 'AL' ) ? 'selected' : '' ?>>Alagoas</option>
                            <option value="AP" <?php echo ($user['estado'] == 'AP' ) ? 'selected' : '' ?>>Amapá</option>
                            <option value="AM" <?php echo ($user['estado'] == 'AM' ) ? 'selected' : '' ?>>Amazonas</option>
                            <option value="BA" <?php echo ($user['estado'] == 'BA' ) ? 'selected' : '' ?>>Bahia</option>
                            <option value="CE" <?php echo ($user['estado'] == 'CE' ) ? 'selected' : '' ?>>Ceará</option>
                            <option value="DF" <?php echo ($user['estado'] == 'DF' ) ? 'selected' : '' ?>>Distrito Federal</option>
                            <option value="ES" <?php echo ($user['estado'] == 'ES' ) ? 'selected' : '' ?>>Espirito Santo</option>
                            <option value="GO" <?php echo ($user['estado'] == 'GO' ) ? 'selected' : '' ?>>Goiás</option>
                            <option value="MA" <?php echo ($user['estado'] == 'MA' ) ? 'selected' : '' ?>>Maranhão</option>
                            <option value="MS" <?php echo ($user['estado'] == 'MS' ) ? 'selected' : '' ?>>Mato Grosso do Sul</option>
                            <option value="MT" <?php echo ($user['estado'] == 'MT' ) ? 'selected' : '' ?>>Mato Grosso</option>
                            <option value="MG" <?php echo ($user['estado'] == 'MG' ) ? 'selected' : '' ?>>Minas Gerais</option>
                            <option value="PA" <?php echo ($user['estado'] == 'PA' ) ? 'selected' : '' ?>>Pará</option>
                            <option value="PB" <?php echo ($user['estado'] == 'PB' ) ? 'selected' : '' ?>>Paraíba</option>
                            <option value="PR" <?php echo ($user['estado'] == 'PR' ) ? 'selected' : '' ?>>Paraná</option>
                            <option value="PE" <?php echo ($user['estado'] == 'PE' ) ? 'selected' : '' ?>>Pernambuco</option>
                            <option value="PI" <?php echo ($user['estado'] == 'PI' ) ? 'selected' : '' ?>>Piauí</option>
                            <option value="RJ" <?php echo ($user['estado'] == 'RJ' ) ? 'selected' : '' ?>>Rio de Janeiro</option>
                            <option value="RN" <?php echo ($user['estado'] == 'RN' ) ? 'selected' : '' ?>>Rio Grande do Norte</option>
                            <option value="RS" <?php echo ($user['estado'] == 'RS' ) ? 'selected' : '' ?>>Rio Grande do Sul</option>
                            <option value="RO" <?php echo ($user['estado'] == 'RO' ) ? 'selected' : '' ?>>Rondônia</option>
                            <option value="RR" <?php echo ($user['estado'] == 'RR' ) ? 'selected' : '' ?>>Roraima</option>
                            <option value="SC" <?php echo ($user['estado'] == 'SC' ) ? 'selected' : '' ?>>Santa Catarina</option>
                            <option value="SP" <?php echo ($user['estado'] == 'SP' ) ? 'selected' : '' ?>>São Paulo</option>
                            <option value="SE" <?php echo ($user['estado'] == 'SE' ) ? 'selected' : '' ?>>Sergipe</option>
                            <option value="TO" <?php echo ($user['estado'] == 'TO' ) ? 'selected' : '' ?>>Tocantins</option>
                        </select>
                    </li>
                </ul>
                <ul class="ul-dados-perfil">
                    <li class="li-perf"><P class="text-perf">Cidade</P>
                        <input class="inp-perf" type="text" id="fname" name="fname" value="<?php echo $user['cidade'] ?>" ></li>
                    <li class="li-perf"><P class="text-perf">Genêro</P>
                        <input class="inp-perf" type="text" id="fname" name="fname" value="<?php echo $user['genero_usu'] ?>" ></li>  
                </ul>
                <ul class="ul-dados-perfil">
                    <li class="li-perf"><P class="text-perf">Celular</P>
                        <input class="inp-perf" type="text" id="fname" name="fname" value=<?php echo $user['celular_usu'] ?> ></li>
                    <li class="li-perf"><P class="text-perf">CEP</P>
                        <input class="inp-perf" type="text" id="fname" name="fname" value="<?php echo $user['cep'] ?>" ></li>
                    
                </ul>

                <ul class="ul-dados-perfil">

                    <li class="li-perf"><P class="text-perf">Idade</P>
                        <input class="register" type="date" id="lname" name="lname" value="<?php echo $user['nascimento_usu'] ?>"></li>
                </ul>
                
        </ul>
    </div>


    <div class="button-perfil2">
        <input class="bottom-TE2" type="submit" value="Cancelar">
        <input class="bottom-TE2" type="submit" value="Salvar">
    </div>
</div>