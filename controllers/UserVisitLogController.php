<?php

namespace okkebal\modules\UserManagement\controllers;

use Yii;
use okkebal\modules\UserManagement\models\UserVisitLog;
use okkebal\modules\UserManagement\models\search\UserVisitLogSearch;
use okkebal\components\AdminDefaultController;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends AdminDefaultController
{
	/**
	 * @var UserVisitLog
	 */
	public $modelClass = 'okkebal\modules\UserManagement\models\UserVisitLog';

	/**
	 * @var UserVisitLogSearch
	 */
	public $modelSearchClass = 'okkebal\modules\UserManagement\models\search\UserVisitLogSearch';

	public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}
