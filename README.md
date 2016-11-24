Nullos Admin
================

A php admin script to interact with a front end.


This is a work in progress... (the development version)



[![Screen Shot 2016-11-21 at 23.45.32.png](https://s13.postimg.org/7rmsaid5z/Screen_Shot_2016_11_21_at_23_45_32.png)](https://postimg.org/image/6pclryucj/)

[![form-default.png](https://s14.postimg.org/3uudy6dm9/form_default.png)](https://postimg.org/image/t0vc50ewd/)



Table of contents
--------------------

TODO

- Privileges
- Crud Generator




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

This is where nullos admin differs from phpMyAdmin: you create the query manually (there is no automatic tool yet).

The benefit of this is that for instance you can decide how you format the foreign key columns.
In phpMyAdmin, a foreign key would be displayed as a link contaning the number of the id representing 
the foreign key's related row.

That's nice if you are a developer, but this might scare your client.

Nullos admin let you change those numbers into more meaningful values, see the example below.




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




Let me share another nice transformer trick that I discovered today (2016-11-22).
Imagine you have the following schema:

- users
    - id
    - email
    - country_id
    
- country
    - id
    - name
    
    
So what if you want that the users datatable displays the email, and the name of the country?

You would do something like this:

```php
$fields = '
u.id,
u.email,
c.name as country_name
';

$query = "select
%s
from users u
inner join country c on c.id=u.country_id
";

$table = new DataTable();

$table->hiddenColumns = [
    'id', // hide the id from the view because it will scare the client
];

//...
```

That's a nice start. Notice that you have to include the id column anyway because it's the primary key and it's required
for row actions like edit and delete.

But now, let's say you want to click on the country name and it should redirect you to the page where you have the 
form to edit that country row. 

The only problem we have here is that we need the country id in order to create the link, but unfortunately, we've just replaced
the country id by the country name in order to make the datatable look better. So, what do we do now?

The solution sounds complicated, but it's actually very fast to implement.

The idea is to put the country id in the request, so that it's part of the row, and then use a transformer to 
upgrade the country name to a link. The last step is to hide the country id from the view.

Here is the code:

```php
```php
$fields = '
u.id,
u.email,
c.name as country_name,
c.id as country_id
';

$query = "select
%s
from users u
inner join country c on c.id=u.country_id
";

$table = new DataTable();

$table->hiddenColumns = [
    'id', // hide the id from the view because it will scare the client
    'country_id', 
];

$table->setTransformer('country_name', function ($v, array $item) {
    return '<a href="/table?name=country&action=edit&ric=' . $item['country_id'] . '">' . $v . '</a>';
});


//...





```
```





    
    
    





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
- confirm: bool, whether or not to display a js confirmation dialog before actually executing the multiple action



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



#### confirmlink

confirmlink is a css class that you can add on any element inside the datatable, usually an single action link.

Then when such an element is clicked, DataTables intercepts the click and displays a javascript confirmation dialog before
either executing the action, or cancelling the action.

This is useful for the cases where the action has critical effects, such as deleting a row in the database.

The delete single action provided by DataTable uses this mechanism. 




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






Form
=============

Form is another big part of nullos admin.
It's the complementary part of the list (datatable) in the crud system.



Here is an example of how a configured form looks like in terms of code:

```php
<?php

// app/layout-elements/table/edit.php (but will be relocated soon...)



$form = new Form('concours', ['id']);



$form->controlErrorLocation = 'top';
$form->allowMultipleErrorsPerControl = true;


$form->insertDefaults = [
    'date_debut' => '2014-06-05 14:05:00',
];

$form->labels = [
    'equipe_id' => 'equipe',
    'url_photo' => 'photo url',
    'url_video' => 'video url',
    'date_debut' => 'starts at',
    'date_fin' => 'ends at',
    'reglement' => 'règlement',
];



$form->addControl('equipe_id')->type("selectByRequest", "select id, nom from equipe");
$form->addControl('titre')->type("text")
    ->addConstraint("required")
    ->addConstraint("minChar", 5)
;
$form->addControl('url_photo')->type("text");
$form->addControl('url_video')->type("text");
$form->addControl('date_debut')->type("date6");
$form->addControl('date_fin')->type("date6");
$form->addControl('lots')->type("message");
$form->addControl('reglement')->type("message");
$form->addControl('description')->type("message");


$form->display();
```




Let's see how it works.

First of all, the whole goal of this file is to generate an html form.

The Form object helps you generate an html form that interacts with the database.

A Form object can operate in two different modes: 

- update: to update an existing row in the database
- insert: to create a new row in the database

I don't want to bother you with technical details, but basically it automatically detects which mode to use,
so you don't have to worry about it.







In the above example, we first instantiate the Form object, passing two arguments:

- table: the name of the table which will be interacted with when the form is successfully submitted 
- ric: an array containing the name of the column(s) involved in the primary key (see ric definition in this document for more details) 



Then, we have a few configuration lines, but I will skip them for now; I will talk about them later, but now I want to
talk about the control section (the lines which call the addControl method).


What's a control?

Visually, a control is composed of the ensemble of the label, the "widget" (through which the user passes data to the application),
and the eventual error messages related to it.
If a hint feature were implemented, it would also be part of the control.

In terms of code, the Form uses FormControl objects, each FormControl is a control, and is attached to the Form object via the addControl method.
 
 
In terms of design, I decided that if a FormControl is not registered, it cannot be faked by creating a key in $_POST.

In other words, attaching (or not attaching) a FormControl to the Form is a basic security mechanism in itself.

You'll notice that the above code doesn't declare the FormControl related to the id key, but I can assure you that the table
I used in the example had an id auto-incremented primary key.

I could have add this statement:

```php
$form->addControl('id')->type("text");
```

And then the user would have been able to decide/change her id if she wanted to.

In general, I believe we don't want the user to be able to change the id:
  
- if the form is an insert form, the auto-incremented will be automatically incremented
- if the form is an update form, the id should keep remain the same (especially if the website has users accounts)
  
But in the end, that's for the nullos developer to decide, the point is that the Form would allow you to do what you want.


Back to the example, the addControl method creates a FormControl, registers it to the Form object and returns the created FormControl.

The main method of a FormControl is type, which define the form of the control.
The type method takes the type identifier as its first argument, and some other arguments, depending on the type.



FormControl Types
------------

The following types are available:

- text: creates a basic 'input type=text'
- selectByRequest: creates a select and feeds it with the values of a table from the database.
                This is the right choice when you need to implement a control that represents a foreign key.
                It accepts the following arguments: 
                        - query
                        - markers
                Those arguments are passed as is to the QuickPdo::fetchAll method (for those who know QuickPdo).
                The query should select two columns.
                The first column will be injected into the 'value' attribute of the every html select options, 
                and the second column will be the text content of those options.
                Note: concat is your friend if you want to have full control on the formatting of the options's content
                
                 
- date6: used to create a date time. It displays 6 html select tags: year, month, day, hours, minutes and seconds.
- message: proxy to the html's textarea control




Validation
----------------
It is possible to add validation constraints to a FormControl.

This is done using the addConstraint method, which first argument is the name of the rule, and the rest of the arguments
represent the so-called ruleArgs.

Here is the conception map I used to create the Validation system.
 

### Validation System

- rule
    - ruleName
    - ruleArgs
    
    
There is a subject.

The subject is tested against a rule.
    
The executed test is either a success or a failure.
 
In case of success, the test returns true.
 
In case of failure, the test returns an error message indicating the cause of the failure.

The error message is either passed via a string or an array.

If the error message contains tags (minChar, ...), then the error message is an array containing
the following:

- symbolic error message (for instance: this field must contain at least {minChar} characters)
- tags, an array of tag => value (for instance: [minChar => 5]) 
 









insertDefaults
---------------------

The insertDefaults property let you define which are the default values when the form is operating
in insert mode (if the form is operating in update mode, then the default values come from the
database).

Note that default values are replaced by the $_POST values when the form is submitted.









title
-------------

This property defines the title displayed at the top of the form.

If it's null, no title will be display.

By default, it's the table name followed by the word form.



labels
-------------

This property allows you to control the content of the form labels,
by replacing the default ugly column names into more human readable labels.

For instance, you can replace creation_date by date.

It's an array of column name => label


Note that this is redundant with the label method of the FormControl.


Actually, I prefer to set all the label at once, but I keep the label method on the FormControl too for now,
because I'm not sure (it makes sense semantically to have label on the form control, but it's less convenient
than defining all the labels at once, so maybe both solutions in parallel is good?)...



controlErrorLocation
------------------------

This property defines the location of the control related errors (invalid email for instance).

It accepts two values:

- local (default), will display the error next to the control it is related to
- top, all the control errors will be displayed at the top of the form 


[![form-messages-on-control.png](https://s14.postimg.org/e66qqu5bl/form_messages_on_control.png)](https://postimg.org/image/6dg2yuzcd/)


[![form-messages-on-top.png](https://s14.postimg.org/yrq3whca9/form_messages_on_top.png)](https://postimg.org/image/waecp7sdp/)



allowMultipleErrorsPerControl
------------------------

When you have multiple error messages per control, it can be overwhelming for the user.

Maybe you prefer the policy of displaying only one error message per control.

If so, you can set the allowMultipleErrorsPerControl property to false (default is true).





Form Design
----------------

Note: this section might be redundant with what have been said earlier.

The form uses form controls.

Form controls represent the columns that will be updated/inserted.
In other words, a column in the database is not updated unless it has a corresponding form control.
 

 
The form control holds the value of the control.
This let the developer provides default values if she wants to.

The sum of all form control values is called the form values.

When the form is submitted, the values posted by the user replace the default values.

The form is the object responsible for injecting the values into the form controls.

The case where the developer manually injects the values using the FormControl's value method is rare.

In practice, the default values come directly from the database and are injected by the Form object.


### Handling of errors

So what happens when an error occurs?

There are differents types of errors:

- errors that are related to a control, like email validation error for instance
- errors that are related to the form, for instance: "the row couldn't be updated, there is a problem with the database"


For displaying control related errors, the most common patterns are either:
 
- to dipslay the error next to the control it is related to
- to display all control related errors at the top of the form 

In terms of design, control errors belong to the FormControl objects, 
and they can be hydrated? to the top form panel if necessary.

This behaviour is defined by the controlErrorLocation property.


Every FormControl object has an addErrorMessage method and a getErrorMessages method (i.e. FormControl
can have multiple error messages).


Validation rules related to a control are declared at the FormControl object level but processed by
an external validator system, triggered by the Form object when the form is submitted.





Javascript
---------------

Some fancy FormControls will inevitably use javascript in order to display a cool widget.

The Form object's display method provides some basic javascript that FormControls can use for their own.

A common pattern for such widgets is to update a hidden input upon the form submission.
 
For instance, imagine a fancy js file browser. Okay it's fancy but in the end it just generates 
an url (that's ridiculous).

The date6 FormControl also uses this technique: rather to overwhelm the $_POST array with a year, month,
day, hour, minute and second entry, it just waits when the form is submitted and generate only one appropriate $_POST entry
for the whole control.

(By the way, quick reminder: not using the name attribute in html suffices to not create a key in the $_POST array when the form is submitted)

So if you are implementing that kind of widget, Form has a surprise for you: it provides the onSubmitCallbacks array.

Basically, the Form generates this line at some point, and before your FormControls are called:

```js
window.onSubmitCallbacks = [];
```

Okay, so, what you can do is register a callback to this array.

If you do so, your callback will be called just before the form is submitted (that is: when the user clicks the submit button,
but the form values have not been sent yet).

To ensure that the work in your callback has been executed, you need to call the done function provided as the first and only
argument of your callback.

So here is fictitious example of me creating a callback that has no purpose in life:
 
```js
 window.onSubmitCallbacks.push(function(done){
    console.log("I'm so useless");
    // ... or you could update the value of a hidden input ... 
    done();
 });
``` 














Log
==========
TODO:...
Logger



Multi-Language
==================


Nullos is designed to be multi-language friendly.

The dictionary containing all the terms is organized into contexts.

Nullos has the following contexts:

- datatable: contains all the terms related to the datatable object (the list)
- form: contains all the terms used by the Form object 
- form-validation: contains all the terms used by the FormValidator object 
- default: all the terms that don't belong to another context 


Those files are located in the dictionary directory, which by default is **app/lang/en** for english,
**app/lang/fr** for french, and so on...

The actual path of the dictionary directory is defined in **app/init.php** by 
the **APP_DICTIONARY_PATH** constant (should you wish to change its location).

Each file in the dictionary directory is called a translation file, and it's a simple php file that defines an array
containing the definitions of the terms for a given context.

Here is how a translation file looks like:

```php
<?php


$defs=[
    'home' => 'accueil',
    'Oops, there is an error' => 'Oops, il y a une erreur',
    'You have {number} new messages' => 'Vous avez {number} nouveaux messages',
];
```

As you can see, the basic mechanism is a simple map.

In the above example, the third term uses a tag.
 
I will assume that you know  what and why it is there.


Now the last thing you need to know is how to actually use a translated string in your app.

Nullos provide two functions:

- __ (double undercore)
- ___ (triple undercore)


The double underscore function takes the following arguments:

- identifier: the term to translate. 
- context=default: the name of the context to look inside of
- tags=[]: an array of tag => value (don't put curly brace around the tag, this is done for you) 


The triple underscore function is identical, but it also call the php's htmlspecialchars function 
before returning the result. Therefore it's useful if you ever need to write inside of html attributes.



Note that I used the term identifier as the first argument of the __ function.

That's because you are not forced to put the whole string as is as the identifier.

Imagine you have a very long text you want to store. It will be inefficient memory wise (I believe, did not test) to 
store this big chunk of text in an array; so instead you can choose a meaningful identifier as the key if you want to.
 
 
And don't worry, the nullos design supports you in doing this, because the __ function is very peaky about its job, 
and whenever an identifier is not found, it will crash the website and throwing an in your face exception.


Personal opinion: 
That's the way I like it with errors in general, because it allows developers to not worry about handling developer errors
(huge time saver in development), and if something is wrong, that's only because it has to be fixed anyway.


So in other words, you can safely use short identifiers without risking to have a part of your website that displays 
just the identifier instead of the translation (it will either display the right translation, or crash).












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