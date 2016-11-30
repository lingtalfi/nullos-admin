Local vs distant website
=============================
2016-11-30



Nullos follows a common development pattern which consists of having two versions of the same website:

- a development version
- a production version


The development version is the one on your machine, and the production version is the one on your production server.



In **nullos admin**, there is very few changes between the two versions: the only changes are located in 
the init file (**app-nullos/init.php** if present, or **app-nullos/init-fallback.php** otherwise), in the 
"LOCAL VS PROD" section, which looks like this:


```php
//--------------------------------------------
// LOCAL VS PROD
//--------------------------------------------
 if (true === Helper::isLocal()) {
     // php
     ini_set('display_errors', 1);
 
     // db
     $dbUser = 'root';
     $dbPass = 'root';
     $dbName = 'oui';
 
     // privilege
     $privilegeSessionTimeout = null; // unlimited session
 } else {
     // php
     ini_set('display_errors', 0);
 
     // db
     $dbUser = 'root';
     $dbPass = 'root';
     $dbName = 'oui';
 
     // privilege
     $privilegeSessionTimeout = 60 * 5;
 }
``` 


As you can see, this section is divided in two configuration blocks: one for the local environment, 
and one for the production environment.

When it's time to deploy your **nullos admin** website, you need to manually configure the production configuration block (the one at the bottom).


If you do use this development/production pattern, you have to update the content of the Helper::isLocal method:

- Open the **app-nullos/class/Helper.php** file and search for the isLocal method
- Update its content so that it can tell whether or not the current machine is your local machine or your production server
    - note that the current content of the Helper::isLocal is the one I personally use, it's probably not appropriate for you, unless you use a Mac OSX computer 



Be sure to make a copy of your init file, as the QuickStart module can rewrite it (see the [Quickstart configure](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/configure-page.md) page for more details),
and you could possibly loose your configuration.


If you don't use this development/production pattern (or use another one), you can get rid of the condition block, and you 
would have a flatten configuration block like this:


```php
//--------------------------------------------
// LOCAL VS PROD
//--------------------------------------------
// php
 ini_set('display_errors', 0);

 // db
 $dbUser = 'root';
 $dbPass = 'root';
 $dbName = 'oui';

 // privilege
 $privilegeSessionTimeout = 60 * 5;
```
 


