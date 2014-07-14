<div class="modal" id="cadModal" tabindex="-1">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Cadastrar</h4>
        </div>
        <form method="post">
          <div class="modal-body">
              <input type="text" placeholder="Nome completo" id="usNome" name="usNome" value="<%= nome %>" class="form-control" /><br>
              <input type="text" placeholder="Email" id="usEmail" name="usEmail" value="<%= _id %>" class="form-control" /><br>
              <input type="text" placeholder="CPF" id="cpf" name="cpf" value="<%= cpf %>" class="form-control" /><br>
              <input type="password" placeholder="Senha" id="senha" name="senha" value="<%= senha %>" class="form-control" /><br>
              <input type="password" placeholder="Confirme a senha" id="senhaConf" name="senhaConf" class="form-control" /><br>
          </div>
          <div class="modal-footer form-actions">
            <a href="#" data-dismiss="modal" class="btn">Fechar</a>
            <a href="#" id="cadastrar" class="btn btn-primary">Cadastrar</a>
          </div>
        </form>
      </div>
    </div>
</div>