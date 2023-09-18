<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\SignUpForm;
use app\models\User;
?>

<div class="site-login">

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'sign-form']); ?>

            <?= $form->field($model, 'nickname')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'login')->textInput() ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('SignUp', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <a href="/auth/signin">Уже зарегестрированы?</a>
            
        </div>
    </div>
</div>