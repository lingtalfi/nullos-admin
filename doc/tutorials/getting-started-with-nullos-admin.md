Getting started with nullos admin
====================================
2016-12-19



In this tutorial, we install a database, we generate some crud files.

All right folks, I'm in an hurry (sort of), so I will need you to be curious, and I will try to 
go straight to the point.




Table of contents
---------------------
- [Getting started with nullos admin](#getting-started-with-nullos-admin)
 * [Table of contents](#table-of-contents)
- [Install the nullos admin app](#install-the-nullos-admin-app)
- [First login](#first-login)
- [The "Boot" page](#the-boot-page)
- [Creating the database](#creating-the-database)
- [Create the crud files](#create-the-crud-files)


Install the nullos admin app
==============================
2016-12-19



- Download the app from this repository
- Find the **app-nullos** directory: this is the [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif) application, and the only directory that matters for this tutorial.
    - put this directory where you want on your machine
- Make the **app-nullos/www** directory the web public directory (the directory served by your web server)
    - also, make all virtual requests (the requests pointing to non exisiting files) point to the **app-nullos/www/index.php**
            - there is already a **app-nullos/www/.htaccess** file for you if you use apache
    - in the examples for this tutorial, I will be using a server name of nullos (http://nullos)            
            
- Give write permissions to the **app-nullos/log** directory (which contains the application and php logs)
           

                       
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

You will now see the starting page of a fresh **nullos admin** app. (see screenshot below).


[![main-screen.png](https://s19.postimg.org/b6iixupr7/main_screen.png)](https://postimg.org/image/xigbr8ov3/)


This first page is called the "Boot" page, and its goal is to create the init file.

If you look in the files in your application, you will find a **app-nullos/init-fallback.php**
file (which is the fallback init), but you will not find the **app-nullos/init.php** file, which
is the so-called **init** file.

The goal of the "Boot" page is to create the **app-nullos/init.php** file for you.


You could of course create the init.php file manually if you wanted to, but for now let's use the gui,
which is faster.

At this point you need to create a database if you don't have one.

I've created a new database named "oui".

```mysql
CREATE DATABASE oui CHARACTER SET utf8 COLLATE utf8_general_ci;

// or 

CREATE DATABASE oui CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```



Fill the form on the "Boot" page, don't forget the "database" section if your 
front website uses one or more databases.


After a successful post, you will see the success message, like in the following screenshot.

[![boot-success.png](https://s19.postimg.org/6aaasf083/boot_success.png)](https://postimg.org/image/f5b52xp0f/)


From now the **app-nullos/init.php** file has been 
created and the router will let you navigate the other pages.


For more details about the "Init writer" page and/or the "Reset" page, 
please refer to the [Boot module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module.md) documentation.



For now, we are going to import the oui database and create the corresponding crud list/forms.


Creating the database
=========================
2016-12-19

So if you have your own database, you can use it for the rest of the tutorial and skip this section.

If you don't have a database, or want to reproduce the exact same steps as me, then click the 
"Execute SQL" menu item.


You will see the "Execute SQL page" (see screenshot below).


[![execute-sql.png](https://s19.postimg.org/ti96ezyeb/execute_sql.png)](https://postimg.org/image/tv0kl6gnz/)

With this page, we can import a database easily.

Navigate to the "From favorites" section and select the oui.sql file, then submit.

It will take some times, but then you will see the success screen (see screenshot below).

[![execute-sql-from-favorites-success.png](https://s19.postimg.org/3lfi2duqr/execute_sql_from_favorites_success.png)](https://postimg.org/image/p7uijetb3/)



Now the database is fully operational.

If you are curious about what it looks like, you can see the database schema here: [oui-schema](https://github.com/lingtalfi/nullos-admin/tree/master/doc/assets/oui-schema.png).


For more information about the "Execute Sql" page, please visit the [SqlTools module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module.md) documentation.


Our next step is to create the crud files (lists and forms).



Create the crud files
========================
2016-12-19

Now we are going to use the "Crud generators", which make your life easier.

Click the "Crud Generators" menu item, it opens the "Crud generators" page (see screenshot below).


[![crud-generators.png](https://s19.postimg.org/n207owpur/crud_generators.png)](https://postimg.org/image/sdf49mbxb/)

In this case, accept the defaults and click the submit button.
 
This will take a while, generate all the crud files, and display the success screen (see screenshot below).

[![crud-generators-success.png](https://s19.postimg.org/jtr4y4e77/crud_generators_success.png)](https://postimg.org/image/nq4gu3z6n/)


Click the "click here" button in the success message, and you should have a new menu section named website
on the left menu.


Congratulations! You've just generated the crud files which allow interaction with your database(s).

If it's your first time, take the time to navigate and enjoy the new menu items in the "Website" section 
of the left menu. Try interacting with your database.

 
The screenshot below represents an example list generated by the crud generators.

[![crud-generator-list.png](https://s19.postimg.org/9v66bn4rn/crud_generator_list.png)](https://postimg.org/image/khzzh2cwv/)



 
For more information about the "Crud generators" page, please visit the [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module.md) documentation.



If you've made it so far, congratulations.

Hopefully you enjoyed it, and see you in a next tutorial.























