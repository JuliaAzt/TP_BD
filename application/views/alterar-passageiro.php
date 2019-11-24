<div id="page-wrapper">
 <div class="row">
   &nbsp;
 </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php 
                        
                            echo 'Alterar Passageiro';
                         ?>
                      
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             
                               


                                  <div class="col-lg-12">
                                    
                                    <?php echo validation_errors('<div class="alert alert-danger">','</div>');
                                    echo form_open('passageiros/salvar_alteracoes');
                                    foreach ($passageiros as $passageiro) {

                                    ?>
                                    <div class="form-group">

                                            <label id="txt-Nome">Nome da passageiro</label>
                                            <input type="text" id="txt-Nome" name="txt-Nome" class="form-control" value="<?php echo $passageiro->Nome  ?>">
 
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-CPF">CPF</label>
                                            <input type="text" id="txt-CPF" readonly="readonly" name="txt-CPF" class="form-control"  value="<?php echo $passageiro->CPF  ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-Telefone">Telefone</label>
                                            <input type="text" id="txt-Telefone" name="txt-Telefone" class="form-control"  value="<?php echo $passageiro->Telefone ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-Endereco">Endereço</label>
                                            <input type="text" id="txt-Endereco" name="txt-Endereco" class="form-control"  value="<?php echo $passageiro->Endereco ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-datanasc">Data de Nascimento</label>
                                            <input type="text" id="txt-datanasc" name="txt-datanasc" class="form-control"  value="<?php echo $passageiro->Data_Nasc ?>">

                                     </div>
                                      <div class="form-group">
                                            <label id="txt-passaporte">Passaporte</label>
                                            <input type="text"  id="txt-passaporte" name="txt-passaporte" class="form-control"  value="<?php echo $passageiro->Passaporte   ?>">
                                     </div>


                                     

                                      <button type="submit" class="btn btn-default">Atualizar</button>
                                    <?php
                                    
                                  }
                                    echo form_close();
                                    ?>


                                </div>
                          
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                 
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    