Tutorial: Stash nullos behind a namespace url
=================
2016-11-25


ALthough nullos can help creating any type of websites, it was first designed as an admin tool, like phpMyAdmin.


If you own a domain name, then you will probably put your front website on that domain.


But what about the admin?

Which url should be used to access the admin?, and how do you implement it?


Those questions will be answered in this document.




First, you need to choose an url namespace.

In this document, I will use the namespace **admin**, but you can change it as you like (and you should for obvious security reasons).

The url namespace is appended to the website url, and the result is our entry to the nullos admin.


So if the website's url is **http://mywebsite.com**, then to access the nullos admin you would browse to **http://mywebsite.com/admin**.
 
 
That's the intent, but now you need to implement it.
 
 
 
In nullos, open the xxx file, and replace the URL_PREFIX 

