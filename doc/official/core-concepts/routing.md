Routing
===============
2016-11-29 -- 2016-12-03



In nullos, the Router's goal is to find which page corresponds to a given uri, and to call that page.


In nullos, a page is a php file.


As for now, the nullos router is basically a simple php array which makes a direct correspondence between the uri and the 
php page to include.


The Router is located in **app-nullos/www/index.php**, in the Router section.


The algorithm of the Router is the following:

- Is the user connected?
    - if not connected, then include the [login page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/authentication-module/login-page.md)
- Is the application initialized? 
    - if not initialized, then include the [boot page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module/boot-page.md)
- Then the default router searching mechanism is applied:
    - search the **$uri2pagesMap** array (simple php array binding uris to php pages)
        - The **$uri2pagesMap** is decorated by the [modules](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules.md) before being searched 
- If everything else fails, include the 404 page



All the pages are located in the **app-nullos/pages** directory.


To be more concrete, here is the $uri2pagesMap array as of 2016-11-30 (it has been updated since, but the principle remains the same):

```php
$uri2pagesMap = [
    '/' => 'home.php',
    '/table' => 'table.php',
    '/quickstart' => 'quickstart.php',
    '/test' => 'test.php',
];
```

And so, if the **/** uri is called, then the router includes the **app-nullos/pages/home.php** file.
 
If the **/table** uri is called, then the router includes the **app-nullos/pages/table.php** file. 



Note: as of now parameters in the url are ignored by the router during the matching process.
Therefore if the **/table?action=edit** uri is called, then the router would treat it as **/table** and include the **app-nullos/pages/table.php** file.  



- [Create a page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/routing/create-page.md)