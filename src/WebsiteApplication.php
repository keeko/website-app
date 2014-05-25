<?php

namespace keeko\application\website;

use keeko\core\application\AbstractApplication;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteApplication extends AbstractApplication {
	
	/* (non-PHPdoc)
	 * @see \keeko\core\application\AbstractApplication::run()
	 */
	public function run(Request $request, $path) {
		return new Response('Hello World');
	}

}