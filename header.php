<!-- PRECISA ESTAR EM TODAS AS PÁGINAS, SUGIRO INSERIR NO ARQUIVO HEAD DE INCLUSÃO -->
<?php
$siteReferencia = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";

// Marca cookie com referência da URL do site de onde o visitante veio por 90 dias
if (!isset($_COOKIE['refer_cookie'])):
    setcookie('refer_cookie', $siteReferencia, (time() + (90 * 24 * 3600)));
    setcookie('refer_cookie_date', date('Y-m-d'), (time() + (90 * 24 * 3600)));
endif;

// Marca uma sessão com referência da URL do site de onde o visitante veio
if (!isset($_SESSION['refer_session'])):
    $_SESSION['refer_session'] = $siteReferencia;
endif;

$Campaign = filter_input(INPUT_GET, 'campaign', FILTER_DEFAULT);
$Keyword = filter_input(INPUT_GET, 'keyword', FILTER_DEFAULT);

// Marca cookie com referência da Campanha de onde o visitante veio por 90 dias - usar na URL &campaign=
if (!isset($_COOKIE['campaign_cookie'])):
    setcookie('campaign_cookie', $Campaign, (time() + (90 * 24 * 3600)));
    setcookie('campaign_cookie_keyword', $Keyword, (time() + (90 * 24 * 3600)));
    setcookie('campaign_cookie_date', date('Y-m-d'), (time() + (90 * 24 * 3600)));
endif;

// Marca uma sessão com referência da Campanha de onde o visitante veio - usar na URL &campaign=
if (!isset($_SESSION['campaign_session'])):
    $_SESSION['campaign_session'] = $Campaign;
    $_SESSION['campaign_session_keyword'] = $Keyword;
endif;
?>