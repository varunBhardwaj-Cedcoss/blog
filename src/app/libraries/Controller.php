<?php
// load the model and view
namespace App;

class Controller
{
    public function model($model, $arr)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            if ($arr == 'Admin') {
                 require_once '../app/models/' . $model . '.php';
            } else {
                require_once '../app/models/' . $model . '.php';
            }
        } else {
            die('model file does not exist');
        }
    }

    //load the view (checks for file)
    public function view($view, $data, $arr)
    {
        if (file_exists('../app/views/pages' . $view . '.php')) {
            require_once '../app/views/pages' . $view . '.php';
        } else {
            die('view file does not exist');
        }
    }
}
