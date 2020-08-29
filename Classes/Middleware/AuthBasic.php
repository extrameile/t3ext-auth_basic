<?php

declare(strict_types=1);

namespace Extrameile\AuthBasic\Middleware;

use Middlewares\BasicAuthentication;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\RootlineUtility;

class AuthBasic implements \Psr\Http\Server\MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {

        /** @var \TYPO3\CMS\Core\Routing\PageArguments $pageArguments */
        $pageArguments = $request->getAttribute('routing');
        $pageId = $pageArguments->getPageId();

        if ($this->skipLoginRequirement()) {
            return $response = $handler->handle($request);
        }

        $rootLine = GeneralUtility::makeInstance(RootlineUtility::class, $pageId)->get();

        $loginRequired = false;
        $logins = [];

        foreach ($rootLine as $page) {
            if ((bool)$page['authbasic_active'] === true) {
                $userData = GeneralUtility::trimExplode(\chr(10), $page['authbasic'], true);

                if (!empty($userData)) {
                    $loginRequired = true;

                    $logins = [];

                    foreach ($userData as $userLine) {
                        [$key, $value] = \explode(':', $userLine, 2);
                        $logins[$key] = $value;
                    }

                    break 1;
                }
            }
        }

        if ($loginRequired === true) {
            $authData = new BasicAuthentication($logins);
            $authData->realm('Protected area');
            $response = $authData->process($request, $handler);
        } else {
            $response = $handler->handle($request);
        }

        return $response;
    }

    /**
     * Checks if the auth basic is needed at all
     *
     * @return bool
     */
    private function skipLoginRequirement()
    {
        return isset($GLOBALS['BE_USER']);
    }
}
