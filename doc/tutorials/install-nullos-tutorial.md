Install nullos tutorial
===============================
2016-12-25



In this tutorial, you learn how to install nullos.


If you are used to install websites, it's not different.


Here is the plan:


- Download the app from this repository
- Find the **app-nullos** directory: this is the [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif) application, and the only directory that matters for this tutorial.
    - put this directory where you want on your machine
- Make the **app-nullos/www** directory the web public directory (the directory served by your web server)
    - also, make all virtual requests (the requests pointing to non exisiting files) point to the **app-nullos/www/index.php**
            - there is already a **app-nullos/www/.htaccess** file for you if you use apache
    - in the examples for this tutorial, I will be using a server name of nullos (http://nullos)            
            
           
                       
nginx config example:
```nginx
 server {
    listen 80; 
    server_name nullos;
	index index.php index.html;

    root "/pathto/test/app-nullos/www";

    try_files $uri $uri/ /index.php?$query_string;
    
	location ~ \.php {
	    include fastcgi_params;
	    include fastcgi.conf;
	    fastcgi_pass 127.0.0.1:9000;
	}
 }            
```            



Permissions
---------------
2016-12-20 

Then you need to setup the permissions.
I personally like to have all rights on all directories while developing, because
nullos needs to write in a lot of places.

Nullos permissions setup is explained in the [nullos permissions](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/nullos-permissions.md) document.



First login
==============================
2016-12-19


At that point, you should be able to open the **http://nullos** url (or whatever url you've configured 
in the previous step) in your browser, and it should display the login screen (see screenshot below).

[![login-screen.png](https://s19.postimg.org/ls2e9uw2r/login_screen.png)](https://postimg.org/image/gtevvbs9r/)


Type the credentials (pseudo: root, password: root) and log in.




The "Boot" page
==============================
2016-12-19

The **nullos files** are now downloaded on your machine.

Technically though, the nullos application is not initialized.

We need to create the **init.php** file to complete this tutorial.

Open the **http://nullos** url (or whatever url you setup with your webserver) in your browser.

You will now see the starting page of a fresh **nullos admin** app. (see screenshot below).


[![main-screen.png](https://s19.postimg.org/b6iixupr7/main_screen.png)](https://postimg.org/image/xigbr8ov3/)


This first page is called the "Boot" page, and its goal is to create the init file.

If you look in the files in your application, you will find a **app-nullos/init-fallback.php**
file (which is the fallback init), but you will not find the **app-nullos/init.php** file, which
is the so-called **init** file.

The goal of the "Boot" page is to create the **app-nullos/init.php** file for you.


You could of course create the init.php file manually if you wanted to, but for now let's use the gui,
which is faster.


Fill the form on the "Boot" page to create the **init.php** file.

To have more details on each field of the form, read the <-boot init page-> documentation.



After a successful post, you will see the success message, like in the following screenshot.

[![boot-success.png](https://s19.postimg.org/6aaasf083/boot_success.png)](https://postimg.org/image/f5b52xp0f/)


From now the **app-nullos/init.php** file has been 
created and the router will let you navigate the other pages.


For more details about the "Init writer" page and/or the "Reset" page, 
please refer to the [Boot module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module.md) documentation.





Creating the database
=========================
2016-12-19 -- 2016-12-26


An important question is: do your application use a database?

If not, you can skip this section.

So if you have your own database, you can use it for the rest of the tutorial and skip this section too.

If you don't have a database ready yet and would like to create an example database, then read on.


We are going to create the "oui" database, which is a database I used for a client once.

I believe it's a good example database: it's schema is here: <!-oui-schema.png-> (created with <-MysqlWorkBench->).
 

To create the database, open a terminal and type the following (we use the utf-8 encoding):

```mysql
CREATE DATABASE oui CHARACTER SET utf8 COLLATE utf8_general_ci;

// or 

CREATE DATABASE oui CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```


Now we will import the "oui" database, we can use the [SqlTools module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module.md) provided by **nullos admin**.


Click the "Execute SQL" link on the left menu (see screenshot below).


[![execute-sql.png](https://s19.postimg.org/ti96ezyeb/execute_sql.png)](https://postimg.org/image/tv0kl6gnz/)


With this page, we can import a database easily.

Navigate to the "From favorites" section and select the oui.sql file, then submit.

Note: the **oui.sql** is already present, I put it in the **app-nullos/fixtures** directory for pedgagogic purpose.

Once the form is submitted, it will take some time, but ultimately you will see the success screen (see screenshot below).

[![execute-sql-from-favorites-success.png](https://s19.postimg.org/3lfi2duqr/execute_sql_from_favorites_success.png)](https://postimg.org/image/p7uijetb3/)



Now the database is fully operational.

For more information about the "Execute Sql" page, please visit the [SqlTools module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module.md) documentation.



What now?
==============
2016-12-26


So that's it!

Hopefully it was not too difficult.

Now that you know how to install a **nullos admin** app, a whole new world opens to you.

Remember, sky is the limit.














