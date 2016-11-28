Crud: Configure a list
============================
2016-11-28



The Crud module provides the Datatable object to display an interactive list of a given table.


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




