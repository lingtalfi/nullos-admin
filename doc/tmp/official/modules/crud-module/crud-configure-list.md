Crud: Configure a list
============================
2016-11-28



The Crud module provides the Datatable object, which is responsible for displaying a list (like the one in the screenshot below).
 
 
[![concours-list.png](https://s19.postimg.org/7xay6gr8j/concours_list.png)](https://postimg.org/image/mt9he22n3/) 
 
 


So the big question is: what can we customize?


Let's first have a closest look at a list.

A list is a table with columns and rows, surrounded by widgets.

The figure below shows the widgets surrounding the table.

[![crud-list-widgets.jpg](https://s19.postimg.org/ip8ilk6oz/crud_list_widgets.jpg)](https://postimg.org/image/hzpq9765b/)

The widgets are:

- title
- page selector
- search 
- new item link
- nipp selector (number of items per page selector)
- pagination
- multiple actions


And below is a figure representing the table alone, without the widgets.



[![crud-list-anatomy.jpg](https://s19.postimg.org/8dw5swezn/crud_list_anatomy.jpg)](https://postimg.org/image/6m36xzvmn/)


The table is composed of two parts stacked on top of each other:

- the column headers
- the list body (aka rows)


If we read the list from left to right, we have the following columns disposition:

- the checkboxes column
- the list columns (containing the fields from the database)
- the action columns (containing the "Edit" and "Delete" links)



Ok. Time for some configuration.


I figured a tutorial would be more useful than a boring technical documentation.
So I moved the rest of this page to the  <-Customizing list in nullos admin tutorial->



Open any **list crud file** (discussed in <-crud page->) and warm up your fingers.

For the rest of this section I will be using the **app-nullos/crud/auto-list/oui.videos.php** file from the [getting started with nullos tutorial](https://github.com/lingtalfi/nullos-admin/blob/master/doc/tutorials/getting-started-with-nullos.md).



 




- show/hide a widget
    - customize the title 
- move the actions columns to the left or to the right
- rewrite the column labels
- hide columns
- hide the checkboxes
- transform the value of a column
- add your own single actions
- add your own multiple actions
- ...?




Show/Hide a widget
---------------------

Let's start with the widgets.









Tackle the list
------------

IDEA...Configure the list: perhaps the most important part of configuring the list
is the sql query. The sql query is split in two parts:
 
 - fields
 - query
 END IDEA...
 



To display a list, you first need to define which sql request you are going to use.
You can choose any view (sql query) you want.

  
Follow this recipe:

- first write your sql query, without the "order by" and "limit" clauses, but with all the aliases and inner joins that you need
- extract the columns and put them in the $fields variable
- put the remaining body of the sql query (without the columns) into the $query variable
- identify the ric for your table


Once you've done that, you can call the printTable method.


Example
-----------

I want to display some fields from the oui.videos table.
So I first write my sql query, here is what I came up with:

```sql
select
    v.id,
    v.active,
    v.users_id,
    u.email as users_email,
    v.concours_id,
    c.titre as concours_titre,
    v.titre,
    v.url,
    v.url_photo,
    v.nb_likes,
    v.nb_vues,
    v.date_creation
from oui.videos v
inner join oui.concours c on c.id=v.concours_id
inner join oui.users u on u.id=v.users_id
```

(here is the <-oui.schema->)

Now, I can use the Datatable object like this:

```php
<?php

use Crud\DataTable;


//
$fields = '
v.id,
v.active,
v.users_id,
u.email as users_email,
v.concours_id,
c.titre as concours_titre,
v.titre,
v.url,
v.url_photo,
v.nb_likes,
v.nb_vues,
v.date_creation
';


$query = "select
%s
from oui.videos v
inner join oui.concours c on c.id=v.concours_id
inner join oui.users u on u.id=v.users_id
";



$table = new DataTable();
$ric = ['id'];
$table->printTable('oui.videos', $query, $fields, $ric);

```


So if I <-create a page-> and put the above code in it, it would display the list of the videos from my oui database.



Advanced configuration
-------------------------

Now we know what the Datatable object is.
 
Between the moment where it is instantiated and the moment when the printTable method is called, we can configure the DataTable instance.


Below is an exhaustive list of the things that we can do.

The following figure represents the anatomy of a list, it might be referenced in the next of this document.

crud-list-anatomy.png


- change the title
- set the position of the actions columns (right or left)
- rewrite the column labels
- hide columns
- transform columns
- change the default values
    - ...







TODO




