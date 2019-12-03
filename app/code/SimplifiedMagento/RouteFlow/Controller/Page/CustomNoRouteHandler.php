<?php


namespace SimplifiedMagento\RouteFlow\Controller\Page;


class CustomNoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{

    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        $request->setRouteName("no_routefound")->setControllerName("page")->setActionName("customnoroute");

        return true;
    }
}