<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include './components/head.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './components/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './components/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Titulo Pagina -->
                    <div class="content-painel">
                        <!-- <h1 class="h3 mb-2 text-gray-800">Blank Page</h1> -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#envioFotosVideos">
                            Painel de Envios
                        </button>
                    </div>

                    <!-- Modal Envio Fotos e Videos-->
                    <div class="modal fade" id="envioFotosVideos" tabindex="-1" aria-labelledby="envioFotosVideos" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row m-2 painel-envio">

                                        <div class="col">
                                            <p>Envie suas fotos</p>
                                            <form action="upload.php" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="fotos">Fotos:</label>
                                                    <input type="file" name="fotos[]" id="fotos" class="form-control-file" accept="image/*" multiple required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nome_pasta">Nome da pasta Fotos:
                                                        <i class="bi bi-question-circle" data-toggle="tooltip" title="O nome da pasta será o titulo do evento, exemplo: Confraternização 2023"></i>
                                                    </label>
                                                    <input type="text" name="nome_pasta" id="nome_pasta" class="form-control" required>
                                                </div>

                                                <input type="submit" value="Enviar Fotos" class="btn btn-success">
                                            </form>
                                        </div>


                                        <div class="col">
                                            <p>Envie seus vídeos</p>
                                            <form action="upload.php" method="POST" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="video">Vídeo:</label>
                                                    <input type="file" name="video" id="video" class="form-control-file" accept="video/*" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nome_pasta_videos">Nome da pasta para vídeos:</label>
                                                    <input type="text" name="nome_pasta_videos" id="nome_pasta_videos" class="form-control" required>
                                                </div>

                                                <input type="submit" value="Enviar Vídeo" class="btn btn-success">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Conteudo principal -->

                    <?php include_once 'functions.php'; ?>

                    <div class="card mb-4">
                        <div class="card-header text-uppercase font-weight-bold">
                            Eventos Sisloc
                        </div>
                        <div class="card-body">
                            <div class="content-photos row">
                                <?php
                                // Caminho da pasta de fotos
                                $caminho_fotos = 'fotos_carregadas';

                                // Obtém a lista de pastas existentes
                                $pastas = array_filter(glob($caminho_fotos . '/*'), 'is_dir');

                                // Exibe cada pasta e a foto de capa
                                foreach ($pastas as $pasta) {
                                    $nome_pasta = basename($pasta);
                                    $capa = getCapaPasta($pasta);

                                    // Caminho para a galeria da pasta
                                    $caminho_galeria = 'galeria.php?pasta=' . urlencode($nome_pasta);
                                    $caminho_imagem = $caminho_fotos . '/' . $nome_pasta . '/' . basename($capa);
                                    echo '<div class="row-cols-12 p-2 m-2 border">';
                                        echo '<div class="col card-fotos-videos text-center">';
                                            echo '<p class="text-uppercase text-center m-2" style="word-wrap: normal;">' . $nome_pasta . '</p>';
                                            echo '<a href="' . $caminho_galeria . '"><img src="' . $caminho_imagem . '" alt="Capa" class="rounded img-fluid"></a>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                            </div>


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './components/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>