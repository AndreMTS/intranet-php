<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se foi enviado um arquivo de foto
    if (isset($_FILES["fotos"]) && is_array($_FILES["fotos"]["error"])) {
        $nome_pasta = $_POST["nome_pasta"];
        $fotos = $_FILES["fotos"];

        // Cria a pasta para salvar as fotos
        $caminho_pasta = 'storage/' . $nome_pasta;
        if (!is_dir($caminho_pasta)) {
            mkdir($caminho_pasta, 0777, true);
        }

        // Itera sobre cada foto enviada
        for ($i = 0; $i < count($fotos['name']); $i++) {
            if ($fotos['error'][$i] == 0) {
                // Cria um nome único para a foto usando a função date() e um número randômico
                $nome_arquivo = date("YmdHis") . '_' . rand(1000, 9999) . '_' . $fotos["name"][$i];

                // Define o caminho do arquivo
                $caminho_arquivo = $caminho_pasta . '/' . $nome_arquivo;

                // Move o arquivo para a pasta escolhida
                move_uploaded_file($fotos["tmp_name"][$i], $caminho_arquivo);
            }
        }

        echo "Fotos enviadas com sucesso!";
    } else {
        echo "Erro ao enviar as fotos.";
    }

    // Verifica se foi enviado um arquivo de vídeo
    if (isset($_FILES["video"]) && $_FILES["video"]["error"] == 0) {
        $nome_pasta_videos = $_POST["nome_pasta_videos"];
        $video = $_FILES["video"];

        // Código para tratar o upload do vídeo
        $nome_arquivo_video = date("YmdHis") . '_' . $video["name"];
        $caminho_pasta_videos = 'storage/' . $nome_pasta_videos;

        if (!is_dir($caminho_pasta_videos)) {
            mkdir($caminho_pasta_videos, 0777, true);
        }

        $caminho_arquivo_video = $caminho_pasta_videos . '/' . $nome_arquivo_video;
        move_uploaded_file($video["tmp_name"], $caminho_arquivo_video);

        echo "Vídeo enviado com sucesso!";
    }

    if (!isset($_FILES["foto"]) && !isset($_FILES["video"])) {
        echo "";
    }
}

?>
