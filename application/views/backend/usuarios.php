
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
                                    echo form_open('admin/usuarios/inserir');
                                    ?>
                                      <div class="form-group">
                                            <label id="txt-nome">Nome da Usuario</label>
                                            <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo set_value('txt-nome');  ?>">
                                     </div>

                                     <div class="form-group">
                                            <label id="txt-user">User</label>
                                            <input type="text"  id="txt-user" name="txt-user" class="form-control" placeholder="Digite o user do usuário" value="<?php echo set_value('txt-user');  ?>">
                                     </div>

                                      <div class="form-group">
                                            <label id="txt-email">Email</label>
                                            <input type="text" id="txt-email" name="txt-email" class="form-control" placeholder="Digite o email do usuario" value="<?php echo set_value('txt-email');  ?>">
                                     </div>
                                     <div class="form-group">
                                            <label id="txt-estado">Estado</label>
                                            <input type="text" id="txt-estado" name="txt-estado" class="form-control" placeholder="Digite o estado do usuario" value="<?php echo set_value('txt-estado');  ?>">
                                     </div>
                                     <div class="form-group">
                                            <label id="txt-estado">Cidade</label>
                                            <input type="text" id="txt-nome" name="txt-cidade" class="form-control" placeholder="Digite a cidade do usuario" value="<?php echo set_value('txt-cidade');  ?>">
                                     </div>
                                      <?php if($this->session->userdata('userlogado')->permissaoID==1)  
                                     { 
                                     ?>
                                             <div class="form-group">
                                                    <label id="txt-permissaoID">Permissão</label>
                                                        

                                                    <select id="txt-permissaoID" name="txt-permissaoID" class="form-control" >

                                                      <option value="1" >Administrador</option>

                                                      <option value="2">Professor</option>
                                                      <option value="3">Aluno</option>

                                                    </select>
                                             </div>
                                     <?php } ?>
                                     
                                      <div class="form-group">
                                            <label id="txt-senha">Senha</label>
                                            <input type="password" id="txt-senha" name="txt-senha" class="form-control" >
                                     </div>

                                      <div class="form-group">
                                            <label id="txt-confir-senha"> Confirmar Senha</label>
                                            <input type="password" id="txt-confir-senha" name="txt-confir-senha" class="form-control" >
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
              
            <?php if($this->session->userdata('userlogado')->permissaoID==1)  
            { 
            ?>
            <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo 'Administrar '.$subtitulo.' Existentes'?>
                
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                        $this->table->set_heading("Nome do Usuario", "Alterar", "Excluir");
                                        foreach ($usuarios as $usuario) {
                                            $nomeuser= $usuario->nome;
                                            $alterar= anchor(base_url('admin/usuarios/alterar/'.md5($usuario->id)), ' <i class="fa fa-refresh fa-fw"></i>Alterar');
                                            $excluir= anchor(base_url('admin/usuarios/excluir/'.md5($usuario->id)), 
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
                <?php }?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>