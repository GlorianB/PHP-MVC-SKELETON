<?php

class Controller
{
    /**
     * Load model given in parameter
     * @var model : model to be loaded
     */
    protected function load_model($model)
    {
        require_once "../app/models/" . ucfirst($model) . "Model.class.php";
        $model_name = $model . "Model";
        return new $model_name;
    }

    /**
     * Load model given in parameter
     * @var model : model to be loaded
     */
    protected function load_view($folder = '', $view, $data = [])
    {
        require_once "../app/views/" . $folder . "/" . $view . ".php";
    }

}

?>