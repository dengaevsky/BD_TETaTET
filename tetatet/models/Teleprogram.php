<?php

namespace models;

use core\Utils;
use Imagick;

class Teleprogram extends \core\Model
{

    public function AddTeleprogram($row)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аутентифікований']
            ];
            return $result;
        }
        $validateResult = $this->Validate($row); /** валідація **/
        if (is_array($validateResult)) {
            $result = [
                'error' => true,
                'messages' => $validateResult
            ];
            return $result;
        }
        $fields = ['premiere', 'project_id','start_time', 'end_time']; /** дані для таблиці **/
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['user_id'] = $user['id'];
        $id = \core\Core::getInstance()->getDB()->insert('teleprogram', $rowFiltered); /** відправляємо в бд**/
        return [
            'error' => false,
            'id' => $id
        ];
    }



    public function GetLastTeleprogram($count)
    {
        return \core\Core::getInstance()->getDB()->select('teleprogram', '*', null, ['datetime'=>'DESC'], $count);
    }

    public function GetTeleprogramById($id)
    {
        $teleprogram = \core\Core::getInstance()->getDB()->select('teleprogram', '*', ['id'=>$id]);
        if (!empty($teleprogram))
            return $teleprogram[0];
        else
            return null; 
    }

    public function UpdateTeleprogram($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null)
            return false;
        $validateResult = $this->Validate($row);
        if (is_array($validateResult))
            return $validateResult;
        $fields = ['premiere', 'project_id', 'start_time', 'end_time', 'user_id'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        \core\Core::getInstance()->getDB()->update('teleprogram', $rowFiltered, ['id' => $id]);
        return true;
    }

    public function DeleteTeleprogram($id)
    {
        $teleprogram = $this->GetTeleprogramById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if (empty($teleprogram) || empty($user) || $user['id'] != $teleprogram['user_id'] && $user['role'] !=1)
        {
            return false;
        } else {
            \core\Core::getInstance()->getDB()->delete('teleprogram', ['id' => $id]);
            return true;
        }
    }

    public function Validate($formrow)
    {
        $errors = [];
        if (empty($formrow['premiere']))
            $errors [] = 'Поле "День" не може бути порожнім!';

             if (empty($formrow['project_id']))
            $errors [] = 'Поле "Проект" не може бути порожнім!';
        
           if (empty($formrow['start_time']))
            $errors [] = 'Поле "Початок програми" не може бути порожнім!';
        
            if (empty($formrow['end_time']))
            $errors [] = 'Поле "Кінець програми" не може бути порожнім!';
        if(count($errors)>0)
            return $errors;
        else
            return true;
    }
}