# captacao-form-wc BETA
Captação de formulários do WC para um Banco de Dados.

1. Dentro da pasta 'app' no primeiro arquivo Config.inc.php criar um define para o novo banco:

define('DB_SALES_FORM', 'ws_sales_form'); //Tabela de BKP do Formulário

2. Subir a tabela para o banco de dados.

3. O arquivo header.php contém os códigos para captação de URLs de referência que mostra de onde veio o seu usário e criação da variável campaign para inserção de campanhas na URL do site para captação. Você pode colocar como sugerido no arquivo header.php ou qualquer outro lugar que fique o mais alto possível e que conste em todas as páginas.

4. O arquivo page-contato.php tem apenas o formulário de contato para captação dos dados, fique a vontade para estilizar.

5. O arquivo page-obrigado.php tem os códigos para recebimento dos dados, tratamento dos mesmos, envio com função nativa do WC, captação das informações de URL e Campanha e gravação no banco de dados.

6. Dentro da pasta admin/siswc inserir a pasta form.

7. Dentro da pasta admin/siswc arquivo wc_menu.php inserir chamada para os formulários na Dashboard:

<li class="dashboard_nav_menu_li <?= strstr($getViewInput, 'form/') ? 'dashboard_nav_menu_active' : ''; ?>"><a class="icon-list" title="Backup Formulário" href="dashboard.php?wc=form/home">Formulários</a></li>

__OBSERVAÇÕES__
Caso queira, pode descartar o arquivo header.php e toda a parte de sessão e cookie do page-obrigado.php e usar apenas a parte para gravar dados no banco.

Caso queira alterar, retirar ou acrescentar algum campo não esqueça de acrescentar o mesmo no DB e no arquivo page-obrigado.php

A criação de URL e Campanha são úteis para saber de onde vem o contato do seu site, você pode usar, por exemplo, site.com.br/&campaing=facebook, &campaing=googleAdwords, &campaing=linkedin, etc. em sua URL e irá captar essa informação quando vindo de uma dessas campanhas e quando não terá a captação da URL cedida pelo próprio navegador, não é 100% de todas as captações, porém, pega muito bem as referências.
