Configure a list
====================
2016-11-30



Nullos admin's power lies in the ability to let you configure the lists how you want.

There are a lot of options, which are all discussed in this page.

This long page is meant to be read in a linear way, as the examples shown are built on top of the previous ones.


The configuration of a list is done by opening and editing a list <-crud file->.




[TOC]







Preparation
===============

In the examples below, I will be using the "oui" database.

Instructions on how to install the "oui" database are found in the <-Install the "oui" database tutorial->.

I will also generate some basic **crud files** using the <-Crud Generators->.

Then, I will create a **app-nullos/crud/list/oui.concours.php** file and work all my examples from there (unless otherwise specified).



First step: choose your view with the Fields and the Query
===============================

Let's start with a minimal example:
 
```php
<?php


use Crud\CrudModule;

$fields = '
id,
equipe_id,
titre,
url_video,
lots
';


$query = "select
%s
from oui.concours 
";


$table = CrudModule::getDataTable();
$table->printTable('oui.concours', $query, $fields, ['id']);

```

The code above is a minimalist **list crud file**.

As you can see, we are basically getting an instance of a DataTable object, and then call the **printTable** method.
 
The **printTable** method has four arguments:
 
- the table name 
- the query 
- the fields
- the ric


The table name and the <-ric->) are constant for a given table (in this case oui.concours)

What's more interesting here is the variable parts: the query and the fields.

Notice that if you inject the fields in the query (in the place of the %s symbol), you obtain a valid sql query.

In fact, when you create a list, you always need to create a sql query first, and then split it into
the fields and query parts.


Choosing the columns from the "fields" gives us flexibility in the display of the list.

For instance, the example above would give a list with five data columns (see screenshot below).


<!-oui-concours-five-fields->


I could use aliases if I wanted to change names, like in the following example:


```php
<?php


use Crud\CrudModule;

$fields = '
id,
equipe_id as equipe,
titre,
url_video as video,
lots
';


$query = "select
%s
from oui.concours 
";


$table = CrudModule::getDataTable();

$table->printTable('oui.concours', $query, $fields, ['id']);

```

The above example would give me the following screenshot.


<!-oui-concours-five-fields-alias->


I can also make a more complex query involving inner join(s), like so:


```php
<?php


use Crud\CrudModule;

$fields = '
c.id,
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->printTable('oui.concours', $query, $fields, ['id']);

```



The above example would give the following screenshot.


<!-oui-concours-five-fields-alias-joins->



In fact, you can use most of the sql language power to shape your list how you want.

There is only rule: don't add the "order by" and "limit" clauses because they are automatically added
by the DataTable object as the user interacts with the list widgets (more on widgets later).
 
 

Now we have a base list, and we are half way there, but there is a lot more that can be customized.

In the following sections, I'll progressively add features to the example code above which will serve as the
code base for the subsequent examples.
 
 
 
 
Add a title
----------------
To add a title, use the title public property of the DataTable object, like so:


```php
<?php


use Crud\CrudModule;

$fields = '
c.id,
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours"; // <----(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

Now we have a title at the top of our list (see screenshot below).


<!-oui-concours-title->
 
 
 
Move the "action" columns to the left with 
----------------

You can move the action columns (edit, delete) to the left if you want, using the actionColumnsPosition property,
like so:


```php
<?php


use Crud\CrudModule;

$fields = '
c.id,
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left"; // <----(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

Now our edit and delete default actions are on the left (see screenshot below).



<!-oui-concours-actions-left->





Change the column labels 
----------------

To change the column labels, use the columnHeaders array, which keys are the name of the column to change,
and the values are the new labels. Like so:


```php
<?php


use Crud\CrudModule;

$fields = '
c.id,
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [ // <----(here)
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];


$table->printTable('oui.concours', $query, $fields, ['id']);

```

With this technique, we can get rid of the underscores that may freak out our client (see screenshot below).

 
<!-oui-concours-column-headers-> 




Hide columns 
----------------

Another thing that can freak out a client is the "id" column.

To hide a column, use the hiddenColumns property, like so:


```php
<?php


use Crud\CrudModule;

$fields = '
c.id,
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [ // <----(here)
    "id",
];




$table->printTable('oui.concours', $query, $fields, ['id']);

```

This code in the example above will hide the id column from the view, using css (see screenshot below).



<!-oui-concours-hidden-columns->



Transform the column content 
----------------

Using the setTransformer method, we can transform any column's content.

This is a powerful method.

In the following example, we use the setTransformer method to:

- transform the video url into a link to the video
- cut text longer than 25 chars, and add the trailing dots (...) instead
- turn a foreign key column into a link to the corresponding update form    

The code is the following:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, # <---(here)
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id", // <----(here)
];




$table->setTransformer('url_video', function ($v) { // <----(here)
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) { // <----(here)
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) { // <----(here)
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});



$table->printTable('oui.concours', $query, $fields, ['id']);

```


As you can see, the **setTransformer** method takes two parameters:

- the name of the column to transform
- the transformer function, which takes two parameters:
    - the value of the content
    - an array representing the row (array of column names => values for the given row)


Also notice that in order to create the "foreign key" transformer, we needed the id of the foreign table.

Therefore, we slightly modified our sql query (the fields part): by adding the equipe_id column in the 
sql query, we make it available to the row.

However, we don't want the equipe_id column to appear in our list, so we also hide it (using the hiddenColumns property).



The transformed list looks good (see screenshot below).


<!-oui-concours-transformed->




Widgets
==============

Widgets are the elements surrounding the table of the list.

The available widgets are:

- title
- page selector
- search
- new item link
- nipp selector (number of items per page selector)
- pagination
- multiple actions


The figure below shows the location of those widgets.



<!-crud-list-widgets->



We've already seen how to control the title, which is a special widget.

To show/hide the other widgets, we use the customizeWidget method, which takes two parameters:

- the name of the widget to use
    - pageSelector
    - search
    - newItemLink
    - nippSelector
    - pagination
    - multipleActions
- a boolean: whether or not the widget should be displayed 



Hide the page selector widget
-------------------------

To hide the page selector widget, we use the customizeWidget method, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

The table now doesn't have a page selector anymore (see screenshot below).



<!-oui-concours-no-page-selector->









Hide the search widget
-------------------------

To hide the search widget, we use the customizeWidget method, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

The table now doesn't have a search anymore (see screenshot below).



<!-oui-concours-no-search->






Hide the "new item link" widget
-------------------------

To hide the "new item link" widget, we use the customizeWidget method, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

The table now doesn't have a "new item" link anymore (see screenshot below).



<!-oui-concours-no-newitemlink->





Hide the nipp selector widget
-------------------------

To hide the nipp selector widget, we use the customizeWidget method, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

The table now doesn't have a nipp selector anymore (see screenshot below).



<!-oui-concours-no-nipp->





Hide the pagination widget
-------------------------

To hide the pagination widget, we use the customizeWidget method, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false); 
$table->customizeWidget("pagination", false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

The table now doesn't have a pagination anymore (see screenshot below).




<!-oui-concours-no-pagination->








Hide the multiple actions widget
-------------------------

To hide the multiple actions widget, we use the customizeWidget method, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```

The table now doesn't have a multiple actions bar anymore (see screenshot below).




<!-oui-concours-no-multiple-actions->





Customize your actions
===============================


Hide the checkboxes
----------------------

To hide the checkboxes, use the showCheckboxes property, like so:

```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", false);


$table->showCheckboxes = false; // <---(here)

$table->printTable('oui.concours', $query, $fields, ['id']);

```


Now our list doesn't have the checkbox any more (see screenshot below)



<!-oui-concours-no-checkbox->



Get rid of the single action columns
----------------------

To get rid of the single action columns, use the dropSingleActions method, like so:


```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", false);


$table->showCheckboxes = false;


$table->dropSingleActions(); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```




Now our list doesn't have any actions column anymore (see screenshot below).

Note: the dropSingleActions method also accept an array of the action column names to drop (if we wanted
to drop only the "Edit" column for instance). 


<!-oui-concours-no-action->



Recreate the "Edit" action 
---------------------

The "Edit" single action is a link to the update form of the row containing the "Edit" link.

In order to create such a link, we need the <-ric-> of the row.

We can register single actions using the registerSingleAction method.

The following example recreates the "Edit" action from scratch:


```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", false);


$table->showCheckboxes = false;


$table->dropSingleActions();


$table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>'); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```


In the above example, we've used the **CrudHelper::getUpdateFormUrl** method to generate the update form dynamically (so 
that if we changed the uri of the update form one day, from the **crud config**, our link would still work).

Also note that instead of passing regular values to the **CrudHelper::getUpdateFormUrl** method we've passed **tags**.

**Tags** are resolved by the DataTable object when the single actions are printed.

The following **tags** are available:

- tableName: the current table being displayed
- ric: the ric of the current row being displayed


So now, our list contains our custom "Edit" action column (see screenshot below).



<!-oui-concours-custom-edit.png->



Recreate the "Delete" action with the postlink trick 
---------------------

In order to delete a row, you need to know it's <-ric->,
and then build the delete sql query from that ric.

In nullos, it has been chosen that the "Delete" parameters would be send via post rather than get.

So how do you create a form that looks like a link?

The DataTable object provides some useful tools for us:

- postlink: a css class that turns a link into a form
- a handler mechanism: allow us to hook php callbacks to listen to a posted form

We can register single actions using the registerSingleAction method.

The following example recreates the "Delete" action from scratch:


```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", false);


$table->showCheckboxes = false;


$table->dropSingleActions();


$table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>');
$table->registerSingleAction('delete', '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">My Delete</a>', ":delete"); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

```


In the above example, we've used the postlink css class to tell DataTable that this link should be turned into a form when clicked upon.

When we do so, we have two more attributes to write:

- data-action: the name of the action, will create a $_POST[action] variable
- data-ric: the value of the ric, will create a $_POST[ric] variable
 
 
Finally, we need to provide a handler for the posted data.

We can use a php function, but in the case of the delete action, DataTable has a built-in handler that we can call by using the special string ":delete".  

 
Also notice the confirmlink css class: it tells DataTable to confirm (with a javascript confirm dialog) that the user really wants to execute the single action before executing it.
 

So now, our list contains our custom "Delete" action column (see screenshot below).



<!-oui-concours-custom-delete->




Create a "Debug row" action with the postlink trick 
---------------------

In this example we create a "Debug row" single action, using the postlink trick.

This is a variation of our previous example where we use a php callback as the third argument of the registerSingleAction method.

We can register single actions using the registerSingleAction method (same as previous example).


```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", false);


$table->showCheckboxes = false;


$table->dropSingleActions();


$table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>');
$table->registerSingleAction('delete', '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">My Delete</a>', ":delete");
$table->registerSingleAction('debug', '<a class="action-link postlink" data-action="debug" data-ric="{ric}" href="#">Debug row</a>', function($table, array $ric){ // <---(here)
    a("The table is $table");
    a($ric);
});


$table->printTable('oui.concours', $query, $fields, ['id']);

```


In the above example, we've used the postlink css class again to tell DataTable that this link should be turned into a form when clicked upon.

Our handler is a php callback which takes two parameters:

- table: the name of the table
- ric: the array of ric values


In this case, we just display the arguments received by the php callback function.


So now, our list contains our custom "Debug row" action column, and if you click on it, it will print the info about the row (see screenshot below).



<!-oui-concours-custom-debug->






Get rid of the multiple actions
----------------------

To get rid of the multiple actions, use the dropMultipleActions method, like so:


```php
<?php
 
 
 use Crud\CrudHelper;
 use Crud\CrudModule;
 
 $fields = '
 c.id,
 c.equipe_id, 
 o.nom as equipe_nom,
 c.titre,
 c.url_video,
 c.lots
 ';
 
 
 $query = "select
 %s
 from oui.concours c
 inner join oui.equipe o on o.id=c.equipe_id
 ";
 
 
 $table = CrudModule::getDataTable();
 
 $table->title = "Concours";
 $table->actionColumnsPosition = "left";
 
 $table->columnHeaders = [
     "equipe_nom" => "equipe",
     "url_video" => "url video",
 ];
 
 $table->hiddenColumns = [
     "id",
     "equipe_id",
 ];
 
 
 $table->setTransformer('url_video', function ($v) {
     return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
 });
 
 $n = 30;
 $table->setTransformer('lots', function ($v) use ($n) {
     return substr($v, 0, $n) . '...';
 });
 
 $table->setTransformer('equipe_nom', function ($v, array $item) {
     return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
 });
 
 
 $table->customizeWidget("pageSelector", false);
 $table->customizeWidget("search", false);
 $table->customizeWidget("newItemLink", false);
 $table->customizeWidget("nippSelector", false);
 $table->customizeWidget("pagination", false);
 $table->customizeWidget("multipleActions", true); // <---(here)
 
 
 $table->showCheckboxes = true; // <---(here)
 
 
 $table->dropSingleActions();
 
 
 $table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>');
 $table->registerSingleAction('delete', '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">My Delete</a>', ":delete");
 $table->registerSingleAction('debug', '<a class="action-link postlink" data-action="debug" data-ric="{ric}" href="#">Debug row</a>', function($table, array $ric){
     a("The table is $table");
     a($ric);
 });
 
 
 $table->dropMultipleActions(); // <---(here)
 
 
 $table->printTable('oui.concours', $query, $fields, ['id']);


```




Now if your refresh the page, you will see that the multiple action widget does not contain any action (see screenshot below).


Note: the dropMultipleActions method also accept an array of the multiple action names to drop. 


<!-oui-concours-empty-multiple-action->









Recreate the "Delete all" multiple action 
---------------------

In order to create a multiple action, all we have to do is provide the name of the action, and a php handler.

We can register multiple actions using the registerMultipleAction method, which takes the following parameters:

- id: the name of the action
- label: how the action is displayed in the **multiple action widget**
- function: the php callback, which accepts two parameters: 
    - table: the name of the current table
    - rics: an array of ric values (each entry is itself a ric value array)
- confirmation: a boolean, whether or not this action needs confirmation (done via a javascript confirm dialog)
    
    
    
The following example recreates the "Delete all" multiple action from scratch:



```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", true);


$table->showCheckboxes = true;


$table->dropSingleActions();


$table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>');
$table->registerSingleAction('delete', '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">My Delete</a>', ":delete");
$table->registerSingleAction('debug', '<a class="action-link postlink" data-action="debug" data-ric="{ric}" href="#">Debug row</a>', function($table, array $ric){
    a("The table is $table");
    a($ric);
});


$table->dropMultipleActions();
$table->registerMultipleAction('deleteAll', "My delete all", ":deleteAll", true); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);


```


In the above example, we've used the special string ":deleteAll", which tells DataTable to use its native deleteAll handler.

So now, our multiple actions selector contains our custom "deleteAll" multiple action  (see screenshot below).



<!-oui-concours-custom-my-delete-all->





Create a "Debug rows" multiple action 
---------------------

Now that we've seen how the multiple action mechanism works (in the previous example), let's build our own multiple action handler.

The following example creates a "Debug rows" multiple action:



```php
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", true);


$table->showCheckboxes = true;


$table->dropSingleActions();


$table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>');
$table->registerSingleAction('delete', '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">My Delete</a>', ":delete");
$table->registerSingleAction('debug', '<a class="action-link postlink" data-action="debug" data-ric="{ric}" href="#">Debug row</a>', function($table, array $ric){
    a("The table is $table");
    a($ric);
});


$table->dropMultipleActions();
$table->registerMultipleAction('deleteAll', "My delete all", ":deleteAll", true);
$table->registerMultipleAction('debugRows', "Debug rows", function($tables, array $rics){
    a(func_get_args());
}, false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);


```


In the above example, we've used a php function to display the arguments passed to a multiple action handler.


So now, when we select our "Debug rows" multiple action, we see a debug string (see screenshot below).


<!-oui-concours-debug-rows->




Related
=============

- <-Configure a form->