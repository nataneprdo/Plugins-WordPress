<?php 

/*
Plugin Name: Meu Plugin Formulário
Description: Um plugin para adicionar um formulário personalizado.
Author: Natane Priscila Ribeiro de Oliveira
Version: 1.0
*/
//adicionar a pagina do formulario 
function add_form_page(){
    ob_start();
    include(plugin_dir_path(__FILE__) . 'formulario.php');
    return ob_get_clean();
}

add_shortcode('meu_formulario', 'add_form_page');

//função  para processar o formulario

function process_form_submission(){
    if($_SERVER['REQUEST_METHOD'] === 'post') {
        $nome = sanitize_text_field($_POST['nome']);
        $email = sanitize_email($_POST['email']);
        $assunto = sanitize_text_field($_POST['assunto']);
        $mensagem = sanitize_text_field($_POST['mensagem']);

        $destino = 'nataneoliveira75@gmail.com';

        $headers = 'From: ' . $nome . ' <' . $email . '>';

        if(wp_mail($destino, $assunto, $mensagem, $headers)){
            //envio bem sucedido
            echo 'Mensagem enviada com sucesso!';
        } else{
            //erro 
            echo 'Erro ao enviar a mensagem.';
        }
    }
}
?>

