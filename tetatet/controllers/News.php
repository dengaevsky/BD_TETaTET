<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля News
 */
class News extends Controller
{
	protected $user;
	protected $newsModel;
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new \models\Users();
		$this->newsModel = new \models\News();
		$this->user = $this->userModel->GetCurrentUser();
	}

	/**
	 * Відображення початкової сторінки модуля
	 */
	public function actionIndex()
	{
		global $Config;
		$title = 'Новини';
		$lastNews = $this->newsModel->GetLastNews($Config['NewsCount']);
		return $this->render('index', ['lastNews'=>$lastNews], [
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
		$news = $this->newsModel->GetNewsById($id);
		$title = $news['title'];
		return $this->render('view', ['model' => $news],
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
			$result = $this->newsModel->AddNews($_POST);
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
					move_uploaded_file($_FILES['file']['tmp_name'], 'files/news/'.$name);
					$this->newsModel->ChangePhoto($result['id'], $name);
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
		$news = $this->newsModel->GetNewsById($id);
		$titleForbidden = 'Доступ заборонено';
		if (empty($this->user) || $news['user_id'] != $this->userModel->GetCurrentUser()['id'] && $this->userModel->GetCurrentUser()['role'] != 1)
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
				$result = $this->newsModel->UpdateNews($_POST, $id);
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
					move_uploaded_file($_FILES['file']['tmp_name'], 'files/news/'.$name);
					$this->newsModel->ChangePhoto($id, $name);
				}
				return $this->renderMessage('ok', 'Редаговано', null,
					[
						'MainTitle' => $title,
						'PageTitle' => $title,
					]); 
				} else {
					$message = implode('<br/>', $result);
					return $this->render('form', ['model' => $news],
						[
							'MainTitle' => $title,
							'PageTitle' => $title,
							'MessageText' => $message,
							'MessageClass' => 'ok',
						]); 
				}
			} else {
				return $this->render('form',  ['model' => $news],
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
			if($this->newsModel->DeleteNews($id))
			{
				header('Location: /news/');
			} else {
				return $this->renderMessage('error', 'Помилка видалення', null,
				[
					'MainTitle' => $title,
					'PageTitle' => $title,
				]);
			}
		} else {
			$news = $this->newsModel->GetNewsById($id);
			return $this->render('delete', ['model' => $news],
			[
				'MainTitle' => $title,
				'PageTitle' => $title,
			]);
		}
	}
}