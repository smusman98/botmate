<?php

$logs = new \BotMate\MenuLogs();
$logs->prepare_items();

?>
<div class="botmate wrap">
    <h1>Logs</h1>
    <form id="bm-logs" method="get">
        <input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ) ?>" />
        <?php $logs->display() ?>
    </form>
</div>

