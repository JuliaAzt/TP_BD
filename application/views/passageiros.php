
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo 'Administrar - '.$subtitulo?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo 'Adicionar Novo Usuário'?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    

                                    <?php echo validation_errors('<div class="alert alert-danger">','</div>');
                                    echo form_open('passageiros/inserir');
                                    ?>
                                     
                                        <div class="form-group">
                                              <label id="txt-Nome">Nome do Passageiro</label>
                                              <input type="text" id="txt-Nome" name="txt-Nome" class="form-control" value="<?php echo set_value('txt-Nome');  ?>">
                                        </div>
                                        <div class="form-group">
                                              <label id="txt-CPF">CPF</label>
                                              <input type="text" id="txt-CPF" name="txt-CPF" class="form-control"  value="<?php echo set_value('txt-CPF');  ?>">
                                        </div>
                                        <div class="form-group">
                                              <label id="txt-Telefone">Telefone</label>
                                              <input type="text" id="txt-Telefone" name="txt-Telefone" class="form-control" value="<?php echo set_value('txt-Telefone');  ?>">
                                        </div>
                                        <div class="form-group">
                                              <label id="txt-Endereco">Endereço</label>
                                              <input type="text" id="txt-Endereco" name="txt-Endereco" class="form-control" value="<?php echo set_value('txt-Endereco');  ?>">
                                        </div>
                                        <div class="form-group">
                                              <label id="txt-datanasc">Data de Nascimento</label>
                                              <input type="text" id="txt-datanasc" name="txt-datanasc" class="form-control"  value="<?php echo set_value('txt-datanasc');  ?>">

                                        </div>
                                        <div class="form-group">
                                              <label id="txt-passaporte">Passaporte</label>
                                              <input type="text"  id="txt-passaporte" name="txt-passaporte" class="form-control"  value="<?php echo set_value('txt-passaporte');  ?>">
                                        </div>

                                     
                                      <button type="submit" class="btn btn-default">Cadastrar</button>
                                    <?php
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
              
 
            <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo 'Administrar '.$subtitulo.' Existentes'?>
                
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                        $this->table->set_heading("Nome do passageiro", "Alterar", "Excluir");
                                        foreach ($passageiros as $passageiro) {
                                            $nomeuser= $passageiro->Nome;
                                            $alterar= anchor(base_url('passageiros/alterar/'.$passageiro->CPF), ' <i class="fa fa-refresh fa-fw"></i>Alterar');
                                            $excluir= anchor(base_url('passageiros/excluir/'.$passageiro->CPF), 
                                                '<i class="fa fa-remove fa-fw"></i> Excluir');
                                            $this->table->add_row($nomeuser, $alterar, $excluir);
                                        }
                                        $this->table->set_template(array(
                                            'table_open' => '<table class= "table table-striped">'
                                        ));
                                        echo $this->table->generate();
                                    ?>
                                    
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>