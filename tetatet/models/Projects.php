<?php

namespace models;

use core\Utils;
use Imagick;

class Projects extends \core\Model
{
    public function ChangePhoto($id, $file)
    {
        $folder = 'files/projects/';
        $file_path = pathinfo($folder.$file);

        /** створення назв**/
        $file_big = $file_path['filename'].'_b';
        $file_middle = $file_path['filename'].'_m';
        $file_small = $file_path['filename'].'_s';
        $projects = $this->GetProjectsById($id);
        if (is_file($folder.$projects['photo'].'_b.jpg') && is_file($folder.$file))
            unlink($folder.$projects['photo'].'_b.jpg');
        if (is_file($folder.$projects['photo'].'_m.jpg') && is_file($folder.$file))
            unlink($folder.$projects['photo'].'_m.jpg');
        if (is_file($folder.$projects['photo'].'_s.jpg') && is_file($folder.$file))
            unlink($folder.$projects['photo'].'_s.jpg');
        $projects['photo'] = $file_path['filename'];

        /** зчитування, переробка й зберігання фото **/
        $im_b = new Imagick();
        $im_b->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_b->cropThumbnailImage(900, 571, true);
        $im_b->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_big.'.jpg');

        $im_m = new Imagick();
        $im_m->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_m->cropThumbnailImage(340, 215, true);
        $im_m->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_middle.'.jpg');

        $im_s = new Imagick();
        $im_s->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_s->cropThumbnailImage(50, 50, true);
        //or $im_s->ThumbnailImage(180, 180, true, false); із збереженням пропорцій
        $im_s->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_small.'.jpg');
        unlink($folder.$file);
        $this->UpdateProjects($projects, $id);
    }

    public function AddProjects($row)
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
        $fields = ['title', 'category','description']; /** дані для таблиці **/
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['photo'] = '...photo...';
        $id = \core\Core::getInstance()->getDB()->insert('projects', $rowFiltered); /** відправляємо в бд**/
        return [
            'error' => false,
            'id' => $id
        ];
    }

    public function GetLastProjects($count)
    {
        return \core\Core::getInstance()->getDB()->select('projects', '*', null, ['datetime'=>'DESC'], $count);
    }

    public function GetProjectsByTitle($title)
    {
        $projects = \core\Core::getInstance()->getDB()->select('projects', '*', ['title'=>$title]);
        if (!empty($projects))
            return $projects[0];
        else
            return null; 
    }

    public function GetProjectsById($id)
    {
        $projects = \core\Core::getInstance()->getDB()->select('projects', '*', ['id'=>$id]);
        if (!empty($projects))
            return $projects[0];
        else
            return null; 
    }

    public function UpdateProjects($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null)
            return false;
        $validateResult = $this->Validate($row);
        if (is_array($validateResult))
            return $validateResult;
        $fields = ['title', 'category','description','user_id','photo'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        \core\Core::getInstance()->getDB()->update('projects', $rowFiltered, ['id' => $id]);
        return true;
    }

    public function DeleteProjects($id)
    {
        $projects = $this->GetProjectsById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if (empty($projects) || empty($user) || $user['id'] != $projects['user_id'] && $user['role'] !=1)
        {
            return false;
        } else {
            \core\Core::getInstance()->getDB()->delete('projects', ['id' => $id]);
            return true;
        }
    }

    public function Validate($formrow)
    {
        $errors = [];
        if (empty($formrow['title']))
            $errors [] = 'Поле "Заголовок" не може бути порожнім!';
        if (empty($formrow['category']))
            $errors [] = 'Поле "Категорія" не може бути порожнім!';
        if (empty($formrow['description']))
            $errors [] = 'Поле "Короткий опис" не може бути порожнім!';
        if(count($errors)>0)
            return $errors;
        else
            return true;
    }
}