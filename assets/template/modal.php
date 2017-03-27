    <div class="modal fade" id="modal_cadastro" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
        <div class="modal-content">
          <form id="cadastrar">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cadastrar</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="op" value="cadastrar" />
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['login']['id'];?>" />
              <div class="linha">
                Titulo:
              </div>
              <div class="linha">
                <input type="text" name="titulo" class="titulo" id="titulo"/>
              </div>
              <div class="linha">
                Prazo:
              </div>
              <div class="linha">
                <input type="text" name="prazo" class="prazo form_datetime" id="prazo"/>
              </div>
             <div class="linha">
                Descrição:
                </div>
              <div class="linha">
                <textarea name="descricao" class="descricao" id="descricao"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default reset" data-dismiss="modal">Fechar</button>
              <button type="button" id="submit_cadastrar" class="btn btn-default" data-dismiss="modal">Salvar</button>
            </div>
          </form>
        </div>
        </div>
      </div>

    <div class="modal fade" id="modal_editar" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
        <div class="modal-content">
          <form id="editar">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edição</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="op" value="editar" />
              <input type="hidden" name="id" class="id" value="" />
              <div class="linha">
                Titulo:
              </div>
              <div class="linha">
                <input type="text" name="titulo" class="titulo" />
              </div>
              <div class="linha">
                Prazo:
              </div>
              <div class="linha">
                <input type="text" name="prazo" class="prazo form_datetime" />
              </div>
              <div class="linha">
                Usuário:
              </div>
              <div class="linha">
                <select name="id_usuario" class="usuario">
                </select>
              </div>
             <div class="linha">
                Descrição:
                </div>
              <div class="linha">
                <textarea name="descricao" class="descricao"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default reset" data-dismiss="modal">Fechar</button>
              <button type="button" id="submit_excluir" class="btn btn-default" data-dismiss="modal">Excluir</button>
              <button type="button" id="submit_editar" class="btn btn-default" data-dismiss="modal">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

 <!-- Tarefas Fim -->

  <!-- Avisos Inicio -->
    <div class="modal fade" id="modal_msg" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <div class="linha">
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
        
      </div>
    </div>
    <input type="hidden" data-toggle="modal" data-target="#modal_msg" class="modal_msg"/>
    
    <!-- Avisos Fim -->

    <!-- Usuarios Inicio -->

      <div class="modal fade" id="modal_cadastro_usuario" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <form id="cadastro_usuario" role="form"> 
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cadastro</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="op" value="cadastrar" />
              <div class="linha">
                Nome:
              </div>
              <div class="linha">
                <input type="text" name="nome" class="nome" id="nome" />
              </div> 
              <div class="linha">
                Email:
              </div>
              <div class="linha">
                <input type="text" name="email" class="email" id="email" />
              </div> 
              <div class="linha">
                Senha:
              </div>
              <div class="linha">
                <input type="password" name="senha" class="senha" id="senha" />
              </div> 
              <div class="linha">
                Tipo:
              </div>
              <div class="linha">
                <select name="tipo" class="tipo">
                    <option value="1">Normal</option>
                    <option value="2">Administrador</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default reset" data-dismiss="modal">Fechar</button>
              <button type="button" id="submit_cadastro_usuario" class="btn btn-default" data-dismiss="modal">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

      <div class="modal fade" id="modal_editar_usuario" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <form id="editar_usuario" role="form"> 
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="op" value="editar" />
              <input type="hidden" name="id" class="id" />
              <div class="linha">
                Nome:
              </div>
              <div class="linha">
                <input type="text" name="nome" class="nome" id="nome" />
              </div> 
              <div class="linha">
                Email:
              </div>
              <div class="linha">
                <input type="text" name="email" class="email" id="email" />
              </div> 
              <div class="linha">
                Senha:
              </div>
              <div class="linha">
                <input type="password" name="senha" class="senha" id="senha" />
              </div> 
              <div class="linha">
                Tipo:
              </div>
              <div class="linha">
                <select name="tipo" class="tipo">
                    <option value="1">Normal</option>
                    <option value="2">Administrador</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default reset" data-dismiss="modal">Fechar</button>
              <button type="button" id="submit_excluir_usuario" class="btn btn-default" data-dismiss="modal">Excluir</button>
              <button type="button" id="submit_editar_usuario" class="btn btn-default" data-dismiss="modal">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Usuarios Fim -->