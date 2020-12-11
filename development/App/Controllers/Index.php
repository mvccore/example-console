<?php

namespace App\Controllers;

class Index extends Base
{
    public function IndexAction () {
		$this->view->Title = 'Console Application Demo';
		$this->view->ImportKey = 'R';
		$this->view->QuitKey = 'Q';
		register_shutdown_function([__CLASS__, 'HandleInput']);
    }
	public static function HandleInput () {
		$handle = fopen('php://stdin', 'r');
		$line = trim(fgets($handle));
		if ($line == 'R') {
			$this->Url('Import:Index', ["testparam" => "test value"]);
		} else if ($line == 'Q') {
			exit;
		} else {
			echo "TODO: dispatch action Import:Index\n";
		}
		fclose($handle);
	}
    public function NotFoundAction () {
		$this->view->Title = "Error 404 - requested page not found.";
		$this->view->Message = $this->request->Params['message'];
    }
}