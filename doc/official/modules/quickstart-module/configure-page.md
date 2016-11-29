Quickstart: the Configure page
============================
2016-11-29



[![quickstart-module-configure-page.png](https://s19.postimg.org/sj83hc2cj/quickstart_module_configure_page.png)](https://postimg.org/image/7z39iumlb/)




When you connect as root for the first time to a fresh **nullos admin** application,
the home page will detect that the init file is missing and redirect you to the "Configure" page.
 
In other words, the "Configure" page is the entry point of a fresh **nullos admin** application.


The goal of the "Configure" page is to create the init file, which contains some of the basic settings 
of your application, and most importantly the database credentials (if you use a database). 

To create the init file, fill the form on the "Configure" page and press the submit button.

This will create the init file at **app-nullos/init.php**.


If for some reasons the init file already exist, the "Configure" page will overwrite it.

So it is recommended that you make some backup of your init file should you customize it manually. 

