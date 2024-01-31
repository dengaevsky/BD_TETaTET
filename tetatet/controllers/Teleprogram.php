<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля Projects
 */
class Teleprogram extends Controller
{
	protected $user;
	protected $teleprogramModel;
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new \models\Users();
		$this->teleprogramModel = new \models\Teleprogram();
		$this->user = $this->userModel->GetCurrentUser();
	}

	/**
	 * Відображення початкової сторінки модуля
	 */
	public function actionIndex()
	{
		global $Config;
		$title = 'Телепрограма';
		$lastTeleprogram = $this->teleprogramModel->GetLastTeleprogram($Config['ProjectsCount']);
		return $this->render('index', ['lastProjects'=>$lastTeleprogram], [
			'MainTitle' => $title,
			'PageTitle' => $title,
		]);
	}

	/**
	 * Перегляд
	 */
	public function actionView()
	{
		$id = $_GET['id'];
		$teleprogram = $this->teleprogramModel->GetTeleprogramById($id);
		$title = $teleprogram['title'];
		return $this->render('view', ['model' => $teleprogram],
		[
			'MainTitle' => $title,
			'PageTitle' => $title,
		]);
	}
	/**
	 * Додавання
	 */
	public function actionAdd()
	{
		if (empty($this->user))
		{
			$titleForbidden = 'Доступ заборонено';
			return $this->render('forbidden', null,
				[
					'MainTitle' => $titleForbidden,
					'PageTitle' => $titleForbidden,
				]); 
		}
		$title = 'Додавання';
		if($this->isPost())
		{ 
			$result = $this->teleprogramModel->AddTeleprogram($_POST);
				return $this->renderMessage('ok', 'Успішно додано', null,
					[
						'PageTitle' => $title,
						'MainTitle' => $title
					]); 
		} else {
			return $this->render('form', ['model' => $_POST],
				[
					'MainTitle' => $title,
					'PageTitle' => $title
				]); 
			}
	}

	/*
	 * Редагування
	 */
	public function actionEdit()
	{
		$id = $_GET['id'];
		$projects = $this->teleprogramModel->GetTeleprogramById($id);
		$titleForbidden = 'Доступ заборонено';
		if (empty($this->user) || $projects['user_id'] != $this->userModel->GetCurrentUser()['id'] && $this->userModel->GetCurrentUser()['role'] != 1)
		{
			return $this->render('forbidden', null,
				[
					'MainTitle' => $titleForbidden,
					'PageTitle' => $titleForbidden,
				]); 
		}
		$title = 'Редагування';
		if($this->isPost())
			{
				$result = $this->teleprogramModel->UpdateTeleprogram($_POST, $id);
				return $this->renderMessage('ok', 'Редаговано', null,
					[
						'MainTitle' => $title,
						'PageTitle' => $title,
					]); 
				} else {
					$result = $this->teleprogramModel->UpdateTeleprogram($_POST, $id);
					$message = implode('<br/>', $result);
					return $this->render('form', ['model' => $projects],
						[
							'MainTitle' => $title,
							'PageTitle' => $title
						]); 
				}
	}


	/**
	 * Видалення
	 */
	public function actionDelete()
	{
		$title = 'Видалення';
		$id = $_GET['id'];
		if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
		{
			if($this->teleprogramModel->DeleteTeleprogram($id))
			{
				header('Location: /teleprogram/');
			} else {
				return $this->renderMessage('error', 'Помилка видалення', null,
				[
					'MainTitle' => $title,
					'PageTitle' => $title,
				]);
			}
		} else {
			$teleprogram = $this->teleprogramModel->GetTeleprogramById($id);
			return $this->render('delete', ['model' => $teleprogram],
			[
				'MainTitle' => $title,
				'PageTitle' => $title,
			]);
		}
	}
}