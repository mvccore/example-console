<?php

namespace App\Views\Helpers;

class Chars {
	public function Chars ($count = 4, $char = ' ') {
		return str_pad('', $count, $char);
	}
}