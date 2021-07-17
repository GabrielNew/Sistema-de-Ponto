<?php require_once("cabecalho.php"); ?>
<!-- CONTENT -->
<!-- Título da página -->
<h1>Procurar Usuário</h1>
<hr>
<a style="background-color:<?php ?>" class="btn text-white" href="index.php"
    target="_self"><i class="fas fa-caret-left"></i> Voltar</a>
<br>
<hr>
<form action="" method="POST" id="form" class="form">
    <div class="row justify-content-center align-content-center">
        <div class="col-md-3">
            <strong>CPF</strong>
            <?php ?>
                <input class="form-control" type="text" type="number" id="cpf" name="cpf" placeholder="Informe o CPF do Funcionário" required>
            <?php ?>
                <input class="form-control" type="text" type="number" id="cpf" name="cpf" value="<?php ?>" placeholder="Informe o CPF do Funcionário" readonly>
            <?php ?>
           
        </div>
        <div class="col-md-3">
            <strong>Mês</strong>
            <select class="form-control" name="mes" id="mes" required>
                <option value="">Selecione</option>
                
            </select>
        </div>
    </div>
    <br>
    <center>
        <input class="btn btn-success" type="submit" value="Pesquisar" name="pesquisar">
    </center>

</form>
    <br>
    <?php ?>
    <center>
        <input class="btn btn-danger" type="button" value="Relatório Geral" name="formRelatorio" id="formRelatorio" onclick="formRelatorioGeral()">
    </center>
    <?php ?>

<script>
    function formRelatorioGeral(){
        var mes = document.getElementById('mes');
        
        if (mes.value != "") {
            window.open('processaImprimirRelatorio.php?mes='+mes.value);
        } else {
            window.location = 'processaImprimirRelatorio.php';
        }
    }
</script>
    

<script>
$(document).ready(function () {
$('#cpf').mask('000.000.000-00');
});
</script>

<!-- CONTENT -->
<?php require_once("rodape.php"); ?>