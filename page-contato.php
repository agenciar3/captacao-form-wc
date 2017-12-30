<form action="<?= BASE; ?>/obrigado" method="post" enctype="multipart/form-data" class="form">
    <div class="box box-2">
        <label>
            <i class="fa fa-user"></i>
            <span>Primeiro Nome:</span>
            <input type="text" placeholder="Como gostaria de ser chamado?" name="name" required/>
        </label>

        <label>
            <i class="fa fa-envelope"></i>
            <span>E-mail:</span>
            <input type="email" placeholder="Qual e-mail podemos lhe dar o retorno?" name="email" required/>
        </label>
    </div>

    <div class="box box-2">
        <label>
            <i class="fa fa-phone"></i>
            <span>Telefone:</span>
            <input type="phone" placeholder="Telefone..." name="telefone" class="formPhone" required/>
        </label>

        <label>
            <i class="fa fa-tag"></i>
            <span>Assunto:</span>
            <input type="text" placeholder="Qual assunto deseja tratar?" name="assunto" required/>
        </label>
    </div>

    <label>
        <i class="fa fa-list"></i>
        <span>Mensagem:</span>
        <textarea rows="5" placeholder="Descreva sua necessidade..." name="message" required></textarea>
    </label>

    <button type="submit" class="btn" style="margin-top:0;margin-bottom:50px;font-size:1rem;padding: 15px 30px !important;">Solicitar Contato</button>
</form>