<?php

namespace core;

/**
 * Базовий клас для всіх контролерів
 */
class Controller
{
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') /** перевірка **/
            return true;
        else
            return false;
    }

    public function isGet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            return true;
        else
            return false;
    }

    public function postFilter($fields)
    {
        return Utils::ArrayFilter($_POST, $fields); /** фільтр посту **/
    }

    public function render($viewName, $localParams = null, $globalParams = null) /** вивід **/
    {
        $tpl = new Template();
        if (is_array($localParams))
            $tpl->setParams($localParams);
        if (!is_array($globalParams))
            $globalParams = [];
        $moduleName = strtolower((new \ReflectionClass($this))->getShortName());
        $globalParams['PageContent'] = $tpl->render("views/{$moduleName}/{$viewName}.php"); /** результат = зарендерити папку з виглядом**/
        return $globalParams;
    }

    public function renderMessage($type, $message, $localParams = null, $globalParams = null) /** рендер повідомлення**/
    {
        $tpl = new Template();
        if (is_array($localParams))
            $tpl->setParams($localParams);
        $tpl->setParam('MessageText', $message);
        switch ($type)
        {
            case 'ok' :
                $tpl->SetParam('MessageClass', 'success');
                break;
            case 'error' :
                $tpl->SetParam('MessageClass', 'danger');
                break;
            case 'warning' :
                $tpl->SetParam('MessageClass', 'warning');
                break;
        }
        if (!is_array($globalParams))
            $globalParams = [];
        $globalParams['PageContent'] = $tpl->render("views/layout/message.php");
        return $globalParams;
    }
}
