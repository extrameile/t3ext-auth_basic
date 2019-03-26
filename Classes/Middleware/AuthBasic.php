<?php
declare(strict_types=1);

namespace AndreasKiessling\AuthBasic\Middleware;

use Middlewares\BasicAuthentication;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\RootlineUtility;
use TYPO3\CMS\Frontend\Page\PageRepository;


class AuthBasic implements \Psr\Http\Server\MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($request);

        /** @var \TYPO3\CMS\Core\Routing\PageArguments $pageArguments */
        $pageArguments = $request->getAttribute('routing');
        $pageId = $pageArguments->getPageId();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage($pageId);

        $rootlineUtility = GeneralUtility::makeInstance(RootlineUtility::class, $pageId);
        $rootline = $rootlineUtility->get();

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($rootline);
        die();

        $authData = new BasicAuthentication(
            [
                'test2' => 'test2',
            ]
        );
        $response = $authData->process($request, $handler);

        return $response;
    }


}