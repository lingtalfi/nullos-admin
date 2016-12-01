Install nullos on your machine
================================
2016-11-30





In this tutorial, we learn how to install the nullos package on our machine.



Table of content
----------------------
- [Install the nullos package](#install-the-nullos-package)
  * [Permissions](#permissions)
  
  


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
     
     
[![login-screen.png](https://s19.postimg.org/ejxlzn8wz/login_screen.png)](https://postimg.org/image/t34r1221r/)


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

Permissions
--------------

Nullos will have to write files during the installation process, so be sure that the webserver is granted the permissions to write 
in your app-nullos directory.

I personally have my nginx user set to my account user, so I don't have this problem.
Here is an excerpt of the nginx config that does that:


```nginx
# we are at the global level
user ling staff;
```

And in php-fpm.d/www.conf:

```conf
;user = _www
;group = _www
user = ling
group = staff
```
 
Note: in apache, you also have an User and Group directives
 
 