<?php

use yii\helpers\Html;

/* @var $model app\models\Offer */
?>
<div class="offer-form p-2">
    <form id="offer-form" action="<?= Html::encode($model->isNewRecord ? Yii::$app->urlManager->createUrl(['offer/create']) : Yii::$app->urlManager->createUrl(['offer/update', 'id' => $model->id])) ?>" method="post">
        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>

        <div class="form-group">
            <label for="offer-name">Название оффера</label>
            <?= Html::textInput('Offer[name]', $model->name, ['class' => 'form-control', 'id' => 'offer-name', 'placeholder' => 'Название оффера']) ?>
            <div id="error-name" class="error-message" style="color:red;"></div>
        </div>

        <div class="form-group">
            <label for="offer-email">Email представителя</label>
            <?= Html::input('email', 'Offer[email]', $model->email, ['class' => 'form-control', 'id' => 'offer-email', "placeholder" => 'email@example.com']) ?>
            <div id="error-email" class="error-message" style="color:red;"></div>
        </div>

        <div class="form-group">
            <label for="offer-phone">Телефон представителя</label>
            <?= Html::textInput('Offer[phone]', $model->phone, ['class' => 'form-control', 'id' => 'offer-phone', "placeholder" => '123-456-7891']) ?>
            <div id="error-phone" class="error-message" style="color:red;"></div>
        </div>

        <button type="submit" class="btn <?= $model->isNewRecord ? 'btn-success' : 'btn-primary' ?>">
            <?= $model->isNewRecord ? 'Создать' : 'Обновить' ?>
        </button>
        <button type="button" class="btn btn-secondary" onclick="$('#modal').modal('hide')">Закрыть</button>
    </form>
</div>
