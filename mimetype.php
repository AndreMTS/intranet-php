<?php 
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
?>