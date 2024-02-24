<?php
/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use kartik\form\ActiveForm;

use yii\helpers\Html;
?>

<div class="container" id="login-wrapper">
	<div class="row">
		<div class="col-md-6 col-md-offset-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><?= \app\models\Site::ICON_LOGIN. ' '. UserManagementModule::t('front', 'Authorization') ?></h1>
				</div>
				<div class="panel-body">

					<?php $form = ActiveForm::begin([
                        'type'=> ActiveForm::TYPE_FLOATING,
						'id'      => 'login-form',
						'validateOnBlur'=>false,
					]) ?>

					<?= $form->field($model, 'username')
						->textInput() ?>

					<?= $form->field($model, 'password')
						->passwordInput() ?>

                    <div class="form-check form-switch">
 					    <?= (isset(Yii::$app->user->enableAutoLogin) && Yii::$app->user->enableAutoLogin) ? $form->field($model, 'rememberMe')->checkbox(['class'=>'form-check-input','value'=>true]) : '' ?>
                    </div>
					<?= Html::submitButton(\app\models\Site::ICON_LOGIN. ' '.
						UserManagementModule::t('front', 'Login'),
						['class' => 'btn btn-lg btn-primary btn-block']
					) ?>

					<div class="row registration-block">
						<div class="col-sm-6">
							<?= GhostHtml::a(
								UserManagementModule::t('front', "Registration"),
								['/user-management/auth/registration']
							) ?>
						</div>
						<div class="col-sm-6 text-right">
							<?= GhostHtml::a('<i class="fa-solid fa-circle-question"></i> '.
								UserManagementModule::t('front', "Forgot password ?"),
								['/user-management/auth/password-recovery']
							) ?>
						</div>
					</div>

					<?php ActiveForm::end() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$css = <<<CSS

#login-wrapper {
	position: relative;
	top: 30%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>