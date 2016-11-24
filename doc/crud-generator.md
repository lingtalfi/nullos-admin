Crud Generator
=================
2016-11-24



Although the nullos crud system allows the user to have a fair amount of control over
the list/form's appearance and behaviour, it is indeed tedious to configure the form and lists 
for all the tables in the database in the first place.
 
Therefore, I created a generator that create default configuration files 
with sensible default values.
 
 
As for now, only the generator for list is created.
 
 
The script to call to generate all the lists at once is in **app/scripts/crudgen-list.php**.

So to call it, just do:

```bash
php -f "/path/to/app/scripts/crudgen-list.php"
```


The script will create one configuration file per table, and put them into the **app/crud/auto-list** directory.
 
Since I'm working in a real life project in parallel, you might see the generated files for this project in this directory
in the github repo.

If you are curious, the db schema is here **app/www.db.png**.




How to configure the script for your database?
------------------------------------------------

TODO...





