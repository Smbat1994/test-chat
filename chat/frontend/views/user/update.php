<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $model User;
 */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'role')->dropDownList(User::getRoles(), ['prompt' => 'Choose role...']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
