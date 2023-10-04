<?php
session_start();

include __DIR__.'./../../scripts/auth/verify.php';
$tabs = include __DIR__.'./../../actions/tabs/tabs_action.php';
include __DIR__.'./../../scripts/tabs/tabs.php';

use function root\src\scripts\tabs\getHeads;
use function root\src\scripts\tabs\renderNode;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="./../../front/styles/tab.css">
</head>
<body>
    <h1>Tabs</h1>
    <div id='tree'>
        <form method='POST' action='./../../actions/tabs/tabs_post_action.php'>
            <button name='new_null'>
                New Parent Tab
            </button>
        </form>
        <?php
        $heads = getHeads($tabs);
        foreach($heads as $head) renderNode($head, $tabs);
        ?>
    </div>
    <p id='message'></p>
    <script type="text/javascript"></script>
</body>
</html>

