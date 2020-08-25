<!-- Aconcelho deixar um index unico em php mesmo para poder fazer o login e não precisar repetir o head -->
<?php
    session_start(); // inicia a variavel $_SESSION
    $url = explode('/', $_SERVER['REQUEST_URI']); //pega a url e transforma em uma array
    $page = $url[3]; // pega a que página a pessoa acessou, na sua maquina ai vai ser outro index provavelmente o index 2
    var_dump($page);
    die;

    // Verifica qual a pagina que usuario acessou e muda a variavel titulo de acorco com o titulo definido
    switch ($page) {
        case '':
        case 'home':
            $titulo = 'Home';
            break;
        case 'cadastro':
            $titulo = 'Cadastro';
            break;
        case 'adote-um-pet':
            $titulo = 'Adote um pet';
            break;
        case 'compre-um-pet':
            $titulo = 'Compre um pet';
            break;
        case 'namoro-pet':
            $titulo = 'Namoro Pet';
            break;
        case 'doacao-ong':
            $titulo = "Doe para ONG's";
            break;
        case 'pets-cadastrado':
            $titulo = "Pet's cadastrados";
            break;
        case 'perfil':
            $titulo = "Perfil";
            break;
        case 'login':
            $titulo = "Login";
            break;
        default:
            $titulo = 'Home';
            break;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset=UTF-8>
    <meta name=author content="">
    <meta name=description content="">
    <meta name=keywords content="">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>

    <link rel=stylesheet href="css/normalize.css">
    <link rel=stylesheet href="css/default.css">
    <link rel=stylesheet href="js/menuhamburguer.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel=stylesheet media="screen and (max-width:480px)" href="css/estilo-480px.css">
    <link rel=stylesheet media="screen and (min-width: 481px) and (max-width:839px) " href="css/estilo-839px.css">
    <link rel=stylesheet media="screen and (min-width: 840px) and (max-width:1024px) " href="css/estilo-1024px.css">
    <link rel=stylesheet media="screen and (min-width: 1025px)" href="css/estilo-1025px.css">
    
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-58087941-1', 'auto');
        ga('send', 'pageview');
        ga('send', 'event', 'labs', 'menu-full');

        jQuery(window).scroll(function() {
            jQuery(".block-teste").hide();
            setTimeout(function(){
                jQuery(".block-teste").stop(true, true).show();
            }, 1000);
        });
    </script>
</head>
<body>
    <?php
        // Verifica qual a pagina que usuario acessou e pega a página que foi colocada.
        // Tive que criar tambem um .htaccess sempre que o cliente acessar uma página ele passar pelo index.php.
        switch ($page) {
            case '':
            case 'home':
                require('./pages/home.html');
                break;
            case 'cadastro':
                require('./pages/cadastro.php');
                break;
            case 'adote-um-pet':
                require('./pages/adote.html');
                break;
            case 'compre-um-pet':
                require('./pages/compre.html');
                break;
            case 'namoro-pet':
                require('./pages/namoro.html');
                break;
            case 'doacao-ong':
                require('./pages/doacao-ong.html');
                break;
            case 'pets-cadastrado':
                require('./pages/pets-cadastrado.html');
                break;
            case 'perfil':
                require('./pages/perfil.html');
                break;
            case 'boleto':
                require('./pages/boleto.html');
                break;
            case 'cartao':
                require('./pages/cartao.html');
                break;
            case 'cadastre-seu-pet':
                require('./pages/cadastre-seu-pet.html');
                break;
            case 'checkin':
                require('./pages/checkin.html');
                break;
            case 'fdpp':
                require('./pages/fdpp.html');
                break;
            case 'login':
                require('./pages/login.php');
                break;
            case 'perfil-pessoa':
                require('./pages/perfil-pessoa.php');
                break;
            case 'perfil-pet':
                require('./pages/perfil-pet.html');
                break;
            default:
                require('./pages/erro404.html'); //Caso não ache a pagina cai na pagina de erro
                break;
        }
    ?>

    <!-- Deixei o menu hamburguer no index.php para pegar em todas as paginas caso queira remover de alguma faz um if verificando se o a variavel page é igual a pagina que não pode ter o menu  -->
    
    



    <!-- Menu Hamburguer -->
    <?php if($page != 'login' and $page != 'cadastro'){ ?> 
    <div class="block-teste">
        <input class="input-home" id="navbar" type='checkbox'>
        <label for="navbar">
            <div class='menu'>
                <span class='hamburger'></span>
            </div>
        </label>

        <ul class="menu-ul">
            <li class="li-menu"><a class="a-menu" href='home'>Home</a></li>
            <li class="li-menu"><a class="a-menu"href='adote-um-pet'>Adote um Pet</a></li>
            <li class="li-menu"><a class="a-menu" href='compre-um-pet'>Compre um Pet</a></li>
            <li class="li-menu"><a class="a-menu" href='namoro-pet'>Namoro Pet</a></li>
            <li class="li-menu"><a class="a-menu" href='doacao-ong'>Doe para ONG's</a></li>
            <!-- Aqui ele verifica se tem alguem logado ou não, quando for para valer retirar o "|| true" -->
            <?php if(isset($_SESSION['user_logado'])){ ?>
                <li class="li-menu"><a class="a-menu" href='cadastre-seu-pet'>Cadastre um Pet</a></li>
                <li class="li-menu"><a class="a-menu" href='pets-cadastrado'>Pet's cadastrados</a></li>
                <li class="li-menu"><a class="a-menu" href='perfil-pessoa'>Perfil</a></li>
            <?php }else{ ?>
                <li class="li-menu"><a class="a-menu" href='login'>Logar</a></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    


    <!-- funções do cadastrar pet -->
    <script>
        function selecionarPet(botao, animal){
            var botaoAtivo = document.getElementsByClassName("ativo");
            if(botaoAtivo.length > 0){
                botaoAtivo[0].classList.remove("ativo");
            }
            botao.classList.add("ativo");
            botao.nextSibling.nextSibling.checked = true;
            var opcoes;
            switch (animal) {
                case 'cachorro':
                    opcoes = `
                        <div class="div-cadastro-titulo">
                            <h2 class="h2-cadastro">Qual o sexo do animal?</h2>
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'cachorro')">
                                <img class="img-pets" src="imagens/cachorro/cachorro_genero_macho.gif">
                                <h3 class="h3-pets">Macho</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="M">
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'cachorro')">
                                <img class="img-pets" src="imagens/cachorro/cachorro_genero_femea.gif">
                                <h3 class="h3-pets">Fêmea</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="F">
                        </div>
                    `;
                    break;
                case 'gato':
                    opcoes = `
                        <div class="div-cadastro-titulo">
                            <h2 class="h2-cadastro">Qual o sexo do animal?</h2>
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'gato')">
                                <img class="img-pets" src="imagens/gato/gato_genero_macho.gif">
                                <h3 class="h3-pets">Macho</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="M">
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'cachorro')">
                                <img class="img-pets" src="imagens/gato/gato_genero_femea.gif">
                                <h3 class="h3-pets">Fêmea</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="F">
                        </div>
                    `;
                    break;
                case 'coelho':
                    opcoes = `
                        <div class="div-cadastro-titulo">
                            <h2 class="h2-cadastro">Qual o sexo do animal?</h2>
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'coelho')">
                                <img class="img-pets" src="imagens/coelho/coelho_genero_macho.gif">
                                <h3 class="h3-pets">Macho</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="M">
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'cachorro')">
                                <img class="img-pets" src="imagens/coelho/coelho_genero_femea.gif">
                                <h3 class="h3-pets">Fêmea</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="F">
                        </div>
                    `;
                    break;
                case 'roedor':
                    opcoes = `
                        <div class="div-cadastro-titulo">
                            <h2 class="h2-cadastro">Qual o sexo do animal?</h2>
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'roedor')">
                                <img class="img-pets" src="imagens/roedor/roedor_genero_macho.gif">
                                <h3 class="h3-pets">Macho</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="M">
                        </div>
                        <div class="div-cadastro-opcao">
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'cachorro')">
                                <img class="img-pets" src="imagens/roedor/roedor_genero_femea.gif">
                                <h3 class="h3-pets">Fêmea</h3>
                            </button>
                            <input type="radio" name="sexo" class="radio-especie" value="F">
                        </div>
                    `;
                    break;
            }

            document.getElementById("passo-2").innerHTML = opcoes;
        }

        function selecionarSexo(botao, sexo){
            var botaoAtivo = document.getElementsByClassName("ativo");
            if(botaoAtivo.length > 0){
                botaoAtivo[0].classList.remove("ativo");
            }
            botao.classList.add("ativo");
            botao.nextSibling.nextSibling.checked = true;
            document.getElementById("passo-2").innerHTML = opcoes;
        }

        function mudarPasso(passo){
            switch (passo) {
                case 2:
                    document.getElementById("passo-1").classList.remove("passo-ativo");
                    document.getElementById("passo-1").classList.add("antes");
                    document.getElementById("passo-2").classList.remove("depois");
                    document.getElementById("passo-2").classList.add("passo-ativo");
                    document.getElementById("botao-passo1").style.display = "none";
                    document.getElementById("botao-passo2").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-2").offsetHeight+'px';
                    break;
                case 3:
                    document.getElementById("passo-2").classList.remove("passo-ativo");
                    document.getElementById("passo-2").classList.add("antes");
                    document.getElementById("passo-3").classList.remove("depois");
                    document.getElementById("passo-3").classList.add("passo-ativo");
                    document.getElementById("botao-passo2").style.display = "none";
                    document.getElementById("botao-passo3").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-3").offsetHeight+'px';
                    break;
                case 4:
                    document.getElementById("passo-3").classList.remove("passo-ativo");
                    document.getElementById("passo-3").classList.add("antes");
                    document.getElementById("passo-4").classList.remove("depois");
                    document.getElementById("passo-4").classList.add("passo-ativo");
                    document.getElementById("botao-passo3").style.display = "none";
                    document.getElementById("botao-salvar").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-4").offsetHeight+'px';
                    break;
                default:
                    break;
            }
        }
       
    </script>

    <!-- cadastro -->
    <script>
    $('input[name=cep]').change(function(){
    var cep  = $(this).val();
    cep = cep.replace("-", "");
    $.ajax({
        url: `https://viacep.com.br/ws/${cep}/json`,
        dataType : "json",
        success: function(resposta){
            console.log(resposta);

            $("#city").val(resposta.localidade);
            $("#estado").val(resposta.uf);
            $("#bairro").val(resposta.bairro);
            $("#rua").val(resposta.logradouro);
            $("#complemento").val(resposta.complemento);
        },
        error : function(erro){
            console.log(erro);
        }
    })
});
</script>

<script>
    app.listen(process.env.PORT || 3000);
</script>
</body>
</html>