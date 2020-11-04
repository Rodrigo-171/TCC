<!-- Aconcelho deixar um index unico em php mesmo para poder fazer o login e não precisar repetir o head -->
<?php
    session_start(); // inicia a variavel $_SESSION
    $url = explode('/', $_SERVER['REQUEST_URI']); //pega a url e transforma em uma array
    //$page = $url[2]; // URL Local
    $page = $url[1]; // URL Online

    // Verifica qual a pagina que usuario acessou e muda a variavel titulo de acorco com o titulo definido
    switch ($page) {
        case '':
        case 'home':
            $titulo = 'Home | NetworkPet';
            break;
        case 'cadastro':
            $titulo = 'Cadastro | NetworkPet';
            break;
        case 'adote-um-pet':
            $titulo = 'Adote um pet | NetworkPet';
            break;
        case 'compre-um-pet':
            $titulo = 'Compre um pet | NetworkPet';
            break;
        case 'namoro-pet':
            $titulo = 'Namoro Pet | NetworkPet';
            break;
        case 'doacao-ong':
            $titulo = "Doe para ONG's | NetworkPet";
            break;
        case 'pets-cadastrado':
            $titulo = "Pet's cadastrados | NetworkPet";
            break;
        case 'perfil-pessoa':
            $titulo = "Perfil | NetworkPet";
            break;
        case 'perfil-pet':
            $titulo = "Perfil Pet | NetworkPet";
            break;
        case 'login':
            $titulo = "Login | NetworkPet";
            break;
        case 'editar-perfil':
            $titulo = "Editar Perfil | NetworkPet";
            break;
        case 'boleto':
            $titulo = "Boleto | NetworkPet";
            break;
        case 'cartao':
            $titulo = "Cartão | NetworkPet";
            break;
        case 'cadastre-seu-pet':
            $titulo = "Cadastro do Pet | NetworkPet";
            break;
        case 'fdpp':
            $titulo = "Forma de Pagamento | NetworkPet";
            break;
        case 'chat':
            $titulo = "Bate Papo | NetworkPet";
            break;
        case 'chat-arm':
            $titulo = "Armazém de Chat | NetworkPet";
            break;
        case 'acesso-negado':
            $titulo = "Acesso Negado | NetworkPet";
            break;
        case 'administrativo':
            $titulo = "Painel Administrador | NetworkPet";
            break;
        case 'editar-usuario':
            $titulo = "Editar Usuário | NetworkPet";
            break;
        default:
            $titulo = 'Home | NetworkPet';
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/cachorro/cachorro.gif">
    <link rel=stylesheet href="css/normalize.css">
    <link rel=stylesheet href="css/default.css">
    <link rel=stylesheet href="js/menuhamburguer.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- BOOTSTRAP-->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css/theme.css" rel="stylesheet">
	<script src="js/ie-emulation-modes-warning.js"></script>
    

    <link rel=stylesheet media="screen and (max-width:480px)" href="css/estilo-480px.css">
    <link rel=stylesheet media="screen and (min-width: 481px) and (max-width:839px) " href="css/estilo-839px.css">
    <link rel=stylesheet media="screen and (min-width: 840px) and (max-width:1024px) " href="css/estilo-1024px.css">
    <link rel=stylesheet media="screen and (min-width: 1025px)" href="css/estilo-1025px.css">

    <script>
        if (screen.width>480){
            // window.location.assign("acesso-negado");
        }
        else{
        }
    </script>
    
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
                require('./pages/adote.php');
                break;
            case 'compre-um-pet':
                require('./pages/compre.php');
                break;
            case 'namoro-pet':
                require('./pages/namoro.php');
                break;
            case 'doacao-ong':
                require('./pages/doacao-ong.html');
                break;
            case 'pets-cadastrado':
                require('./pages/pets-cadastrado.php');
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
                require('./pages/cadastre-seu-pet.php');
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
                require('./pages/perfil-pet.php');
                break;
            case 'editar-perfil':
                require('./pages/editar-perfil.php');
                break;
            case 'chat':
                require('./pages/chat.php');
                break;
            case 'chat-arm':
                require('./pages/chat-arm.php');
                break;
            case 'acesso-negado':
                require('./pages/acesso-negado.html');
                break;
            case 'administrativo':
                require('./pages/administrativo.php');
                break;
            case 'menu-adm':
                require('./pages/menu_adm.php');
                break;
            case 'editar-usuario':
                require('./pages/editar-usuario.php');
                break;
            case 'administrativo-pet':
                require('./pages/administrativo-pet.php');
                break;
            case 'form-denuncia':
                require('./pages/form-denuncia.php');
                break;
            default:
                require('./pages/erro404.html'); //Caso não ache a pagina cai na pagina de erro
                break;
        }
    ?>

    <!-- Deixei o menu hamburguer no index.php para pegar em todas as paginas caso queira remover de alguma faz um if verificando se o a variavel page é igual a pagina que não pode ter o menu  -->
    
    



    <!-- Menu Hamburguer -->
    <?php if($page != 'login' and $page != 'cadastro' and $page != 'chat' and $page != 'acesso-negado' and $page != 'administrativo' and $page != 'editar-usuario'){ ?> 
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
                    <li class="li-menu"><a class="a-menu" href='chat-arm'>Bate-Papo</a></li>
                    <li class="li-menu"><a class="a-menu" href='perfil-pessoa'>Perfil</a></li>
                <?php }else{ ?>
                    <li class="li-menu"><a class="a-menu" href='login'>Entrar</a></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    


    <!-- funções do cadastrar pet -->
    <script>
        function selecionarPet(botao, especie, animal){
            $.ajax({
                url: `php/especie_selecionada.php`,
                type : "POST",
                data: {especie},
                success: function(resposta){
                    var racas = JSON.parse(resposta);
                    localStorage.setItem('racas', JSON.stringify(racas.data));
                },
                error : function(erro){
                    console.log(erro);
                }
            });

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
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'gato')">
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
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'coelho')">
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
                            <button type="button" class="botao-pet" onclick="selecionarSexo(this, 'roedor')">
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
                    document.getElementById("botao-passo4").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-4").offsetHeight+'px';
                    break;
                case 5:
                    document.getElementById("passo-4").classList.remove("passo-ativo");
                    document.getElementById("passo-4").classList.add("antes");
                    document.getElementById("passo-5").classList.remove("depois");
                    document.getElementById("passo-5").classList.add("passo-ativo");
                    document.getElementById("botao-passo4").style.display = "none";
                    document.getElementById("botao-passo5").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-5").offsetHeight+'px';
                    break;
                case 6:
                    document.getElementById("passo-5").classList.remove("passo-ativo");
                    document.getElementById("passo-5").classList.add("antes");
                    document.getElementById("passo-6").classList.remove("depois");
                    document.getElementById("passo-6").classList.add("passo-ativo");
                    document.getElementById("botao-passo5").style.display = "none";
                    document.getElementById("botao-passo6").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-6").offsetHeight+'px';
                    break;
                case 7:
                    document.getElementById("passo-6").classList.remove("passo-ativo");
                    document.getElementById("passo-6").classList.add("antes");
                    document.getElementById("passo-7").classList.remove("depois");
                    document.getElementById("passo-7").classList.add("passo-ativo");
                    document.getElementById("botao-passo6").style.display = "none";
                    document.getElementById("botao-salvar").style.display = "block";
                    document.getElementById("passo").style.height = document.getElementById("passo-7").offsetHeight+'px';
                    break;
                default:
                    break;
            }
        }
    </script>

    <script>
        function selecionarSexo(botao, animal){
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
                    <h2 class="h2-cadastro">Qual a raça do animal?</h2>
                </div>
                <div class="div-cadastro-opcao">
                    <img class="img-pets" src="imagens/cachorro/cachorro.gif">
                    <select name="raca" class="select-raca">
                        <option value="0">Raça</option>
                        <option value="Vira-lata">Vira-Lata</option>
                        <option value="Basset Hound">Basset Hound </option>
                        <option value="Beagle">Beagle </option>
                        <option value="Beagle Harrier">Beagle Harrier </option>
                        <option value="Bearded Collie">Bearded Collie </option>
                        <option value="Bedlington Terrier">Bedlington Terrier </option>
                        <option value="Bichon Frisé">Bichon Frisé </option>
                        <option value="Bloodhound">Bloodhound </option>
                        <option value="Bobtail">Bobtail </option>
                        <option value="Boiadeiro Australiano">Boiadeiro Australiano </option>
                        <option value="Boiadeiro Bernês">Boiadeiro Bernês </option>
                        <option value="Border Collie ">Border Collie </option>
                        <option value="BorzoiBorder Terrier">Border Terrier </option>
                        <option value="Borzoi">Borzoi </option>
                        <option value="Boston">Boston Terrier </option>
                        <option value="Boxer">Boxer </option>
                        <option value="Buldogue Francês">Buldogue Francês </option>
                        <option value="Buldogue Inglês">Buldogue Inglês </option>
                        <option value="Bull Terrier">Bull Terrier </option>
                        <option value="Bulmastife">Bulmastife </option>
                        <option value="Cairn Terrier">Cairn Terrier </option>
                        <option value="Cane Corso">Cane Corso </option>
                        <option value="Cão de Água Português">Cão de Água Português </option>
                        <option value="Cão de Crista Chinês">Cão de Crista Chinês </option>
                        <option value="Cavalier King Charles Spaniel">Cavalier King Charles Spaniel </option>
                        <option value="Chesapeake Bay Retriever">Chesapeake Bay Retriever </option>
                        <option value="Chihuahua">Chihuahua </option>
                        <option value="Chow Chow">Chow Chow </option>
                        <option value="Cocker Spaniel Americano">Cocker Spaniel Americano </option>
                        <option value="Cocker Spaniel Inglês">Cocker Spaniel Inglês </option>
                        <option value="Collie">Collie </option>
                        <option value="Coton de Tuléar">Coton de Tuléar </option>
                        <option value="Dachshund">Dachshund </option>
                        <option value="Dálmata">Dálmata </option>
                        <option value="Dandie Dinmont Terrier">Dandie Dinmont Terrier </option>
                        <option value="Dobermann">Dobermann </option>
                        <option value="Dogo Argentino">Dogo Argentino </option>
                        <option value="Dogue Alemão">Dogue Alemão </option>
                        <option value="Fila Brasileiro">Fila Brasileiro </option>
                        <option value="Fox Terrier">Fox Terrier</option>
                        <option value="Foxhound Inglês">Foxhound Inglês </option>
                        <option value="Galgo Escocês">Galgo Escocês </option>
                        <option value="Galgo Irlandês">Galgo Irlandês </option>
                        <option value="Golden Retriever">Golden Retriever </option>
                        <option value="Grande Boiadeiro Suiço">Grande Boiadeiro Suiço </option>
                        <option value="Greyhound">Greyhound </option>
                        <option value="Grifo da Bélgica">Grifo da Bélgica </option>
                        <option value="Husky Siberiano">Husky Siberiano </option>
                        <option value="Jack Russell Terrier">Jack Russell Terrier </option>
                        <option value="King Charles">King Charles </option>
                        <option value="Komondor">Komondor </option>
                        <option value="Labradoodle">Labradoodle </option>
                        <option value="Labrador">Labrador Retriever </option>
                        <option value="Lakeland">Lakeland Terrier </option>
                        <option value="Leonberger">Leonberger </option>
                        <option value="Lhasa Apso">Lhasa Apso </option>
                        <option value="Lulu da Pomerânia">Lulu da Pomerânia </option>
                        <option value="Malamute do Alasca">Malamute do Alasca </option>
                        <option value="Maltês">Maltês </option>
                        <option value="Mastife">Mastife </option>
                        <option value="Mastim Napolitano">Mastim Napolitano </option>
                        <option value="Mastim Tibetano">Mastim Tibetano </option>
                        <option value="Norfolk Terrier">Norfolk Terrier </option>
                        <option value="Norwich Terrier">Norwich Terrier </option>
                        <option value="Papillon">Papillon </option>
                        <option value="Pastor Alemão">Pastor Alemão </option>
                        <option value="Pastor Australiano">Pastor Australiano </option>
                        <option value="Pinscher Miniatura">Pinscher Miniatura </option>
                        <option value="Poodle">Poodle </option>
                        <option value="Pug">Pug </option>
                        <option value="Rottweiler">Rottweiler </option>
                        <option value="ShihTzu">ShihTzu </option>
                        <option value="Silky Terrier">Silky Terrier </option>
                        <option value="Skye Terrier">Skye Terrier </option>
                        <option value="Staffordshire Bull Terrier">Staffordshire Bull Terrier </option>
                        <option value="Terra Nova">Terra Nova </option>
                        <option value="Terrier Escocês">Terrier Escocês </option>
                        <option value="Tosa">Tosa </option>
                        <option value="Weimaraner">Weimaraner </option>
                        <option value="Welsh Corgi (Cardigan)">Welsh Corgi (Cardigan) </option>
                        <option value="Welsh Corgi (Pembroke) ">Welsh Corgi (Pembroke) </option>
                        <option value="West Highland White Terrier">West Highland White Terrier </option>
                        <option value="Whippet">Whippet </option>
                        <option value="Xoloitzcuintli">Xoloitzcuintli </option>
                        <option value="Yorkshire Terrier">Yorkshire Terrier</option>
                `;
                break;
                case 'gato':
                    opcoes = `
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Qual a raça do animal?</h2>
                </div>
                <div class="div-cadastro-opcao">
                    <img class="img-pets" src="imagens/gato/gato.gif">
                    <select name="raca" class="select-raca">
                        <option value="0">Raça</option>
                `;
                break;
                case 'coelho':
                    opcoes = `
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Qual a raça do animal?</h2>
                </div>
                <div class="div-cadastro-opcao">
                    <img class="img-pets" src="imagens/coelho/coelho.gif">
                    <select name="raca" class="select-raca">
                        <option value="0">Raça</option>
                `;
                break;
                case 'roedor':
                    opcoes = `
                <div class="div-cadastro-titulo">
                    <h2 class="h2-cadastro">Qual a raça do animal?</h2>
                </div>
                <div class="div-cadastro-opcao">
                    <img class="img-pets" src="imagens/roedor/roedor.gif">
                    <select name="raca" class="select-raca">
                        <option value="0">Raça</option>
                `;
                break;
            }

            var racas = JSON.parse(localStorage.getItem('racas'));

            for(raca of racas){
                opcoes += `<option value="${raca.cod_raca}">${raca.nome_raca}</option>`;
            }

            opcoes += `</select></div>`

            document.getElementById("passo-3").innerHTML = opcoes;
        }

        function selecionarRaca(botao, raca){
            var botaoAtivo = document.getElementsByClassName("ativo");
            if(botaoAtivo.length > 0){
                botaoAtivo[0].classList.remove("ativo");
            }
            botao.classList.add("ativo");
            botao.nextSibling.nextSibling.checked = true;
            document.getElementById("passo-3").innerHTML = opcoes;
        }

    </script>

    <!-- Preco animal show hide-->

    <script>
        var a;
            function show_hide()
            {

                if(a==1)
                    {
                        document.getElementById("preco-animal").style.display="inline";
                        return a=0;
                    }

                else
                    {
                        document.getElementById("preco-animal").style.display="none";
                        return a=1;
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

<!-- ABRIR E FECHAR MODAL PAGINA DA ONG -->

<script  type="text/javascript">
    function abrirModal() {
        document.getElementById('modal').style.top = "0";
    }
    function fecharModal() {
        document.getElementById('modal').style.top="-100%";
    }
</script>

<!-- data de nascimento -->

<script>
    $(document).ready(function() {
        $('#birthday').focus(function() {
            $(this).attr('type', 'date');
        });

        $('#birthday').blur(function() {
            $(this).attr('type','text');
        });
    });
</script>

<!-- data de nascimento -->

<script>
    $(document).ready(function() {
        $('#venda').change(function() {
            $('label[for=venda]').css('border', '3px solid #1ae8ad');
            $('label[for=adocao]').css('border', '3px solid #49bf9d');
            $('label[for=namoropet]').css('border', '3px solid #49bf9d');
            $('#preco-animal').css('display', "inline");
        });

        $('#adocao').change(function() {
            $('label[for=venda]').css('border', '3px solid #49bf9d');
            $('label[for=adocao]').css('border', '3px solid #1ae8ad');
            $('label[for=namoropet]').css('border', '3px solid #49bf9d');
            $('#preco-animal').css('display', "none");
        });
        
        $('#namoropet').change(function() {
            $('label[for=venda]').css('border', '3px solid #49bf9d');
            $('label[for=adocao]').css('border', '3px solid #49bf9d');
            $('label[for=namoropet]').css('border', '3px solid #1ae8ad');
            $('#preco-animal').css('display', "none");
        });
    });
</script>

<!-- janela inf animal doação-->
<script  type="text/javascript">
    function abrirModalPet() {
        document.getElementById('modal-pet').style.top = "0";
    }
    function fecharModalPet() {
        document.getElementById('modal-pet').style.top="-100%";
    }
</script>
<!-- janela inf animal venda-->
<script  type="text/javascript">
    function abrirModalCompra() {
        document.getElementById('modal-pet-venda').style.top = "0";
    }
    function fecharModalCompra() {
        document.getElementById('modal-pet-venda').style.top="-100%";
    }
</script>

<!-- janela inf animal namoro-->
<script  type="text/javascript">
    function abrirModalNamoro() {
        document.getElementById('modal-pet-namoro').style.top = "0";
    }
    function fecharModalNamoro() {
        document.getElementById('modal-pet-namoro').style.top="-100%";
    }
</script>

<!-- janela denuncia-->
<script  type="text/javascript">
    function abrirAlert(){
        window.alert('Infelizmente nosso sistema de denúncia não foi finalizado')
    }
</script>


</body>
</html>