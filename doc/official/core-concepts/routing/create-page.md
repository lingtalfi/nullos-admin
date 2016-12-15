Create a page
==================
2016-11-30



In order to create a page in nullos, do the following steps:

- Create a php file in the **app-nullos/pages** directory
    - put any html in your file
- Open the **app-nullos/www/index.php** and search for the **$uri2pagesMap** variable
    - add a new line to the **$uri2pagesMap** array, the key being the access uri, and the value being the file name that you've just created  
    
    



Related
-------------
If you want your page to look like another **nullos admin** page, please check out the [nullos layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/nullos-layout.md) page.