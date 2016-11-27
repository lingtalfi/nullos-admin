Quickstart tutorial
=======================
2016-11-27


Welcome to the quickstart tutorial of Nullos admin.

In this tutorial, we install the nullos package on our machine, we install a test database, and finally we configure 
nullos to interact with it.

The configuration of nullos itself take less than 30 seconds (that is, if you are fast like me), as we will soon see.

Then, for the brave amongst you, we will dive into advanced configuration and take the time to configure all the parameters
how we want them. This step will take a long time (but less than 10 minutes if you are fast like me).

At the end of the tutorial, our website will look like this:


final-result.png



Are you ready?


Table of content
----------------------
- install the nullos package
- install the test database
- configure nullos: basic configuration
- optional: advanced nullos customization





Install the nullos package
=============================


- Go on the nullos admin's github page: https://github.com/lingtalfi/nullos-admin, and download the project.
- Unzip the downloaded archive and find the directory **app-nullos**
- (optional) Move the **app-nullos** where you want on your machine 
- Find the directory **app-nullos/www**, and point a webserver (nginx, apache, ...) to that directory
    - Make sure all virtual requests are redirected to **app-nullos/www/index.php**, this is how nullos works
        - In my case, I will be using nginx and my hostname will be **nullos-admin** (see my configuration below)
        - If you use apache, there is already the **app-nullos/www/.htaccess** file that takes care of redirecting the virtual requests to the index.php, but you still need to create a virtual host (or what have you)
- Open your favorite browser and open the http://nullos-admin url (or what domain have you)
     - if successful, you should see the following log in screen (screenshot below)
     
     
login-screen.png     


My nginx config is the following:

```nginx
 server {
    listen 80; 
    server_name nullos-admin;
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




Install the test database
============================

Before we go further, we need a database for nullos to interact with.

So I have this nice database in [oui.sql](https://github.com/lingtalfi/nullos-admin/tree/master/doc/quickstart-tutorial/assets/oui.sql).

If you have your own database, you can use it and skip this section.

In the rest of this tutorial, I will be using **oui.sql**.

To install it, open phpMyAdmin and paste the content of **oui.sql** in the SQL tab and press the Go button (see screenshot below).

phpmyadmin-import.png


Another way to do it, perhaps faster, is to use the following command line:

```bash
mysql -uroot -proot < oui.sql
```

If you are curious, here is what it looks like, using the MysqlWorkBench software: [oui schema](https://github.com/lingtalfi/nullos-admin/tree/master/doc/quickstart-tutorial/assets/db.png)




Configure nullos: basic configuration
==========================================


- Open the [http://nullos-admin](http://nullos-admin) url in your browser (back to the login screen)
- Login using root and root as the pseudo and password
    - this will log you as the most powerful user in nullos
    - you should see the install page screen (see screenshot below)
  

install-page-welcome.png


Let's briefly discuss the interface here.

- At the top, on the right, you have the lang module with the available languages. Feel free to change language
- On the left, you have the left menu  
    - on the right of the title "Nullos Admin", there is the log out icon
    - then below you have the Quickstart menu with its items: "Start", "Reset" and "Hide this"
- On the right, you have the main content, which is currently an installation form
- Note that you can drag the split between the left and right panes
    - this is provided by the nice [Split.js](https://github.com/nathancahill/Split.js) library 
    
    
    
Okay, let's continue the configuration.
    
- Fill the form on the right pane and click the "Submit" button. I used:
    - Language: en
    - Website name: My Website
    - Name: oui
    - User: root
    - Password: root
    
- The process will try to create the **app-nullos/init.php** file, filled with the data you've just provided    
- If successful, you should the congratulation alert (see screenshot below)
    
init-created-congrats.png


- Click the Yes link
- You should now be on the page to generate the tables and lists for your application (see screenshot below)



install-generate-forms-lists.png
    
    
- In the form, choose the oui database and click the "Submit" button. This will take a while (5 seconds or so)
- If successful, you should see the "All tables have been generated" notification (see screenshot below)
 
all-tables-generated.png 


- Click the "Click here" link
- You should be redirected to the final congratulations page (see screenshot below)


final-congratulations.png



If you have made it so far, congratulations. Look on the left, the tables of the oui database have been generated!


TODO...
Please take a moment to familiarize yourself with the datatables, and the forms

    
    