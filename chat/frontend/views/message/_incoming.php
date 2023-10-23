<?php
/**
 * @var $message \common\models\Messages;
 * @var $className
 */

use common\models\User;
use common\helpers\DateHelper;
use yii\helpers\Url;

$classAdmin = User::isAdmin() ? 'admin' : '';
$className = User::isAdmin($message->user_id) ? 'adminBg' : '';
$notCorrect = $message->not_correct ? 'bg-non-correct' : '';

?>

<div class="incoming_msg <?= $notCorrect?>">
    <div class="incoming_msg_img">
        <img src="<?= Url::to('/images/user-profile.png')?>" alt="sunil">
    </div>
    <div class="received_msg <?= $classAdmin?>">
        <div class="received_withd_msg">
            <?php if ($className != ''):?>
                <small>Admin</small>
            <?php endif?>
            <div><?= $message->user->username ?></div>
            <p class="<?= $className ?>"><?= $message->message ?></p>
            <span class="time_date"><?= DateHelper::getDate($message->created_at) ?></span>
        </div>
        <?php if ($classAdmin): ?>
        <div class="not-correct not-correct-send" data-id="<?= $message->id ?>">
            <?php if (!$message->not_correct): ?>
                <span class="btn btn-danger not-correct-button">Not correct message</span>
            <?php else:?>
                <span class="btn btn-success not-correct-button">Correct message</span>
            <?php endif?>
        </div>
        <?php endif?>
    </div>
</div>
