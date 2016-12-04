Crud page
===============
2016-11-30 -- 2016-12-04


A **crud page** is a <-page-> with two views:

- a list view, which is the default view
- a form view


todo: images of list and forms views






Nullos power user
----------------------
It is part of the [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module.md).

The crud page is by default mapped to the **/table** uri (see the [Router](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/routing.md) for more information).


Its output is controlled by the url parameters:

- name: required, the name of the table to interact with
    - the full name of the table is used (for instance oui.videos, with oui being the database)
- action: optional (defaults to list), the type of the object to display:
    - insert: the insert form for the table
    - edit: the update form for the table
        - in this case the ric parameter must also be passed
    - list: the list for the table
- ric: required only if the action is update, optional otherwise
    - it's a string containing the [ric values](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/ric.md) separated by the ric separator (--*-- by default)  
    



Once the action and the table are identified, the crud page calls the corresponding [crud file](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/crud-file.md).

To configure a list or a form, you need to open and edit the corresponding **crud file**.

**Crud files** are located in the **app-nullos/crud** directories.

If the action is a form (insert or edit), then the file called is:

- **app-nullos/crud/form/{fullTableName}.php** if present
- **app-nullos/crud/auto-form/{fullTableName}.php** otherwise

({fullTableName} should be replaced with the real full table name)

If none of those file exist, the crud page will complain.

If the action is a list, then the file called is:

- **app-nullos/crud/list/{fullTableName}.php** if present
- **app-nullos/crud/auto-list/{fullTableName}.php** otherwise

If none of those file exist, the crud page will complain.

 
 
 
 
The **auto-form** and **auto-list** directories are where the **crud generators** put their files.
Those directories can also be cleaned up via the gui (for instance by the ["Reset" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/reset-page.md)),
and therefore you should not edit the files inside those directories.

Rather, use the **form** and **list** (without the "auto-" prefix) directories, which are never removed by the **nullos application**.
 
 
 
 
 Related
 -----------
 - [Configure a list](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/configure-a-list.md)



