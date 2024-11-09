<?php

use yii\helpers\Html;

/* @var $offers app\models\Offer[] */
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID 
                <?= Html::a('▲', '#', [
                    'class' => 'sort-link', 
                    'data-sort' => 'id', 
                    'data-order' => 'ASC'
                ]) ?> 
                <?= Html::a('▼', '#', [
                    'class' => 'sort-link', 
                    'data-sort' => 'id', 
                    'data-order' => 'DESC'
                ]) ?>
            </th>
            <th>Название оффера 
                <?= Html::a('▲', '#', [
                    'class' => 'sort-link', 
                    'data-sort' => 'name', 
                    'data-order' => 'ASC'
                ]) ?> 
                <?= Html::a('▼', '#', [
                    'class' => 'sort-link', 
                    'data-sort' => 'name', 
                    'data-order' => 'DESC'
                ]) ?>
            </th>
            <th>Email представителя</th>
            <th>Телефон представителя</th>
            <th>Дата добавления</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($offers)): ?>
            <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?= Html::encode($offer->id) ?></td>
                    <td><?= Html::encode($offer->name) ?></td>
                    <td><?= Html::encode($offer->email) ?></td>
                    <td><?= Html::encode($offer->phone) ?></td>
                    <td><?= Html::encode($offer->created_at) ?></td>
                    <td>
                        <?= Html::button('Редактировать', [
                            'class' => 'btn btn-primary edit-button',
                            'data-url' => Yii::$app->urlManager->createUrl(['offer/update', 'id' => $offer->id]),
                        ]) ?>
                        <?= Html::button('Удалить', [
                            'class' => 'btn btn-danger delete-button',
                            'data-url' => Yii::$app->urlManager->createUrl(['offer/delete', 'id' => $offer->id]),
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Офферов не найдено.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
