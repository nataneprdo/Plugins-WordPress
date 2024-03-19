<form method="post" action="<?php echo admin_url('admin-post.php');?>">
    <input type="hidden" name="action" value="process_form">
    <label for="nome">Nome Completo</label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="assunto">Assunto</label>
    <input type="text" name="assunto" id="assunto" required>
    <br>
    <label for="mensagem">Mensagem</label>
    <textarea name="mensagem" id="mensagem" required></textarea>
    <br>
    <input type="submit" value="Enviar">
</form>