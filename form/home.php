<?php
$AdminLevel = LEVEL_WC_PAGES;
if (!APP_PAGES || empty($DashboardLogin) || empty($Admin) || $Admin['user_level'] < $AdminLevel):
    die('<div style="text-align: center; margin: 5% 0; color: #C54550; font-size: 1.6em; font-weight: 400; background: #fff; float: left; width: 100%; padding: 30px 0;"><b>ACESSO NEGADO:</b> Você não esta logado<br>ou não tem permissão para acessar essa página!</div>');
endif;

// AUTO INSTANCE OBJECT READ
if (empty($Read)):
    $Read = new Read;
endif;
?>

<header class="dashboard_header">
    <div class="dashboard_header_title">
        <h1 class="icon-paragraph-justify">Solicitações</h1>
        <p class="dashboard_header_breadcrumbs">
            &raquo; <?= ADMIN_NAME; ?>
            <span class="crumb">/</span>
            <a title="<?= ADMIN_NAME; ?>" href="dashboard.php?wc=home">Dashboard</a>
            <span class="crumb">/</span>
            Formulários
        </p>
    </div>

    <div class="dashboard_header_search">
    </div>

</header>
<div class="dashboard_content">
    <?php
    $getPage = filter_input(INPUT_GET, 'pg', FILTER_VALIDATE_INT);
    $Page = ($getPage ? $getPage : 1);
    $Paginator = new Pager('dashboard.php?wc=sales/solicitacoes&pg=', '<<', '>>', 5);
    $Paginator->ExePager($Page, 12);

    $Read->ExeRead(DB_SALES_FORM, "WHERE sales_form_status = :status ORDER BY sales_form_date DESC", "status=1");

    if (!$Read->getResult()):
        $Paginator->ReturnPage();
        echo Erro("<span class='al_center icon-notification'>Ainda não existe nenhuma solicitação!</span>", E_USER_NOTICE);
    else:
        foreach ($Read->getResult() as $PAGE):
            extract($PAGE);
            echo "<article class='box box25 page_single wc_draganddrop' callback='Custom_Sales' callback_action='pages_order' id='{$sales_form_id}'>
                <div class='box_content wc_normalize_height'>
                    <h1 class='title'>{$sales_form_title}</h1>
                    <p style='margin-bottom:10px;'><b>Descritivo:</b><br>{$sales_form_content}</p>
                    <p><b>Nome:</b> {$sales_form_name}<br>
                    <b>Email:</b> {$sales_form_email}<br>
                    <b>Telefone:</b> {$sales_form_fone}<br></p>
                    <b>Solicitado em:</b> " . date('d/m/Y \à\s H:i\h', strtotime($sales_form_date)) . "<br></p>
                    <b>Campanha:</b> ". ucfirst($sales_form_campain_first)."<br></p>
                </div>
                <div class='page_single_action'>
                    <span rel='page_single' class='j_delete_action icon-cancel-circle btn btn_red' id='{$sales_form_id}'>Excluir</span>
                    <span rel='page_single' callback='Custom_Sales' callback_action='ocultaorcamento' class='j_delete_action_confirm icon-warning btn btn_yellow' style='display: none' id='{$sales_form_id}'>Deletar?</span>
                </div>
            </article>";
        endforeach;
    endif;
    ?>
</div>