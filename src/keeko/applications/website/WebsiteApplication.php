<?php
namespace keeko\applications\website;

use keeko\core\application\AbstractApplication;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\routing\ApplicationRouter;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class WebsiteApplication extends AbstractApplication {

	
	/* (non-PHPdoc)
	 * @see \keeko\core\application\AbstractApplication::doRun()
	 */
	protected function doRun(Request $request, Response $response, ApplicationRouter $appRouter) {
// 		$response->setContent('Hello World');
// 		return $response;
		
		
		try {
			$handler = $this->router->getHandler();
			$match = $this->router->match($appRouter->getDestination());

			
			// get design
			$design = $this->application->getDesign();
			$designPath = KEEKO_PATH_DESIGNS . '/' . $design->getName() . '/';

			
			// get layout from handler
			$layout = $handler->getLayout($match);
			$layout = $layout === null ? 'main' : $layout;
			
			$layoutDir = $designPath . '/templates';
			
			
			// get contents
			$contents = $handler->getContents($match);
			
			
			$loader = new \Twig_Loader_Filesystem($layoutDir);
			$twig = new \Twig_Environment($loader);
			
			$response->setContent($twig->render($layout . '.twig', $contents));
		
		} catch (ResourceNotFoundException $e) {
			$response->setStatusCode(404);
		} catch (MethodNotAllowedException $e) {
			$response->setStatusCode(405);
		}
		
		return $response;
	}


}