<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля Chat
 */
class Chat extends Controller
{
	protected $user;
	protected $chatModel;
	protected $userModel;
	public function __construct() /** будуємо **/
	{
		$this->userModel = new \models\Users();
		$this->user = $this->userModel->GetCurrentUser();
	}

	/**
	 * Відображення початкової сторінки модуля
	 */
	public function actionIndex()
	{
		$title = 'Чат';
		return $this->render('index', null,[
			'MainTitle' => $title,
			null
		]);
	}

};