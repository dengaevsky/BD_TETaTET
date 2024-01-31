<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля Projects
 */
class Projects extends Controller
{
	protected $user;
	protected $projectsModel;
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new \models\Users();
		$this->projectsModel = new \models\Projects();
		$this->user = $this->userModel->GetCurrentUser();
	}

	/**
	 * Відображення початкової сторінки модуля
	 */
	public function actionIndex()
	{
		global $Config;
		$title = 'Проекти';
		$lastProjects = $this->projectsModel->GetLastProjects($Config['ProjectsCount']);
		return $this->render('index', ['lastProjects'=>$lastProjects], [
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
		$projects = $this->projectsModel->GetProjectsById($id);
		$title = $projects['title'];
		return $this->render('view', ['model' => $projects],
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
			$result = $this->projectsModel->AddProjects($_POST);
			if ($result['error'] === false) { /** фото **/
				$allowed_types = ['image/png', 'image/jpeg']; 
				if (is_file($_FILES['file']['tmp_name']) && in_array($_FILES['file']['type'], $allowed_types)) {
					switch ($_FILES['file']['tmp_name']){
						case 'image/png':
							$extension = 'png';
							break;
						default :
							$extension = 'jpg';
					}
					$name = $result['id'].'_'.uniqid().'.'.$extension;
					move_uploaded_file($_FILES['file']['tmp_name'], 'files/projects/'.$name);
					$this->projectsModel->ChangePhoto($result['id'], $name);
				}
				return $this->renderMessage('ok', 'Успішно додано', null,
					[
						'PageTitle' => $title,
						'MainTitle' => $title
					]); 
			} else
			{
				$message = implode('<br/>', $result['messages']);
					return $this->render('form', ['model' => $_POST], [
						'PageTitle' => $title,	
						'MainTitle' => $title,
						'MessageText' => $message,
						'MessageClass' => 'danger'
				]); 
			}
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
		$projects = $this->projectsModel->GetProjectsById($id);
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
				$result = $this->projectsModel->UpdateProjects($_POST, $id);
				if ($result === true) {
					$allowed_types = ['image/png', 'image/jpeg'];
				if (is_file($_FILES['file']['tmp_name']) && in_array($_FILES['file']['type'], $allowed_types)) {
					switch ($_FILES['file']['tmp_name']){
						case 'image/png':
							$extension = 'png';
							break;
						default :
							$extension = 'jpg';
					}
					$name = $id.'_'.uniqid().'.'.$extension;
					move_uploaded_file($_FILES['file']['tmp_name'], 'files/projects/'.$name);
					$this->projectsModel->ChangePhoto($id, $name);
				}
				return $this->renderMessage('ok', 'Редаговано', null,
					[
						'MainTitle' => $title,
						'PageTitle' => $title,
					]); 
				} else {
					$message = implode('<br/>', $result);
					return $this->render('form', ['model' => $projects],
						[
							'MainTitle' => $title,
							'PageTitle' => $title,
							'MessageText' => $message,
							'MessageClass' => 'ok',
						]); 
				}
			} else {
				return $this->render('form',  ['model' => $projects],
					[
						'MainTitle' => $title,
						'PageTitle' => $title,
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
			if($this->projectsModel->DeleteProjects($id))
			{
				header('Location: /projects/');
			} else {
				return $this->renderMessage('error', 'Помилка видалення', null,
				[
					'MainTitle' => $title,
					'PageTitle' => $title,
				]);
			}
		} else {
			$projects = $this->projectsModel->GetProjectsById($id);
			return $this->render('delete', ['model' => $projects],
			[
				'MainTitle' => $title,
				'PageTitle' => $title,
			]);
		}
	}
}