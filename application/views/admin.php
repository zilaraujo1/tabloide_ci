<?php $this->load->view('commons/header')  ?>
<main class="container" >
    <div class="row  m-5">
        <div class="col-sm-12 col-md-4 " >
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nome">Estabelecimento</label>
                  <input type="text" class="form-control" id="nome" name="nome"  placeholder="Entre com o nome do estabelecimento">
               </div>
                <div class="form-group">
                  <label for="endereco">Endereco</label>
                  <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço do estabelecimento">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone">
                </div>
                <div class="form-group">
                    <label for="horario">Horário de atendimento</label>
                    <input type="text" class="form-control" id="hora_fun" name="hora_func" placeholder="Horáro de atendimento">
                </div>
                <div class="form-group">
                    <label for="descricao">Apresentação</label>
                    <textarea style="height:150px ;" class="form-control" id="descricao" name="descricao"></textarea>
                </div>
                <div class="form-group">
                    <label for="imagem">Foto do estabelecimento</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="form-group">
                  <label for="imagem">Foto do estabelecimento</label>
                  <input type="file" class="form-control" id="fotob" name="fotob">
              </div>
              <div class="form-group">
                <label for="imagem">Foto do estabelecimento</label>
                <input type="file" class="form-control" id="fotoc" name="fotoc">
            </div>
            <div class="form-group">
              <label for="imagem">Foto do estabelecimento</label>
              <input type="file" class="form-control" id="fotod" name="fotod">
          </div>
                <div class="form-group">
                    
                    <input type="hidden" class="form-control" id="user" name="user" value="{{ user.id }}">
                </div>
            
                <button type="submit" class="btn btn-primary" onclick="return valida_estab()">Submit</button>
              </form>

        </div>
        <div class="col-sm-12 col-md-8 " >
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">endereço</th>
                    <th scope="col">telefone</th>
                  </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <th scope="row"><?php echo $dono->id; ?></th>
                    <td>{{ result.nome }}</td>
                    <td>{{ result.endereco }}</td>
                    <td>{{ result.telefone }}</td>
                  </tr>
                
                 
                </tbody>
              </table>
            
              <div class="col-md-12 ">
                  <button class="btn btn-primary preview" type="button" ><a href="/editar/{{ user.id }}">Edição de itens</a></button>
                  <button class="btn btn-success preview" type="button" ><a href="/form/{{ user.id }}">Cadastrar Itens</a></button>
                  <button class="btn btn-success preview" type="button" ><a href="/form_servico/{{ user.id }}">Cadastrar serviços</a></button>
              </div>
        </div>
        
        
        
       

        </div>









            <div class="preview">
                
                
                <h1>{{ user.nome_mercado }}</h1>
                <di>
            </div>
    </div>
</main>
<?php $this->load->view('commons/footer')  ?>