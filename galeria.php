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

                        <!--Função para obter o MIME type de um arquivo -->
                        <?php include 'mimetype.php'; ?>

                        <div class="card-body row">
                            <?php
                            $pasta = $_GET['pasta'];
                            // Obtém a lista de arquivos na pasta
                            $arquivos = glob('storage/' . $pasta . '/*');

                            echo '<div class="row">';
                            if (count($arquivos) > 0) {
                                foreach ($arquivos as $arquivo) {
                                    $mime_type = getMimeType($arquivo);
                                    if ($mime_type === 'image/jpeg' || $mime_type === 'image/png' || $mime_type === 'image/gif') {

                                        echo '<a class="m-2 p-2" href="#" data-toggle="modal" data-target="#imagemModal" data-arquivo="' . $arquivo . '"><img src="' . $arquivo . '" alt="Foto" class="foto img-fluid rounded"></a>';
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
<div class="modal" id="imagemModal" role="dialog" aria-labelledby="imagemModalLabel">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content border-0 modal-conteudo">
            <div>
                <a href="#" class="botao-fechar-modal close m-2" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
                <!-- Aqui será exibida a foto ou vídeo selecionado -->
                <div id="imagemSelecionada"></div>
            </div>
            <div class="controle-midia">
                
                <!-- Ícone de seta para voltar -->
                <a href="#" id="botaoAnterior">
                    <div class="botaoAnterior">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                </a>
                
                <!-- Ícone de seta para avançar -->
                <a href="#" id="botaoProximo">
                    <div class="botaoProximo">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </a>

            </div>
            
            <!-- Botão de apresentação automática -->
            <a href="#" id="botaoApresentacao">
                <i class="fa-solid fa-play"></i>
            </a>
            
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