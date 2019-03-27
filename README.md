# WIP/Proof of concept - Not ready for production!


## What does it do?

Protect pages (and subpages) with an Auth Basic login by utilizing the Middleware API in TYPO3 9.5
The extension is executed after the target page is determined and checks the rootline for an activated Auth Basic flag.
The login credentials are currently simple configured as is in plaintext
~~~
username:password
~~~


## Todos
* add page overlay icon to show the protected status
* configurable
** add global IP whitelist configuration
** probably respect devIPmask settings or skip protection for Development Context
** skip Auth Basic if backend login is active
** stop request on non https connections?
* test setup with proxy setups etc. 
* improve code quality :smile:

## Notes
Kudos to https://www.qbus.de/qblog/psr-15-middlewares-fuer-typo3-cms-v9/ for the example implementation of how to use the API

 
