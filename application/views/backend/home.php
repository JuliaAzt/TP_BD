
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $titulo.' - '.$subtitulo?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo $subtitulo?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Saudações, <?php echo $this->session->userdata('userlogado')->nome?>!</h2>
                                      <div class="container marketing">
                                        <div class="row" style="margin-top:100px" >
                                          <div class="col-lg-4" style="margin-bottom: 20px">
                                            <center>
                                                <a href="#" title="Link para página de Turmas">
                                                <img class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" label="Placeholder: 140x140" src="<?php echo base_url('assets/backend/Group-02.png'); ?>" style="border-radius: 50%; background-color:dimgrey">
                                                </a>
                                            </center>
                                            <h2 style="text-align: center" ><a href="#" style="color: black">Turmas</a></h2>
                                          </div><!-- /.col-lg-4 -->
                                          <div class="col-lg-4" style="margin-bottom: 20px">
                                            <center>
                                                <a href="#" title="Link para página de exercícios">
                                                <img class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" label="Placeholder: 140x140" src="<?php echo base_url('assets/backend/Pencil-04.png'); ?>"  style="border-radius: 50%; background-color:dimgrey">
                                                </a>
                                            </center>
                                              <h2 style="text-align: center"><a href="#" style="color: black">Exercícios</a></h2>
                                          </div><!-- /.col-lg-4 -->
                                          <div class="col-lg-4" style="margin-bottom: 20px">
                                            <center>
                                                <a href="#" title="Link para página das Listas de Exercícios">
                                                <img class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" label="Placeholder: 140x140" src="<?php echo base_url('assets/backend/List-02.png'); ?>"  style="border-radius: 50%; background-color:dimgrey">
                                                </a>
                                            </center>    
                                              <h2 style="text-align: center"><a href="#" style="color: black">Listas de Exercícios</a></h2>
                                          </div><!-- /.col-lg-4 -->
                                        </div><!-- /.row -->


    <!-- START THE FEATURETTES -->


  </div><!-- /.container -->
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
    <!-- /#wrapper -->