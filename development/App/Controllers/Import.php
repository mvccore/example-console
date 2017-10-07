<?php

namespace App\Controllers;

use App\Models;

class Import extends Base
{
	public function Init () {
		parent::Init();
		
	}
	public function PreDispatch () {
		parent::PreDispatch();
		
	}
	public function IndexAction () {
		die("import:index");
	}
}