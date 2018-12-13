<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('lib/SimpleBacklinkCheck.class.php');

$sbc = new SimpleBacklinkCheck();
$sbc->setTarget($_POST['target']);
$sbc->setUrls(explode("\n", $_POST['urls']));

$sbc->process();

?>
<html>
<head>
    <title>Results SimpleBacklinkCheck</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body class="bg-grey-light">
<div class="mt-4 p-4 container mx-auto bg-white rounded border shadow">
    <h1 class="pb-8 text-blue-dark">Results SimpleBacklinkCheck</h1>

    <div class="pb-4">
        Cible : <?= $sbc->getTarget() ?>
    </div>

    <table class="w-full">
        <tr>
            <th>URL</th>
            <th>Résultat</th>
        </tr>

        <?php foreach($sbc->getResults() as $url => $result) : ?>
            <tr>
                <td><?= $url ?></td>
                <td><?= 
                    $result ? '<i class="text-green fas fa-check-circle"></i> oui' 
                            : '<i class="text-red fas fa-times-circle"></i> non'; 
                    ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>