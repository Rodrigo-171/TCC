
<div class="body-x">
    <header class="header-cadas">
        <!--<img class="logo2" src="./imagens/LOGO/logo-net-branca.gif">-->
        <h1 class="h1-cadas">Criar uma nova conta</h1>
        <h2>Crie sua conta preenchendo as informações abaixo</h2>
    </header>

    <div class="div-register">
        <form class="form-cadas"action="./php/cadastrar.php" method="post">
            <ul>
                <li class="dois">
                    <input type="text" id="fname" name="fname" placeholder="Nome Completo" >
                </li>
                <li class="um">
                    <input type="email" id="email" name="email" placeholder="E-mail" >
                    <input type="password" id="password" name="password" placeholder="Senha" >
                    <input type="text" id="cpf" name="cpf" placeholder="CPF | Apenas números" >
                </li>

                <li class="dois">
                    <input type="cep" id="cep" name="cep" placeholder="CEP" >
                    <input type="bairro" id="bairro" name="bairro" placeholder="Bairro" >
                </li>

                <li class="dois">
                    <input type="rua" id="rua" name="rua" placeholder="Rua" >
                    <input type="num" id="num" name="num" placeholder="Numero" >
                </li>

                <li class="um">
                    <input class="register" type="text" id="compl" name="compl" placeholder="Complemento" >
                </li>

                <li class="dois">
                    <select id="estado" class="estados" name="estado">
                    <option value="">Estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espirito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    </select>
                    <input class="register" type="text" id="city" name="city" placeholder="Cidade" >
                </li>
                <li class="um">
                    <input class="register" type="text" id="cellphone" name="cellphone" placeholder="Celular" >
                </li>
    
                <li class="dois">
                
                    <input class="register" type="text" id="birthday" name="birthday" placeholder="Data de Nascimento">

                    <select class="gen" name="gen">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="O">Outro</option>
                    </select>
                </li>
                <input class="cadastrar" type="submit" value="Cadastrar">
            </ul>
        </form> 
    </div>
</div>