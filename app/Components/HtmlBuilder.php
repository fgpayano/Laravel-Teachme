<?php

namespace App\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder{

	public function menu($arrElements)
	{
		if (! is_array($arrElements))
		{
			$arrElements = config($arrElements);
		}

		return view('partials/menu', compact('arrElements'));
	}

	public function doActiveClass ($className = "", $value = "")
	{	
		
	}
}