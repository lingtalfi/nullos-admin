The crud page
============================
2016-11-28


The crud page is responsible for displaying the forms and lists in the nullos admin.

For instance, when you click on a table link in the left menu, you see a page with a list, like in the screenshot below.

<-concours-list.png->

Or when you click on the "Create a new item" link at the top of a list, you go to a page with an insert form, like in the screenshot below.

<-concours-form.png->



By default, the crud page (aka table page) is mapped to the **/table** uri.

The crud page listens for the $_GET parameters:

When you call the "table" page, you need to pass a few parameters in the url:

- name: the table's full name (db.table). This parameter is mandatory, otherwise the page displays nothing. 
- ?action: defines the type of feature to display
    - list (by default): the list 
    - edit: the update form
        - in this case you also need to pass the <-ric string->
    - insert: the insert form
- ?ric: the <-ric string->, only necessary if the action is edit 

 

So for instance, if you want to display the insert form for the
videos table of the oui database, you start by typing this url: **/table?name=oui.videos&action=insert**.
 
 


To display a list or a form, the crud page will call a so-called **crud file** which contains the executing code.

In other words, the crud page itself is just a proxy to the **crud file** which does the real job.

There are two types of crud files:

- list crud file: displays a list
- form crud file: displays an insert form (if the ric parameter is not passed) or update form (if the ric parameter is passed) 


The crud page will first search for the **crud file** inside of a directory containing all the **crud files** generated 
automatically by the <-crud generators->.
 
This directory is either (by default):

- **app-nullos/crud/auto-list** (for the list crud files)
- **app-nullos/crud/auto-form** (for the form crud files)
 
The name of the file is the full name of the table, with the ".php" extension added (for instance **app-nullos/crud/auto-list/oui.videos.php**).


If the **crud file** was not found in that "auto" directory, then the crud page will search into the directory containing
all the developer manually created **crud files**.

This directory is either (by default):

- **app-nullos/crud/list** (for the list crud files)
- **app-nullos/crud/form** (for the form crud files)


If no file is found, the crud page displays nothing, and complains via the Log system.


This "double search" mechanism allows a developer to use the automatically generated **crud files** as a fallback, and yet having the possibility
to override them whenever needed.









