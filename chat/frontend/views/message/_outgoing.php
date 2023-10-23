<?php
/**
 * @var $message \common\models\Message;
 */

use common\helpers\DateHelper;
?>

<div class="outgoing_msg">
    <div class="sent_msg">
        <p><?= $message->message ?></p>
        <span class="time_date"><?= DateHelper::getDate($message->created_at) ?></span>
    </div>
</div>