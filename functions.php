<?php

function getCapaPasta($pasta)
{
    $capas_imagem = glob($pasta . '/*.jpg');
    $capas_video = glob($pasta . '/*.mp4');
    $capas = array_merge($capas_imagem, $capas_video);

    if (count($capas_imagem) > 0) {
        return $capas_imagem[0];
    } elseif (count($capas_video) > 0) {
        $caminho_placeholder_video = 'placeholder_video.jpg'; // Insira o caminho completo da imagem de placeholder de vídeo aqui
        return $caminho_placeholder_video;
    } else {
        return 'placeholder.jpg'; // Insira o nome da imagem de capa padrão aqui
    }
}


?>
