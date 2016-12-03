Routing
===============
2016-11-29



In nullos, the Router's goal is to find which page corresponds to a given uri, and to call that page.


In nullos, a page is a php file.


As for now, the nullos router is a simple php array which makes a direct correspondence between the uri and the 
php page to include.


The Router is located in **app-nullos/www/index.php**, in the Router section.

The **$uri2pagesMap** variable is the array used by the Router to find the correspondence between an uri and a php page.

If there is no correspondence, the 404.php page will be used.

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