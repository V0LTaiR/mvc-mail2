<?php

class Route
{
    function startRoute()
    {
        $class_name = 'Mail';
        $method_name = 'showForm';
        $str = $_SERVER["REQUEST_URI"];

        $parts = explode('/', $str,);
        if (!empty($parts[1])) {
            $class_name = $parts[1];
        }

        if (!empty($parts[2])) {
            $method_name = $parts[2];
        }
		
		
        $controller_filename = 'Controller_' . $class_name;
        $controller_file = $controller_filename . '.php';
        $controller_path = './application/controllers/' . $controller_file;
        
		$model_filename = 'model_' . $class_name;
		$model_file = $model_filename . '.php';
		$model_path = './application/models/' . $model_file;
		
		if (file_exists($model_path)) {
            require "./application/models/" . "$model_file";
			$modelString = 'Model_' . $class_name;
            $model = new $modelString;
        }
		
		if (file_exists($controller_path)) {
            require "./application/controllers/" . "$controller_file";
            $controller = new $class_name;
            $controller->$method_name();
        }
		
		
    }
}
