
<?php $this->load->view('commons/header')  ?>

<main class="container" >
  <h2><?php echo $titulo ?></h2>
  <?php
if ($msg = get_msg()) :
    echo '<div class="msg-box">' . $msg . '</div>';
endif;
    
?>

<form action="<?php echo base_url('Servico/cadastro_servico'); ?>" method="POST" enctype="multipart/form-data">
 
<?php   if (isset($dono)):  ?>  
          
            <div class="form-row">
                <div class="form-group">
                    <div class="col-md-6 ">
                        <input type="text" id="estab_fk" name="estab_fk" value="<?php echo $dono->user_fk; ?>">
                        
                    </div>
                </div>
                
    <!------------------------ -->    
    
                  </table>
                  <?php else: ?>
                    Sem dono
        <?php endif; ?>
        
        
        <div class="form-group">
            <div class="col-md-6 ">
                <label for="tipo_item">Tipo de Serviço:</label>
                <select class="form-select" name="tipo" id="tipo" aria-label="Default select example">
                    <option value="">Selecione o serviço</option>
                    <option value="Corte de cabelo">Corte de cabelo</option>
                    <option value="Manicure-Esmalterias">Manicure-Esmalterias</option>
                    <option value="Alimentação">Alimentação</option>
                    <option value="Limpeza">Limpeza</option>
                    <option value="Transporte">Transporte</option>
                    <option value="Locação">Locação</option>
                    <option value="Cursos">Cursos</option>
                    <option value="Jardinagem">Jardinagem</option>
                    <option value="Reparos/manuntenção">Reparos/manutenção</option>

                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 ">
                <label for="descricao">Legenda:</label>
                <textarea type="descricao" class="form-control" id="descricao" name="descricao"></textarea>
            </div>
        </div>
    <div class="form-group">
        <div class="col-md-6 ">
      <label for="valor">Preço do Serviço:</label>
      <input type="text" class="form-control" id="valor" name="valor" placeholder="Digite o valor do serviço">
        </div>
    </div>



    <div class="form-group">
        <div class="col-md-6 ">
            <label for="horario">Horário de atendimento:</label>
            <input type="text" class="form-control" id="horario_func" name="horario_func" placeholder="Digite o horário de atendimento">

        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 ">

            <label for="data-final-promo">Foto 1:</label>
            <input id="foto" type="file" class="form-control"  name="foto">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 ">

            <label for="data-final-promo">Foto 2:</label>
            <input id="fotob" type="file" class="form-control"  name="fotob">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 ">

            <label for="data-final-promo">Foto 3:</label>
            <input id="fotoc" type="file" class="form-control"  name="fotoc">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 ">

            <label for="data-final-promo">Foto 4:</label>
            <input id="fotod" type="file" class="form-control"  name="fotod">
        </div>
    </div>

    <br><br>
</div>
<div id="cadastrar">
        <button type="submit" class="btn btn-primary" >Salvar</button>
    </div>

</form>


</div>

<?php $this->load->view('commons/footer')  ?>
