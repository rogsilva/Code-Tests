<?php
//Chamada do autoload
require_once "bootstrap.php";

//Pega a Conexão PDO
$pdo = new \CODE\DB\Connection();
//Inicializa as fixtures
(new \CODE\Fixtures\Fixtures())->init($pdo->get());

//Seleciona os options do select
$stmt = $pdo->get()->prepare('select * from categorias');
$stmt->execute();
$options = [''=>''];
foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $categoria){
    $options[$categoria->id] = $categoria->nome;
}



$validator = new \CODE\Form\Validator\Validator();
//Form Protótipo
$form =  new \CODE\Form\Form($validator);

//Formulário de Cadastro
$formCadastro = clone $form;

$fieldset1 = new \CODE\Form\Elements\Fieldset('field1', 'Formulário de Cadastro');

$nome = new \CODE\Form\Elements\Text('nome');
$nome->setLabel('Nome');
$fieldset1->add($nome);

$valor = new \CODE\Form\Elements\Text('valor');
$valor->setLabel('Valor');
$fieldset1->add($valor);

$descricao = new \CODE\Form\Elements\Text('descricao');
$descricao->setLabel('Descrição');
$fieldset1->add($descricao);

$categoria = new \CODE\Form\Elements\Select('categoria', $options);
$categoria->setLabel('Categoria');
$fieldset1->add($categoria);

$formCadastro->add($fieldset1);


$submit = new CODE\Form\Elements\Submit('enviar', 'Enviar');
$formCadastro->add($submit);


$dados = [
            "nome"=>"",
            "descricao"=>"Lorem Ipsum ...",
            "valor" => 12.99,
        ];

$formCadastro->populate($dados);


$formCadastro->getValidator()->addRule(
    array(
        'element' => $nome,
        'rules' => array(
            array(
                'rule' => 'is_required'
            )
        )
    )
);
$formCadastro->getValidator()->addRule(
    array(
        'element' => $valor,
        'rules' => array(
            array(
                'rule' => 'is_numeric'
            )
        )
    )
);
$formCadastro->getValidator()->addRule(
    array(
        'element' => $descricao,
        'rules' => array(
            array(
                'rule' => 'max_length',
                'params' => array(
                    'max' => 200
                )
            )
        )
    )
);

var_dump($formCadastro->getValidator()->validate());

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aula Code Education - Foundation">
    <meta name="author" content="Rogério SIlva">

    <title>Code Education - Design Patterns</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo "http://".$_SERVER['HTTP_HOST']?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo "http://".$_SERVER['HTTP_HOST']?>/css/custom.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="<?php echo "http://".$_SERVER['HTTP_HOST']?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo "http://".$_SERVER['HTTP_HOST']?>/js/bootstrap.js"></script>


</head>

<body>


<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Design Patterns</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->

    </div>
    <!-- /.container -->
</nav>

<div class="container">


    <div class="row">
        <div class="col-lg-6">
            <?php if($formCadastro->getValidator()->getMessages()):?>
            <ul>
                <?php echo $formCadastro->getValidator()->getMessages();?>
            </ul>
            <?php endif;?>
            <?php echo $formCadastro->openTag();?>

            <?php echo $formCadastro->createField('field1');?>

            <?php echo $formCadastro->createField('enviar');?>

            <?php echo $formCadastro->closeTag();?>
        </div>
    </div>


    <footer class="navbar-fixed-bottom ">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Todos os direitos reservados - <?php echo date('Y');?></p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->


</body>

</html>