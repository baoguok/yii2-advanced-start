<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use modules\users\Module;

/* @var $this yii\web\View */
/* @var $model modules\users\models\backend\User */
/* @var $uploadModel modules\users\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-backend-default-update">
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['update-profile', 'id' => $model->id]),
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-10',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput([
        'maxlength' => true,
        'class' => 'form-control',
        'disabled' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_MANAGER_USERS) ? false : true,
        'placeholder' => Module::t('backend', 'Username'),
    ]) ?>

    <?= $form->field($model, 'first_name')->textInput([
        'maxlength' => true,
        'class' => 'form-control',
        'placeholder' => Module::t('backend', 'First Name'),
    ]) ?>

    <?= $form->field($model, 'last_name')->textInput([
        'maxlength' => true,
        'class' => 'form-control',
        'placeholder' => Module::t('backend', 'Last Name'),
    ]) ?>

    <?= $form->field($model, 'email')->textInput([
        'maxlength' => true,
        'class' => 'form-control',
        //'disabled' => Yii::$app->user->can(BackendRbac::ROLE_ADMINISTRATOR) ? false : true,
        'placeholder' => Module::t('backend', 'Email'),
    ]) ?>

    <?= $form->field($model, 'role')->dropDownList($model->rolesArray, [
        'class' => 'form-control',
        'disabled' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_MANAGER_RBAC) ? false : true,
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->statusesArray, [
        'class' => 'form-control',
        //'disabled' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_MANAGER_USERS) ? false : true,
    ]) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-plus"></span> ' . Module::t('backend', 'Create') : '<span class="fa fa-floppy-o"></span> ' . Module::t('backend', 'Save'), [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'name' => 'submit-button',
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
