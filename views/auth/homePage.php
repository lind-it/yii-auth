<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\SignUpForm;
use app\models\User;
?>

<div>
    <h1>Профиль <?= Html::encode($nickname) ?></h1>
    <h4><?= Html::encode($role)?></h4>
    <p>Ваша электроннаяч почта <?= Html::encode($email) ?></p>
    <p>Дата регистрации <?= Html::encode($date) ?></p>
    <a href="/auth/quit">Выйти</a>
</div>