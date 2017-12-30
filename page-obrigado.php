<?php
// Faz validação dos dados recebidos do formulário
$senderName = filter_var($_POST['name'], FILTER_DEFAULT);
$senderEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senderTel = filter_var($_POST['telefone'], FILTER_DEFAULT);
$senderMsg = filter_var($_POST['message'], FILTER_DEFAULT);
$senderAssunto = filter_var($_POST['assunto'], FILTER_DEFAULT);

// Corpo do e-mail que será enviado
$MSG = "<h2>Que Legal! Acabou de chegar uma solicitação via Site!</h2>"
        . "<p><b>Nome</b>: $senderName<br>"
        . "<b>E-mail</b>: $senderEmail<br>"
        . "<b>Tel</b>: $senderTel<br>"
        . "<b>Mensagem:</b> $senderMsg</p>";

// Função nativa do WC para enviar e-mail
$Email = new Email;
if ($_SERVER ['HTTP_HOST'] != 'localhost'):
    $Email->EnviarMontando($senderAssunto, $MSG, "[Contato via Site]", $senderEmail, "NOME", "E-MAIL"); //NOME e E-MAIL de quem irá receber a mensagem
endif;

// Tratamento de Erros
if ($Email->getError()):
    echo "<p style='font-size:1.2em;text-align:center;'>Desculpe, isso é muito vergonhoso, mas, não sabemos o que houve, por favor, envie direto para " . SITE_ADDR_EMAIL . ", ou, ligue para " . SITE_ADDR_PHONE . "</p>";
else:
    echo "<p style='font-size:1.2em;text-align:center;'>" . $senderName . ", o seu e-mail foi recebido com sucesso, inclusive, já encaminhado para o <b>Marcos Silva</b> que será o Consultor que irá lhe atender, ele te retornará em breve!</p>";
endif;

// Captação dos dados de Site de Referência e Campanha
if (isset($_COOKIE['refer_cookie'])):
    $CookieRefer = $_COOKIE['refer_cookie'];
else:
    $CookieRefer = NULL;
endif;

if (isset($_COOKIE['refer_cookie_date'])):
    $CookieReferData = $_COOKIE['refer_cookie_date'];
else:
    $CookieReferData = NULL;
endif;

if (isset($_SESSION['refer_session'])):
    $SessaoRefer = $_SESSION['refer_session'];
else:
    $SessaoRefer = NULL;
endif;

if (isset($_COOKIE['campaign_cookie'])):
    $CookieCampaign = $_COOKIE['campaign_cookie'];
else:
    $CookieCampaign = NULL;
endif;

if (isset($_COOKIE['campaign_cookie_keyword'])):
    $CookieCampaignKeyword = $_COOKIE['campaign_cookie_keyword'];
else:
    $CookieCampaignKeyword = NULL;
endif;

if (isset($_COOKIE['campaign_cookie_date'])):
    $CookieCampaignDate = $_COOKIE['campaign_cookie_date'];
else:
    $CookieCampaignDate = NULL;
endif;

if (isset($_SESSION['campaign_session'])):
    $SessaoCampaign = $_SESSION['campaign_session'];
else:
    $SessaoCampaign = NULL;
endif;

// Preparação dos dados para gravação no banco
$SalesFormCreate = [
    'sales_form_title' => $senderAssunto,
    'sales_form_content' => $senderMsg,
    'sales_form_name' => $senderName,
    'sales_form_email' => $senderEmail,
    'sales_form_fone' => $senderTel,
    'sales_form_refer_first' => $CookieRefer,
    'sales_form_refer_first_date' => $CookieReferData,
    'sales_form_refer_last' => $SessaoRefer,
    'sales_form_campaign_first' => $CookieCampaign,
    'sales_form_campaign_keyword' => $CookieCampaignKeyword,
    'sales_form_campaign_first_date' => $CookieCampaignDate,
    'sales_form_campaign_last' => $SessaoCampaign,
    'sales_form_date' => date('Y-m-d H:i:s'),
    'sales_form_type' => 1,
    'sales_form_status' => 1
];

// Tratamento dos dados e gravação no banco
$SalesFormCreate = array_map("strip_tags", $SalesFormCreate);
$SalesFormCreate = array_map("trim", $SalesFormCreate);
$Create->ExeCreate('ws_sales_form', $SalesFormCreate);
?>