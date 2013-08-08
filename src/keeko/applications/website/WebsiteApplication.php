<?php
namespace keeko\applications\website;

use keeko\core\application\AbstractApplication;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\routing\ApplicationRouter;

class WebsiteApplication extends AbstractApplication {

	
	/* (non-PHPdoc)
	 * @see \keeko\core\application\AbstractApplication::doRun()
	 */
	protected function doRun(Request $request, Response $response, ApplicationRouter $appRouter) {
		$response->setContent('Hello World');
		return $response;
		
// 		$handler = $this->router->getHandler();
// 		$match = $this->router->match($appRouter->getDestination());
		
// 		$main = $handler->getMainContent($match);
	}


}