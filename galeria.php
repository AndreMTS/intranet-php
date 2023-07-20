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
                    <a href="eventos.php" class="btn btn-primary mb-3">Voltar a eventos</a>
                    <!-- Default Card Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Galeria
                        </div>
                        <div class="card-body row">
                            <?php
                            
                            // Função para obter o MIME type de um arquivo
                            function getMimeType($arquivo)
                            {
                                $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
                                switch ($extensao) {
                                    case 'jpg':
                                    case 'jpeg':
                                        return 'image/jpeg';
                                    case 'png':
                                        return 'image/png';
                                    case 'gif':
                                        return 'image/gif';
                                    case 'mp4':
                                        return 'video/mp4';
                                    default:
                                        return '';
                                }
                            }

                            $pasta = $_GET['pasta'];
                            // Obtém a lista de arquivos na pasta
                            $arquivos = glob('fotos_carregadas/' . $pasta . '/*');

                            echo '<div class="row">';
                            if (count($arquivos) > 0) {
                                foreach ($arquivos as $arquivo) {
                                    $mime_type = getMimeType($arquivo);
                                    if ($mime_type === 'image/jpeg' || $mime_type === 'image/png' || $mime_type === 'image/gif') {

                                        echo '<a class="m-2 p-2" href="#" data-toggle="modal" data-target="#imagemModal" data-arquivo="' . $arquivo . '"><img src="' . $arquivo . '" alt="Foto" class="foto"></a>';

                                    } elseif ($mime_type === 'video/mp4') {
                                        echo '<a class="m-2 p-2" href="#" data-toggle="modal" data-target="#imagemModal" data-arquivo="' . $arquivo . '"><video controls><source src="' . $arquivo . '" type="video/mp4">Seu navegador não suporta a reprodução de vídeo.</video></a>';
                                    }
                                }
                                echo '<div>';
                            } else {
                                echo 'Nenhum arquivo encontrado na pasta.';
                            }
                            ?>
                        </div>

                        <!-- Modal para exibir as fotos e vídeos -->
                        <div class="modal fade" id="imagemModal" tabindex="-1" role="dialog" aria-labelledby="imagemModalLabel" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Aqui será exibida a foto ou vídeo selecionado -->
                <div id="imagemSelecionada"></div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                <a href="#" class="btn btn-primary" id="botaoAnterior">Anterior</a>
                <a href="#" class="btn btn-primary" id="botaoProximo">Próximo</a>
            </div>
        </div>
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
    <script>
    let midias = <?php echo json_encode($arquivos); ?>; // Array com as fotos e vídeos
    let indiceAtual = <?php echo isset($_GET['indice']) ? $_GET['indice'] : 0; ?>; // Índice da foto ou vídeo atual

</script>

<script src="./js/utils-galeria.js"></script>

</body>

</html>