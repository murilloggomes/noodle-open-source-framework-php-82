 <h4 class="header-title">Configurações de Cargos</h4>
        <p class="text-muted font-14 mb-3">Gerencie e adicione cargos para o sistema. </p>
        <form action="" id="general-settings-form" class="general-form dashed-row" role="form" method="post" accept-charset="utf-8">
          <div class="card">
            <div class="card-header">
              <h4 class="d-inline-block">Páginas</h4>
              <div class="d-inline-block float-end" style="margin-top:4px;">
                <button type="button" class="btn btn-primary btn-sm ms-3 bs-none" onclick="edicaoPagina()" data-bs-toggle="modal" data-bs-target="#modalPaginas">Adicionar nova página</button>
              </div>
            </div>
            <table id="paginas-table" class="table dt-responsive nowrap w-100">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Uri</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php  foreach($Paginas->getDataAs("Pagina") as $p): ?>
                <tr>
                  <td>
                    <?= $p->get("id"); ?>
                  </td>
                  <td>
                    <?= $p->get("nome"); ?>
                  </td>
                  <td>
                    <?= $p->get("uri"); ?>
                  </td>
                  <?php if($p->get("status") == "1"): ?>
                  <td><span class="badge badge-success-lighten"><span class="green-text">Ativo</span></span>
                  </td>
                  <?php else: ?>
                  <td><span class="badge badge-danger-lighten"><span class="red-text">Desativado</span></span>
                  </td>
                  <?php endif; ?>
                
                  <td>
                    <button onclick="edicaoPagina(<?= $p->get("id") ?>)" style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#modalPaginas">		<i class="fa fa-pencil"></i>	</button>
                     <a style="color:black;" href="javascript:void(0)" class="tooltipped remover-dados" data-type="Pagina" data-id="<?= $p->get("id"); ?>"data-position="top" data-tooltip="Remover"><i class="fa fa-times" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!--                       <div class="card-footer">
                          <button type="submit" class="btn btn-primary bs-none"><span data-feather="check-circle"></span> Salvar</button>
                      </div> -->
          </div>
        </form>

        <div id="modalPaginas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Páginas</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
               <input type="hidden" id="pag">
              <div class="modal-body">
                <div class="row">
                  <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="active" for="nome-equipe">Nome<span> *</span></label>
                    <input name="nome_pagina" id="nome_pagina" type="text" class="form-control nome" value="" required>
                  </div>
                  <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="active status-equipe" for="status-equipe">Status<span> *</span></label>
                    <select required name="status_pagina" id="status_pagina" class="form-control select2 status" required>                 
                      <option selected disabled="">Selecione</option>
                      <option value="1">Ativo</option>
                      <option value="2">Desativado</option>
                    </select>
                  </div>
                  <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="active" for="nome-equipe">Uri<span> *</span></label>
                    <input name="uri" id="uri" type="text" class="form-control nome" value="" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                <button type="button" onclick="SalvaPagina()"  data-value="" class="btn btn-primary bs-none ">Salvar</button>
              </div>
            </div>
          </div>
        </div>