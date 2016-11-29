Quickstart: the "Crud generators" page
============================
2016-11-29









The "Crud generators" page can do the following:

- generate some default crud generators preferences
- generate the **crud files**



The "Crud generators" page has two views: if the init file is not found, 
it invites you to go to the "Configure" page and complete the configuration (see screenshot below).

[![quickstart-module-crud-generator-no-init.png](https://s19.postimg.org/protqq3tv/quickstart_module_crud_generator_no_init.png)](https://postimg.org/image/aiywcya5b/)


If the init file is found, then you will see the "Generate forms and list" form (see screenshot below).

[![quickstart-module-crud-generator-with-init.png](https://s19.postimg.org/fvnqr2y1v/quickstart_module_crud_generator_with_init.png)](https://postimg.org/image/p3fz7s53z/)


The form let you choose:

- the database to which you want to interact with
- whether or not you want to generate the crud generator preferences
- whether or not you want to generate the **crud files**




If you are not familiar with the terms crud generator preferences and **crud files**, here is how it works:

- the "crud generators" generate the **crud files**
- a **crud file** is a file used by the crud module to display either a form or a list (but not both at the same time)
- a **crud file** of type form is generated with the "form" crud generator and is placed into the **app-nullos/crud/auto-form** directory (by default) 
- a **crud file** of type list is generated with the "list" crud generator and is placed into the **app-nullos/crud/auto-list** directory (by default)
- both generators can be configured with preferences which are located in the **app-nullos/class-modules/Crud/CrudConfig.php** file (aka crud config file)
    - you can manually edit the crud config file, or you can use the the form in the "Crud generators" page which can create some generic preferences for you (check the "create the crud generator preferences" checkbox)
    
    
    
Once you have successfully submitted the form, it will take a while (5 sec, depending on the size of your database and the options that you have chosen) and eventually you will see the congratulations screen (see screenshot below).



[![quickstart-module-crud-generator-with-init-succe.png](https://s19.postimg.org/4xch8w9gj/quickstart_module_crud_generator_with_init_succe.png)](https://postimg.org/image/r9aa2a8kf/)