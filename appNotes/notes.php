<?php
    $notas = array();

    $arquivo = fopen('db.txt', 'r');
    while (!feof($arquivo)){
        $nota = fgets($arquivo);
        $notas[] = $nota;
    }

    fclose($arquivo);

    foreach ($notas as $nota){
        $notas_dados = explode('¨', $nota);

        if (count($notas_dados) >= 2){
?>
<div class="note" id="nota">
    <div class="title">
        <h4><?= $notas_dados[0] ?></h4>
    </div>
    <div class="content">
        <p><?= $notas_dados[1] ?></p>
    </div>
</div>
<?php
        }
    } 
?>