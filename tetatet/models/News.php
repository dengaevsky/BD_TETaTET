<?php

namespace models;

use core\Utils;
use Imagick;

class News extends \core\Model
{
    public function ChangePhoto($id, $file)
    {
        $folder = 'files/news/';
        $file_path = pathinfo($folder.$file);

        /** створення назв**/
        $file_big = $file_path['filename'].'_b';
        $file_middle = $file_path['filename'].'_m';
        $file_small = $file_path['filename'].'_s';
        $news = $this->GetNewsById($id);
        if (is_file($folder.$news['photo'].'_b.jpg') && is_file($folder.$file))
            unlink($folder.$news['photo'].'_b.jpg');
        if (is_file($folder.$news['photo'].'_m.jpg') && is_file($folder.$file))
            unlink($folder.$news['photo'].'_m.jpg');
        if (is_file($folder.$news['photo'].'_s.jpg') && is_file($folder.$file))
            unlink($folder.$news['photo'].'_s.jpg');
        $news['photo'] = $file_path['filename'];

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
        $this->UpdateNews($news, $id);
    }

    public function AddNews($row)
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
        $fields = ['title', 'category','description', 'text']; /** дані для таблиці **/
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['photo'] = '...photo...';
        $id = \core\Core::getInstance()->getDB()->insert('news', $rowFiltered); /** відправляємо в бд**/
        return [
            'error' => false,
            'id' => $id
        ];
    }

    public function GetLastNews($count)
    {
        return \core\Core::getInstance()->getDB()->select('news', '*', null, ['datetime'=>'DESC'], $count);
    }

    public function GetNewsByTitle($title)
    {
        $news = \core\Core::getInstance()->getDB()->select('news', '*', ['title'=>$title]);
        if (!empty($news))
            return $news[0];
        else
            return null; 
    }

    public function GetNewsById($id)
    {
        $news = \core\Core::getInstance()->getDB()->select('news', '*', ['id'=>$id]);
        if (!empty($news))
            return $news[0];
        else
            return null; 
    }

    public function UpdateNews($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null)
            return false;
        $validateResult = $this->Validate($row);
        if (is_array($validateResult))
            return $validateResult;
        $fields = ['title', 'category','description', 'text', 'photo'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        //$rowFiltered['user_id'] = $user['id'];
        //$rowFiltered['photo'] = '...photo...';
        \core\Core::getInstance()->getDB()->update('news', $rowFiltered, ['id' => $id]);
        return true;
    }

    public function DeleteNews($id)
    {
        $news = $this->GetNewsById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if (empty($news) || empty($user) || $user['id'] != $news['user_id'] && $user['role'] !=1)
        {
            return false;
        } else {
            \core\Core::getInstance()->getDB()->delete('news', ['id' => $id]);
            return true;
        }
    }

    public function Validate($formrow)
    {
        $errors = [];
        if (empty($formrow['title']))
            $errors [] = 'Поле "Заголовок" не може бути порожнім!';
        if (empty($formrow['category']))
            $errors [] = 'Поле "Заголовок" не може бути порожнім!';
        if (empty($formrow['description']))
            $errors [] = 'Поле "Короткий опис новини" не може бути порожнім!';
        if (empty($formrow['text']))
            $errors [] = 'Поле "Повний текст новини" не може бути порожнім!';
        if(count($errors)>0)
            return $errors;
        else
            return true;
    }
}