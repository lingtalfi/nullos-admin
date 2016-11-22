Nullos Admin
================

A php admin script to interact with a front end.


This is a work in progress... (the development version)



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

An important part of nullos admin is how it handles the crud.

In this section, I try to explain the choices I made when designing the "datatables system". 


The code for the table starts in **app/layout-elements/table.php**, which is responsible for generating the html
for the **body** element of the main layout.

This element script listen for a $_GET variable called action, and delegates the processing to one of the following scripts,
depending on the value of $_GET[action]:

- list: display the list of the rows of a specific table in the database
- form (not implemented yet): display the form for inserting/updating a row in the database

Those scripts are located in the **app/layout-elements/table** directory.


List: the DataTable object
-------------

The code responsible for displaying the html of the list is in **app/layout-elements/table/list.php**.

In there the table is printed using an object named DataTable.


The DataTable object is relatively complex and so it's treated in its own section later in this page.



Form
------------------
Not implemented yet






DataTable
================

To work with the Datatable, you first create an instance of it, then you configure it,
and finally you call the printTable method.


Instantiation
---------------
The instantiation is trivial:

```php
$table = new DataTable();
```


Configuration
----------------

There are many aspects of the list that we can configure with an instance of DataTable.

- view
- title
- search columns
- column headers
- hidden columns
- transformers
- widgets
- mutiple actions
- single actions
- default values
    - number of items per page
    - sort column
    - sort column direction    
    - $_GET keys to listen to     


### View

The most important customization is the view.

The view is the sql query used to generate the table.

This is where nullos admin differs from phpMyAdmin: you create the query manually (it's not automatic yet).

A view is split in two elements:

- fields
- query

For instance:

```php

$fields = '
v.id,
v.active,
u.pseudo as user_pseudo, 
c.titre as concours_titre,
v.url,
v.nb_vues,
v.nb_likes,
v.date_creation
';

$query = "select
%s
from videos v
inner join users u on u.id=v.users_id
inner join concours c on c.id=v.concours_id
";

```

If you wonder why we have to split it like this, it's because of the pagination system, which needs
to know the number of items, so there will be two queries performed, one with the fields, and one
with a count(*) expression.


The fields part will tell DataTable which columns to display.

By default, DataTable will display all of them, but that's configurable with other properties as you'll soon see.

Your request should at least contain the **ric** fields (see the ric paragraph in nomenclature section).

Even if you decide to hide them from the view, they must be present in the request, because they have
the functional purpose of identifying the target row(s) in actions such as edit and delete.


The query part is the rest of the query. It uses the %s symbol as a placeholder for the select expression (the 
php sprintf function is used). 


Don't bother with the order by and limit clauses, they are added automatically by DataTable.

However, should you have a where clause, you need to specify it in your query.

For instance:

```php
$query = "select
%s
from users
where active=1
";

```



So, lot of the nullos admin power comes from this flexibility that you have crafting your own sql requests.




### Title

To display a title on top of the html table, use the following

```php
$table->title = "List of users";
```


### Search columns

DataTable by default displays a widget called search, which allows the user to type an expression and click
the submit button.

This will update the sql request so that only the rows containing the expression will appear.

By default, DataTable will search in all the columns that you specified with the fields variable (defined in the view section).
 
 
However, you can optimize the search by specifying which columns are searched.

You do this with the searchColumns property, like so:


```php
$table->searchColumns = ['v.url', 'c.titre'];
```

Note that the columns that you specify via searchColumns are passed to the sql where clause,
and therefore you have to use the **concrete notation** (cannot use the column aliases, see the columns disambiguation in the
nomenclature section).


This means that if your fields look like this:


```php
$fields = '
v.id,
v.active,
u.pseudo as user_pseudo, 
c.titre as concours_titre,
v.url,
v.nb_vues,
v.nb_likes,
v.date_creation
';
```

Then you have to use u.pseudo, and user_pseudo will not work.


### Columns headers


Being able to customize the table like you want is one of the main goal of nullos admin.

So imagine you have a column named creation_date. You know that it's the right name for you column,
but it can scare your client, because she will see the underscore in the middle of the word and she won't understand why it's there,
and she will understand that she is missing some parts of the picture, and she will start freaking out...

There is a simple fix to this: rename creation_date to creation date (two words).

You can use the columnHeaders property to do so, like that:

```php
$table->columnHeaders = [
    'user_pseudo' => 'pseudo',
    'concours_titre' => 'concours',
    'nb_vues' => 'nb vues',
    'nb_likes' => 'nb likes',
    'date_creation' => 'creation date',
];
```

Note: the keys use the column symbolic notation



### Hidden columns


Again, the main goal of nullos admin is to have complete control on how a table looks like.

So imagine your client sees a column named id.

"What the heck is that", she might think.


Don't scare her with fancy column names, just remove those columns...

But wait, if you remove the id column, you won't be able to target the row, so you won't be able to edit the row,
delete the row..., so hide the column with **style="display none"** and that should be fine.
 
There is a hiddenColumns property for that:

```php
$table->hiddenColumns = [
    'id',
    'user_pseudo',
];
```


Note: the values use the column symbolic notation





### Transformers


One thing you can do is polish the content of the columns.

A common optimization is the one that transform an url into an actual html link (or image).

Another use of this is to transform a scary 0|1 boolean into a visual switch.


 
To transform a column, you can use the setTransformer method, like so:

```php
$table->setTransformer('url', function($v){
    return '<a target="_blank" href="'. htmlspecialchars($v) .'">'. $v .'</a>';
});
```

The setTransformer accepts two arguments:

- column: the colmun name (symbolic) to apply the callback to  
- callback: the callback used to transform the content of the column.
        The callback takes two arguments: the original column value and an associative array representing the row 




### Widgets


By default, DataTable will display not only the table, but also some widgets that help interact with it:

- pageSelector: a selector (html select) used to navigate to a specific page 
- search: a search module to filter the rows
- nippSelector: a selector to choose the number of items to display per page 
- pagination: a list of the available page links  
- multipleActions: the multiple actions at the bottom of the table  


If you don't want to use some widgets, you can hide them from the view with the customizeWidget method:

```php
$table->customizeWidget('search', false);
```

The first argument is the identifier of the widget, and the second argument defines if it's visible or not (boolean).



Note that there is also a "sort" widget, but you cannot disable it: when you click on the column header,
it toggles the rows sorting between ascendant and descendant for this particular column. 



### Multiple actions


At the bottom of the table, there is a toolbar containing a multiple actions selector.

With this selector, the user can perform an action on every selected rows (rows are selected by checking the
check box on the left of the row).

Such actions are called multiple actions because they apply on multiple rows.

As for now, there is only one multiple actions named deleteAll, which deletes every selected rows.


However, you can add your own multiple actions.

In order to do so, you will write something like this:


```php
$table->registerMultipleAction('logAll', 'Log All', function($table, array $rics){
    foreach($rics as $ric){
        // do your things here.
        a($ric);
    }
});
```

The code above will display something like this:

```txt
array(1) {
  ["id"] => string(3) "196"
}

array(1) {
  ["id"] => string(3) "195"
}
```


From a more abstract point of view, the registerMultipleAction method accept three arguments:

- id: the identifier of the multiple action (used internally to trigger the multiple action when appropriate)
- label: displayed in the selector
- callback: what to do with the selected rows. Each row is passed in the form of a ric array.



### Single actions


Single actions are actions related to a single row.
 
Datatables display the single actions at the end of a row.
 
By default, there are two single actions:

- edit
- delete


You can define your own actions using the registerSingleAction method, like so:

```php
$table->registerSingleAction('simple_link', '<a href="/another/page?table={tableName}&ric={ric}">Hello</a>');
```

The above code will simply print a link at the end of each row.

You might have noticed that the link contains tags ({tableName} and {ric}).

Tags are converted automatically by DataTable.

The following tags are available:

- {tableName}: the name of the table
- {ric}: the values of the ric, separated by a so-called ricSeparator (--*-- by default)


With this kind of link and little bit of javascript magic, you can pretty much do anything you want.



#### Postlink

However, there is another mechanism that you can use to craft your single actions.

This mechanism is called postLink and allows you to handle the action with php, directly 
from your code.

Basically, when you click the link, it creates a form with:

- action: the_id_of_your_action
- ric: the ric of the row, so that you can target it in php

and submits it.

When the form is submitted, it handles the $_POST[action] key and passes it back to a php callback that you provide.  

The default delete single action uses this mechanism.

Here is an example code that would simply display the ric when the "Click me" link is clicked:

```php
$table->registerSingleAction('ric_link', '<a class="postlink" data-action="ric_link" data-ric="{ric}" href="#">Click me</a>', function($table, array $ric){
    a("table: $table, ric: " . implode(', ', $ric));
});
// string(23) "table: videos, ric: 195"
```

The registerSingleAction method accept three arguments:

- id: the identifier of the single action (used internally to trigger the single action)
- html: the html displayed in the column (tags are replaced first)
- ?callback: A callback to execute.
                The callback is only executed if there is an action in the $_POST array with the value of the id (identifier).
                This callback accepts two arguments: table and ric.
                        - table is the name of the table on which to apply the single action
                        - ric is an array containing the values of the ric for the chosen row
                



To create a postlink, you need to add the following attributes to your link:
 
- class=postlink
- data-ric={ric}
- data-action=(the action identifier to execute when the link is clicked upon)


Any link with those attributes is automatically upgraded to a postlink by DataTable (via js).






### Default values

In addition to the properties discussed above, there are other default values that you can override.

They are organized in two categories:

- widgets customization
- $_POST customization


Widget customization contains the following keys:
- nbItemsPerPage: int|all, default=50, how many items per page by default (can be overridden with the gui) 
- sortColumn: string|null, default=null, which column (symbolic form) to use for the sort, null means none 
- sortColumnDir: string(asc|desc)|null, default=null, which sort direction to start with
- nbItemsPerPageList: array, default=[5, 10, 25, 50, 100, 250, 'all'], defines the possible values that the user can select from


$_POST customization contains the keys passed via $_POST:
- tableGetKey: default=name, refers to the table name
- pageGetKey: default=page, refers to the number of the current page
- nbItemsPerPageGetKey: default=nipp, refers to the number of items per page
- sortColumnGetKey: default=sort, refers to the sort column
- sortColumnDirGetKey: default=dir, refers to the sort column direction
- searchGetKey: default=search, refers to the search expression passed to the search widget









Call the printTable method
----------------

Once you've configured the DataTable instance the way you like, the last step is to display the table.
 
This is done by calling the printTable method.

It will print the table, according to your configuration.

printTable has the following arguments

- table: string, name of the table to interact with
- query: string, the query (as defined in the view section)
- fields: string, the fields (as defined in the view section)
- ric: array which values are the ric column names












Nomenclature
================

Ric
--------

Ric: (array of) row identifying columns.

Imagine you have a table named users with the following structure:

- users
    - id: auto-incremented key
    - email: varchar(64)
    - pseudo: varchar(64)
    
    
In this case, the id column is the one that identifies any row in a unique manner.
So the ric would be [id].


Now imagine you have another table named users_has_phones with the following structure:

- users_has_phones
    - users_id: foreign key 
    - phones_id: foreign key
     
     
In this case, we need both the users_id and the phones_id to identify a row.
So the ric would be [users_id, phones_id].
     

In other words (and I've just discovered it), the ric is nothing more 
than the so-called [primary key](https://www.tutorialspoint.com/sql/sql-primary-key.htm) in sql.
     
     
But, sometimes the term ric is used to actually means the keys ([users_id, phones_id]), and sometimes
it means the key and concrete values [users_id => 6, phones_id => 40], depending on the context, so be careful
with that.
     



Columns: symbolic name and concrete name 
-------------------

When we use the DataTable class to create a list, we manipulate columns.

However, the notation of a column depends on what part of the configuration 
we want to modify.

For instance, the searchColumns property expects the concrete notation,
whereas other properties like columnHeaders use the symbolic notation.


The concrete notation and symbolic notation are terms that I made up with the hope
of bringing some light to this otherwise dark subject.

But what do they stand for exactly?


Remember this configuration excerpt?

```php
$fields = '
v.id,
v.active,
u.pseudo as user_pseudo, 
c.titre as concours_titre,
v.url,
v.nb_vues,
v.nb_likes,
v.date_creation
';
```

There are two cases:

- if there is an **as** keyword in the column definition, then
    the concrete notation refers to the left part, and
    the symbolic notation to the right part.
    
- if there is no **as** keyword in the column definition, then
    the concrete notation refers to the column definition including the dot prefix,
    and the symbolic notation refers to the column definition NOT including the dot prefix
    
 
Let's see how those rules apply to the example above:
 
 
Column definition        |     concrete notation         | symbolic notation
-------------------------------     |   -----------------------     | ----------------------- 
v.id                                |   v.id                        |  id 
v.active                            |   v.active                    |  active 
u.pseudo as user_pseudo             |   u.pseudo                    |  user_pseudo 
c.titre as concours_titre           |   c.titre                     |  concours_titre 
v.url                               |   v.url                       |  url 
v.vues                              |   v.vues                      |  nb_vues 
v.likes                             |   v.likes                     |  nb_likes 
v.creation                          |   v.creation                  |  date_creation 
 
 
 
Note: the column alias notation is used almost everywhere. The only
place where the concrete notation is used is with the search module.