<?php
    foreach($chamados as $chamado){

        $chamado_dados = explode('#', $chamado);

        if($_SESSION['perfil'] == 2){
            if($_SESSION['id'] != $chamado_dados[0]){
                continue;
            }
        }

        if(count($chamado_dados) < 3){ continue; }
?>
    <div class="card mb-3 bg-light">
        <div class="card-body">
            <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
            <p class="card-text"><?= $chamado_dados[3] ?></p>
        </div>
    </div>
<?php } ?>