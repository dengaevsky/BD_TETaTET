<?php

namespace core;

/**
 * Головний клас ядра системи
 * (синглтон)
 */
class Core
{
	private static $instance;
	private static $mainTemplate; /** зразок сторінки**/
	private static $db; /** бд**/
	private function __construct()
	{
		global $Config; /** приймаємо конфіг бд**/
		spl_autoload_register('\core\Core::__autoload'); /** підключаємось**/
		self::$db = new \core\DB($Config['Database']['Server'],
			$Config['Database']['Username'],
			$Config['Database']['Password'],
			$Config['Database']['Database']);
	}

	/**
	 * Повертає екземляр ядра системи
	 * @return Core
	 */
	public static function getInstance()
	{
		if (empty(self::$instance)){ /** якщо немає**/
			self::$instance = new Core(); /** створити**/
			return self::getInstance(); /** повернути**/
		}
		else
			return self::$instance; /** якщо є, то повернути**/
	}

	/**
	 * Отримати об'єкт-зєднання з базою даних
	 */
	public function getDB()
	{
		return self::$db;
	}

	/**
	 * Ініціалізація системи
	 */
	public function init()
	{
		session_start();
		self::$mainTemplate = new Template();
	}

	/**
	 * Виконує основний процес роботи CMS-системи
	 */
	public function run()
	{
		$path = $_GET['path'];
		$pathParts = explode('/', $path);

		$className = ucfirst($pathParts[0]); /** створюємо назви для классів**/
		if (empty($className))
			$fullClassName = 'controllers\\Site';
		else
			$fullClassName = 'controllers\\'.$className;

		$methodName = ucfirst($pathParts[1]); /** створюємо назви для методів**/
		if (empty($methodName))
			$fullMethodName = 'actionIndex';
		else
			$fullMethodName = 'action'.$methodName;

		if (class_exists($fullClassName)){ 
			$controller = new $fullClassName(); /** створюємо контроллер**/
			if (method_exists($controller, $fullMethodName)){
				$method = new \ReflectionMethod($fullClassName, $fullMethodName);
				$paramsArray = [];
				foreach ($method->getParameters() as $parameter)
				{
					array_push($paramsArray, isset($_GET[$parameter->name]) ? $_GET[$parameter->name] : null);
				}
				$result = $method->invokeArgs($controller, $paramsArray);
				if (is_array($result))
				{
					self::$mainTemplate->setParams($result); /** задаємо параметри**/
				}
			}
			else  /** інакше помилка**/
				throw new \Exception('404 Not Found');}
		else 
			throw new \Exception('404 Not Found');
		//echo "Class: {$fullClassName}, method: {$fullMethodName}";
	}

	/**
	 * Завершення роботи системи та виведення данних
	 */
	public function done(){
		self::$mainTemplate->display('views/layout/index.php'); /** виводимо сторінку за назвою**/
	}

	/**
	 * Автозавантажувач класів
	 * @param $fullClassName string Назва класу
	 */
	public static function __autoload($fullClassName)
	{
		$fileName = $fullClassName.'.php';
		if (is_file($fileName))
			include($fileName);
	}
}