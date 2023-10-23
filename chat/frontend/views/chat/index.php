<?php
/**
 * @var $messages \common\models\Messages;
 **/
?>
<div class="dark-bg"></div>
<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="msg_history"></div>
            <?php if (!Yii::$app->user->isGuest):?>
            <div class="type_msg">
                <div class="input_msg_write">
                    <input type="text" class="write_msg message" placeholder="Type a message" />
                    <button class="btn btn-primary send" type="button">Send</button>
                </div>
            </div>
            <?php endif?>
            <input type="hidden" value="0" id="page"/>
        </div>
    </div>
</div>
