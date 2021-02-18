<?php
require_once 'parser.php';

$pars = new Parser;
$data = $pars->getDataCards();
for ($i = 0, $int = 0; $int < 10; $i += 3, $int++):
?>
<div class="card" style="width: 25rem;">
    <img src='
<?php echo $data[$i + 1] ?>' class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">
            <?php echo $data[$i] ?></p>
        <a href="/articke.php?id=<?php echo $data[$i + 2]?>" class="btn btn-primary">Читать</a>
    </div>
</div>
<?php endfor?>
