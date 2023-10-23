<?php
/**
 * @var $dataProvider \common\models\Messages
 */
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'message',
        [
            'attribute' => 'user_id',
            'value' => function ($dataProvider) {
                return $dataProvider->user->username;
            }
        ],
        [
            'attribute' => 'not_correct',
            'format' => 'raw',
            'value' => function ($dataProvider) {
                $checked = $dataProvider->not_correct ? 'checked' : '';
                return '<input class="form-check-input not-correct-send" data-id="'.$dataProvider->id.'" '. $checked .' type="checkbox">';
            }
        ]
    ],
]);
