
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
                           <?php echo 'Alterar Usuario '?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <?php 
                              if(!$this->session->userdata('userlogado')->permissaoID==1) //Se o usuário atual não for admin
                                ?>
                                <div class="col-lg-12">
                                    
                                    <?php echo validation_errors('<div class="alert alert-danger">','</div>');
                                    echo form_open('admin/usuarios/salvar_alteracoes');
                                    ?>
                                    <div class="form-group">

                                            <label id="txt-nome">Nome da Usuario</label>
                                            <input type="text" id="txt-nome" name="txt-nome" class="form-control" value="<?php echo $usuarioatual->nome  ?>">
 
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-email">Email</label>
                                            <input type="text" id="txt-email" name="txt-email" class="form-control"  value="<?php echo $usuarioatual->email  ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-estado">Estado</label>
                                            <input type="text" id="txt-estado" name="txt-estado" class="form-control"  value="<?php echo $usuarioatual->estado ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-cidade">Cidade</label>
                                            <input type="text" id="txt-cidade" name="txt-cidade" class="form-control"  value="<?php echo $usuarioatual->cidade ?>">

                                     </div>
                                      <div class="form-group">
                                            <label id="txt-user">User</label>
                                            <input type="text"  id="txt-user" name="txt-user" class="form-control"  value="<?php echo $usuarioatual->user   ?>">
                                     </div>

                                      <div class="form-group">
                                            <label id="txt-permissaoID">Permissão</label>

                                            <select id="txt-permissaoID" name="txt-permissaoID" class="form-control" >
                                              <option value="1">Administrador</option>
                                              <option value="2">Professor</option>
                                              <option value="3">Aluno</option>

                                            </select>
                                     </div>

                                      <div class="form-group">
                                            <label id="txt-senha">Senha</label>
                                            <input type="password" id="txt-senha" name="txt-senha" class="form-control" >
                                     </div>


                                      <div class="form-group">
                                            <label id="txt-confir-senha"> Confirmar Senha</label>
                                            <input type="password" id="txt-confir-senha" name="txt-confir-senha" class="form-control" >
                                     </div>
                                     <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $usuarioatual->id?>">

                                      <button type="submit" class="btn btn-default">Atualizar</button>
                                    <?php
                                    
                                  }
                                    echo form_close();
                                    ?>


                                </div>

                                <?php } else{ ?>
                                  <div class="col-lg-12">
                                    
                                    <?php echo validation_errors('<div class="alert alert-danger">','</div>');
                                    echo form_open('admin/usuarios/salvar_alteracoes');
                                    foreach ($usuarios as $usuario) {

                                    ?>
                                    <div class="form-group">

                                            <label id="txt-nome">Nome da Usuario</label>
                                            <input type="text" id="txt-nome" name="txt-nome" class="form-control" value="<?php echo $usuario->nome  ?>">
 
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-email">Email</label>
                                            <input type="text" id="txt-email" name="txt-email" class="form-control"  value="<?php echo $usuario->email  ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-estado">Estado</label>
                                            <input type="text" id="txt-estado" name="txt-estado" class="form-control"  value="<?php echo $usuario->estado ?>">
                                     </div>
                                      <div class="form-group">
                                            <label id="txt-cidade">Cidade</label>
                                            <input type="text" id="txt-cidade" name="txt-cidade" class="form-control"  value="<?php echo $usuario->cidade ?>">

                                     </div>
                                      <div class="form-group">
                                            <label id="txt-user">User</label>
                                            <input type="text"  id="txt-user" name="txt-user" class="form-control"  value="<?php echo $usuario->user   ?>">
                                     </div>

                                      <div class="form-group">
                                            <label id="txt-permissaoID">Permissão</label>

                                            <select id="txt-permissaoID" name="txt-permissaoID" class="form-control" >
                                              <option value="1">Administrador</option>
                                              <option value="2">Professor</option>
                                              <option value="3">Aluno</option>

                                            </select>
                                     </div>

                                      <div class="form-group">
                                            <label id="txt-senha">Senha</label>
                                            <input type="password" id="txt-senha" name="txt-senha" class="form-control" >
                                     </div>


                                      <div class="form-group">
                                            <label id="txt-confir-senha"> Confirmar Senha</label>
                                            <input type="password" id="txt-confir-senha" name="txt-confir-senha" class="form-control" >
                                     </div>
                                     <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $usuario->id?>">

                                      <button type="submit" class="btn btn-default">Atualizar</button>
                                    <?php
                                    
                                  }
                                    echo form_close();
                                    ?>


                                </div>
                                <?php } ?>

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
    