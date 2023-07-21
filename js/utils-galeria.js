
    // Função para abrir o modal e exibir a mídia selecionada
    function abrirModal(indice) {
        let modal = new bootstrap.Modal(document.getElementById('imagemModal'));
        document.getElementById('imagemSelecionada').innerHTML = getMidiaHtml(indice);
        indiceAtual = indice; // Define o índice atual
        modal.show();
    }

    // Vincular evento de clique em todas as imagens e vídeos
    document.querySelectorAll('.foto, video').forEach((item, indice) => {
        item.addEventListener('click', (event) => {
            event.preventDefault(); // Impede que o link ou vídeo seja acionado
            abrirModal(indice);
        });
    });

    // Script para navegar entre fotos e vídeos no modal
    document.getElementById('botaoAnterior').addEventListener('click', (event) => {
        event.preventDefault(); // Impede que o link do botão seja acionado
        indiceAtual = (indiceAtual - 1 + midias.length) % midias.length;
        document.getElementById('imagemSelecionada').innerHTML = getMidiaHtml(indiceAtual);
    });

    document.getElementById('botaoProximo').addEventListener('click', (event) => {
        event.preventDefault(); // Impede que o link do botão seja acionado
        indiceAtual = (indiceAtual + 1) % midias.length;
        document.getElementById('imagemSelecionada').innerHTML = getMidiaHtml(indiceAtual);
    });

    // Função para verificar se o arquivo é uma imagem
    function is_image(arquivo) {
        let mime_types = ['image/jpeg', 'image/png', 'image/gif'];
        let mime_type = getMimeType(arquivo);
        return mime_types.includes(mime_type);
    }

    // Função para verificar se o arquivo é um vídeo
    function is_video(arquivo) {
        let mime_types = ['video/mp4'];
        let mime_type = getMimeType(arquivo);
        return mime_types.includes(mime_type);
    }

    // Função para obter o MIME type de um arquivo
    function getMimeType(arquivo) {
        let extensao = arquivo.split('.').pop().toLowerCase();
        switch (extensao) {
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

    // Função para obter o HTML da foto ou vídeo pelo índice
    function getMidiaHtml(indice) {
        let arquivo = midias[indice];
        let mime_type = getMimeType(arquivo);

        if (mime_type.startsWith('image')) {
            return '<img src="' + arquivo + '" alt="Foto" class="foto">';
        } else if (mime_type === 'video/mp4') {
            return '<video controls><source src="' + arquivo + '" type="video/mp4">Seu navegador não suporta a reprodução de vídeo.</video>';
        } else {
            return '';       
        }
    }

        
    
        // Função para fechar o modal e pausar o vídeo (caso seja um vídeo)
        function fecharModal() {
        let modal = new bootstrap.Modal(document.getElementById('imagemModal'));
        modal.hide();

        let videoElement = document.querySelector("#imagemSelecionada video");
        if (videoElement) {
            videoElement.pause();
        }
    }

    // Vincular evento de clique fora do modal para fechá-lo
    document.getElementById('imagemModal').addEventListener('click', function (event) {
        if (event.target === this) {
            event.preventDefault();
            event.stopPropagation();
            fecharModal();
        }
    });

    // Vincular evento de clique no botão "Fechar" para fechar o modal
    document.querySelector('.butao-fechar-modal').addEventListener('click', function (event) {
        event.preventDefault();
        fecharModal();
    });

    // Função para avançar para a próxima mídia na galeria
function avancarMidia() {
    indiceAtual = (indiceAtual + 1) % midias.length;
    document.getElementById('imagemSelecionada').innerHTML = getMidiaHtml(indiceAtual);
  }
  
  // Função para voltar para a mídia anterior na galeria
  function voltarMidia() {
    indiceAtual = (indiceAtual - 1 + midias.length) % midias.length;
    document.getElementById('imagemSelecionada').innerHTML = getMidiaHtml(indiceAtual);
  }


    // Evento para detectar teclas pressionadas
document.addEventListener('keydown', function (event) {
    // Verifica se o modal está aberto e a tecla pressionada é a seta para a esquerda
    if (document.getElementById('imagemModal').classList.contains('show') && event.key === 'ArrowLeft') {
      voltarMidia(); // Chama a função para voltar para a mídia anterior
    }
  
    // Verifica se o modal está aberto e a tecla pressionada é a seta para a direita
    if (document.getElementById('imagemModal').classList.contains('show') && event.key === 'ArrowRight') {
      avancarMidia(); // Chama a função para avançar para a próxima mídia
    }
  });
  

