<?php

class SalutController extends Controller
{
    public function index()
    {
        echo "salut";
    }

    public function test($name = "...")
    {
        $model = $this->load_model("Test");
        $model->setName($name);

        $view= $this->load_view("home", "test", ["name" => $model->getName()]);

    }
}

?>