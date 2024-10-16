<?php

use webvimark\modules\UserManagement\UserManagementModule;
use kartik\form\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use app\models\Site;
use app\models\User;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\forms\RegistrationForm $model
 */

$this->title = Yii::t('app', 'Registration for {sitename}',['sitename'=>Site::SITE_NAAM]);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    <h1 class="panel-title"><?= Site::ICON_REGISTER. ' '. $this->title ?></h1>

    <div class="alert alert-info">Geef de naam en e-mail van de patient met Diabetes type 1 op. Later kun  je andere familieleden uitnodigen om mee te doen.
        <hr>
        Je kunt <?=Site::SITE_NAAM . " ". Site::MONTHS_FREE ?> maanden gratis proberen zonder verplichtingen.
    </div>

    <?php $form = ActiveForm::begin([
        'id'=>'user',
        'type'=> ActiveForm::TYPE_HORIZONTAL,
        'validateOnBlur'=>false,
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 50, 'autocomplete'=>'off', 'autofocus'=>true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 50, 'autocomplete'=>'off']) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 50, 'autocomplete'=>'off']) ?>

    <?= $form->field($model, 'family_name')->textInput(['maxlength' => 50, 'autocomplete'=>'off']) ?>
    <?= $form->field($model, 'org_id')->dropDownList(User::getOrganisaties()) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>


    <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
    <div class="alert alert-info">Het wachtwoord moet aan de volgende regels voldoen: <b>minimaal 8 tekens, minimaal een hoofdletter en een kleine letter.</b></div>

    <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-sm-2">{image}</div><div class="col-sm-3">{input}</div></div>',
        'captchaAction'=>['/user-management/auth/captcha']
    ]) ?>
    <?= $form->field($model, 'accoord')->checkbox(['label'=>Yii::t('app','Ik ben accoord met de {voorwaarden} van Simpeld.nl',['voorwaarden'=>html::a('Voorwaarden',['/voorwaarden/index'])])]) ?>
    <?= $form->field($model, 'gelezen')->checkbox(['label'=>Yii::t('app','Ik heb de {disclaimer} gelezen en begrepen',['disclaimer'=>html::a('Disclaimer',['/site/disclaimer'])])]) ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('front', 'Register'),
                ['class' => 'btn btn-primary']
            ) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
