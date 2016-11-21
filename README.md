Nullos Admin
================

A php admin script to interact with a front end.


This is a work in progress...



[![Screen Shot 2016-11-21 at 23.45.32.png](https://s13.postimg.org/7rmsaid5z/Screen_Shot_2016_11_21_at_23_45_32.png)](https://postimg.org/image/6pclryucj/)





Why?
-----------------

I made a website for a client the other day.

With short deadlines, I figured I would just throw a phpMyAdmin and that everything would be fine.

So, I installed the phpMyAdmin and configured it to under 30 minutes, nice.
 
But, when the client opened her browser, she was just unhappy with it, she said that she wouldn't use it,
and that she preferred that I rather spent more time on the admin than working on the front.

Well, client is king so... that's what I did.


First I had to figure out what was wrong with phpMyAdmin.

I tried to explain to my client that the time spent on creating another admin would not be worth it, because phpMyAdmin
is just THE tool of choice to administer a simple website like the one she had.
 
But despite all my efforts to convince her, she would disagree.

Maybe she's a little stubborn, but the point here is that when that happens, you have to find an alternative, 
because YOU're the developer.

So, I guessed she thought that it was too complicated: too much columns like id and fancy options that she would never use.

So my main objective was to simplify the interface.

I know that my client has a wordpress background, so the idea of having a wordpress like gui was not excluded.


To sum up this section, I would say that if I had to administer a website personally, I would probably install phpMyAdmin.
However, for the clients who don't like it, nullos admin provide a fair compensation.



Why the name nullos admin (if you care)?
------------------------------------------
I knew my client could use phpMyAdmin if she wanted to, but she preferred to bust my balls, and I hated her for that
(I explained how it could save 15+ days of work for me but she didn't care).

So, my hate for that client was transferred into the name: nullos meaning basically looser or dumb in french (slang version).



What's the workflow with nullos admin
---------------------------------------

First of all, nullos admin is not focused on the mysql tables only, it can do other things (like in wordpress).
Also although it is designed to handle crud interactions, it doesn't go far beyond that technically speaking.
 
So this means you won't find options to delete the database or to create your own sql queries, or to administer the
table privileges.

It is rather an admin which focuses on being able to interact with the front end efficiently,
and the database interaction is just anecdotal.
 
 
Nullos admin emphasizes on the flexibility of the admin.

Nullos admin goes beyond phpMyAdmin on the following:

- you can decide what will be displayed on the left menu (which tables, or other unrelated links)
- related to the tables, you can decide configure the following on a per table basis:
    - which columns to display
    - which columns to search
    - what widget to display (pagination, sort, search, ...)
    - provide default values for the sort, the number of items per page, ... 
    - what row actions (edit, delete, your owns...) to display
    - what multiple actions (delete all, your owns...) to display










Where are we now?
--------------------

Today, I'm simply publishing my work online, because my computer has some hard drive problems and I believe it will die soon.

As stipulated at the top of this document, this project is a work in progress, and it is likely to evolve.

However, since concepts are still hot in my head, I figured that I would wrote them down before I miss some crucial details.


There are no tutorials for now, but when the "work in progress" flag will be removed, I will write one.
In the meantime, one can simply read the source code.





Structure
-------------

- class
    - Helper: contains various helper functions, like
        - isLocal
    - Layout: a layout is composed of any number of elements. In the case of nullos admin
        we mainly use only ONE layout (the one with a left menu and a right pane), and it only
        contains one element called body.
        
    - Spirit: used to pass important variables between classes
    - TableConfig: helper to configure the table
            which columns to display, ...
    - User: helper to implement a session user
- config
    - tables: that's where the TableConfig is configured. All tables configurations are centralized here
- functions: some useful php functions
- layout-elements: the elements used by the Layout class are stored there.
- log: possibly contains the php error log for this application (depending on your config)
- pages: contains the pages of the application (which are defined by the basic router mechanism hardcoded in index.php)
- www: directory served by the web server
- init.php: defines the configuration constants for the project 








Top down
==============

In complement to abstract concept definitions, this section tracks the php process from top to bottom,
as to give an idea to the reader on what's really going on.


1. Redirect all traffic to index.php
--------------------------------------

So, the page is refreshed, and the app/www/index.php script is called.

We use the web server settings to redirect all the traffic on the index.php.

There is an .htaccess for apache in the www directory.
In nginx, you would do something like this:

```nginx
 server {
    listen 80; 
    server_name nullos-admin;
	index index.php index.html;

    root "/pathto/php/projects/nullos-admin/app/www";

    try_files $uri $uri/ /index.php?$query_string;
    
	location ~ \.php {
	    include fastcgi_params;
	    include fastcgi.conf;
	    fastcgi_pass 127.0.0.1:9000;
	}
 }

```


The index.php file includes the app/init.php file, which initializes the app.

I don't want to bother you with the init.php details, so let's continue for now. 



2. The router
------------------

The index.php file contains the router mechanism, which is basically a simple map from an url
to a file path located in the app/pages directory.

The app/pages/404.php file is called if the uri doesn't match any route.

It's important (design wise) to understand that the each php file in located in the app/pages
directory will recreate the whole html page every time.

I chose to do so in order to have the flexibility to drastically change the design of a page,
if I ever chose to do so.


Let's say the requested uri was **/**.
Then the router will see that the / uri is mapped to a file named home.php,
and so it will call the app/pages/home.php script.

So, what do we have in app/pages/home.php?



3. The Layout 
------------------

So now we are inside a page (a php file located in the **app/pages** directory),
and therefore we need to generate the html page.


Rather than writing the html code here, I made an important decision of using the concept of **layout**.

The layout is just what you think it is: it's the basic structure of the page.

For instance in a phpMyAdmin, we have a left page containing all the tables, and on the right
pane we have the main content of the page.

The goal of the layout is ultimately that you can reuse it on different pages, thus saving some time writing the same 
html again and again.


I figured two things:

- different layouts use different **elements** (more on that later)
- in an admin, we don't need a lot of different layouts (and generally one is enough)



So I started to create the layout of nullos admin.

Basically, I had a left pane, and a right pane, and only the right pane would change from page to page.

So it was clear that I could use a layout with one right pane **element**.
 
By **element**, I mean an html part of the page that the developer can change if she wants to (i.e. not a hardcoded static part).

I decided to call my only element **body**.
 

In terms of design, using layouts and elements gives us a lot of flexibility as to write an html page.


In terms of code, the code in **app/pages/home.php** looks like this:

```php
<?php


Layout::create()->setElementFiles([
    'body' => "home.php",
])->display();


```

So as you can see there is a Layout class (app/class/Layout.php) responsible for 
creating **one** layout (we need to create one class per layout, but in nullos admin we only have one layout :).
 
 
The developer defines which elements to use via the **setElementFiles** method.
 
As one can guess from the name, this method uses files to store the **elements**.
I chose to do so because files are easy to (re-)organize (easy to create, rename, copy, move). 
 

So the code above defines an **element** called **body** and maps it to the filename **home.php**.

All the **elements** are stored in the **app/layout-elements** directory, 
so home.php is actually mapped to **app/layout-elements/home.php**.


When the Layout class' display method is called, it starts to print out the html code, starting with the doctype,
then the html head, then the left pane, ...

At some point, it encounters the location where we want to place the body (right pane), and so it 
calls the **app/layout-elements/home.php** file, before resuming the printing of the html end (closing the body and html tags, print the javascript that make the panes resizable...). 



In nullos admin, I only needed one layout, so I could reuse it on all the pages.




4. Elements
----------------

So now, the process has travelled down from the Layout class to the element called **body** (app/layout-elements/body.php),
and the job here is to display the html of the body corresponding to the right pane in nullos admin.

Actually, the content of **app/layout-elements/body.php** is the following (as of today):

```html
<div class="freepage">
    <p>
        Welcome to nullos admin
    </p>
</div>
````


That's basically it.




Files called summary
-----------------------

- http://my_website.com/
- app/www/index.php (/ maps to home.php in **app/pages** directory)
- app/pages/home.php (calls the Layout object, and maps the **body** **element** to home.php in **app/layout-elements**)
- app/class/Layout.php 
    - starts displaying the html doctype, html head and html body, then displays the left pane, then encounters the **body** **element** (in **app/layout-elements**) 
- app/layout-elements/home.php (displays the html of the **body** element)


    




Datatables
=============

crud

TODO....


