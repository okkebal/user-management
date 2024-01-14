<?php
/**
 * @var $this yii\web\View
 * @var $user okkebal\modules\UserManagement\models\User
 */
use yii\helpers\Html;

?>
<?php
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/user-management/auth/password-recovery-receive', 'token' => $user->confirmation_token]);
?>

Hallo <?= Html::encode($user->username) ?>,<BR>
    Klik op deze link om je wachtwoord te herstellen:

<?= Html::a('Reset password', $resetLink) ?>