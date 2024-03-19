
<?php 

//Plugin Name: Orçamento via WhatsApp
//Description: Um plugin para criar um formulário de orçamento e enviar para o WhatsApp.
//Version: 1.0.0
//Author: Natane P R de Oliveira

//function adicionar_estilos_personalizados() {
    //wp_enqueue_style('estilos-personalizados', get_template_directory_uri() . '/orcamento-whatsapp/css/style.css');
//}
//add_action('wp_enqueue_scripts', 'adicionar_estilos_personalizados');

function formulario_orcamento(){
    ob_start();
    ?>
   
    
    <form id="formulario-orcamento" method="post" target="_blank">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Produto(s):</label><br><br>
        
        
        <input type="checkbox" name="produto[]" value="Serviços direcionados a construção civil"> Serviços direcionados a construção civil<br>
        <input type="checkbox" name="produto[]" value="Passagem de cabos finalização de iluminação de ambientes"> Passagem de cabos finalização de iluminação de ambientes<br>
        <input type="checkbox" name="produto[]" value="Instalação de automação"> Instalação de automação<br>
        <input type="checkbox" name="produto[]" value="Manutenção elétrica residencial"> Manutenção elétrica residencial<br>
        <input type="checkbox" name="produto[]" value="Instalação de lustres de alto padrão"> Instalação de lustres de alto padrão<br>
        

        <input class="button" type="submit" value="Enviar Orçamento">
    </form>
  
    <?php 
    return ob_get_clean();
}
add_shortcode('orcamento_form', 'formulario_orcamento');

function processar_formulario_orcamento(){

    if(isset($_POST['nome']) && isset($_POST['produto'])) {
        $nome = sanitize_text_field($_POST['nome']); 
        $produtos = isset($_POST['produto']) ? $_POST['produto'] : array(); 

        if (!empty($produtos)) {
            $mensagem = "Olá, $nome! Gostaria de solicitar um orçamento para o(s) produto(s): " . implode(', ', $produtos);
            $whatsapp_url = "https://api.whatsapp.com/send?phone=+5512982152003&text=" . rawurlencode($mensagem);
 
            wp_redirect($whatsapp_url);
            exit();
        }
    }
}
add_action('init', 'processar_formulario_orcamento');


