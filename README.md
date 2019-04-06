# WIP/Proof of concept - Not ready for production!


## What does it do?

Protect pages (and subpages) with an Auth Basic login by utilizing the Middleware API in TYPO3 9.5
The extension is executed after the target page is determined and checks the rootline for an activated Auth Basic flag.
The login credentials are currently saved in plain text, split username and password with a colon, split multiple accounts by newline.
~~~
username:password
~~~

## Try out
~~~
composer config repositories.auth-basic vcs https://github.com/akiessling/t3ext-auth_basic.git
composer require andreaskiessling/auth-basic dev-master
~~~

## Todos
* ~~add page overlay icon to show the protected status~~
* configurable?
  * add global IP whitelist configuration
  * probably respect devIPmask settings or skip protection for Development Context
  * ~~skip Auth Basic if backend login is active~~
  * stop request on non https connections?
  * skip in workspaces? Should previews be protectable with a login?
* Test / document usage with Apache/Nginx etc. because 
* Test / configure multilanguage setups
* test setup with proxy setups etc. 
* improve code quality :smile:

## Notes

Kudos to https://www.qbus.de/qblog/psr-15-middlewares-fuer-typo3-cms-v9/ for the example implementation of how to use the API in TYPO3

Kudos as well to https://github.com/middlewares/http-authentication#basicauthentication for providing an easy to use library for the auth basic stuff

 
