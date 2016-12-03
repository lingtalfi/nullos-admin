Getting started with nullos
=======================
2016-11-27 -- 2016-11-29




DEPRECATED...coming back soon...


Welcome to the **nullos admin** tutorial.


In this tutorial, we install the nullos package on our machine, we install a test database, 
then we install the crud files and finally we configure nullos to interact with it.


At the end of the tutorial, our website will look like this:


[![final-result.png](https://s19.postimg.org/hljsvuwo3/final_result.png)](https://postimg.org/image/j0ldkkxr3/)



Are you ready?


Table of content
----------------------
- [Install the nullos package](#install-the-nullos-package)
- [Install the "oui" test database](#install-the--oui--test-database)
- [Install the crud files](#install-the-crud-files)
- [Configure the left menu](#configure-the-left-menu)
  * [Hide the Quickstart section from the left menu](#hide-the-quickstart-section-from-the-left-menu)
  * [Organize the sections on the left menu](#organize-the-sections-on-the-left-menu)
  * [Adding colors to the sections on the left menu](#adding-colors-to-the-sections-on-the-left-menu)
- [Conclusion](#conclusion)




Install the nullos package
=============================

To install the nullos package on your machine, please follow the instructions in the [Install nullos on your machine tutorial](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-nullos-on-your-machine.md).

I will be waiting for you :)



Install the "oui" test database
============================

Before we go further, we need a database for nullos to interact with.

If you have your own database, you can use it and skip this section.

If you want to reproduce my exact steps, then please follow the instruction in the [Install the "oui" test database tutorial](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-oui-database.md).

In the rest of this tutorial, I will be using the "oui" database.


Install the crud files
==========================================

In this section, we will use the nullos crud generators to create the **crud files**.

Crud files are basically the files responsible for displaying the lists and forms in nullos.


- Open the [http://nullos-admin](http://nullos-admin) url in your browser (back to the login screen)
- Login using root and root as the pseudo and password
    - this will log you as the most powerful user in nullos
    - you should see the install page screen (see screenshot below)
  

[![quickstart-module-configure-page.png](https://s19.postimg.org/sj83hc2cj/quickstart_module_configure_page.png)](https://postimg.org/image/7z39iumlb/)


Let's briefly discuss the interface here.

- At the top, on the right, you have the lang module with the available languages. Feel free to change language at any moment by clicking on your language (for now fr and en are available)
- On the left, you have the left menu  
    - on the right of the title "Nullos Admin", there is the **log out** icon
    - then below you have the Quickstart menu with its items: "Configure", "Crud Generators" and "Reset"
- On the right, you have the main content, which is currently an installation form
- Note that you can drag the split between the left and right panes
    - this is provided by the nice [Split.js](https://github.com/nathancahill/Split.js) library 
    
    
    
Okay, let's continue the installation.
    
- Fill the form on the right pane and click the "Submit" button. I used:
    - Language: en
    - Website name: My Website
    - Name: oui
    - User: root
    - Password: root
    
- The process will try to create the **app-nullos/init.php** file, filled with the data you've just provided    
- If successful, you should the congratulations alert (see screenshot below)
    
[![quickstart-module-configure-page-success.png](https://s19.postimg.org/5vsub6msj/quickstart_module_configure_page_success.png)](https://postimg.org/image/5j1g504in/)


- Click the Ok link
- You should now be on the "Crud Generators" page, which can generate the tables and lists for your application (see screenshot below)



[![quickstart-module-crud-generator-with-init-two-b.png](https://s19.postimg.org/p9yq7zkkj/quickstart_module_crud_generator_with_init_two_b.png)](https://postimg.org/image/5fcolv5cv/)
    
      
- In the form, choose the oui database (or your own)
- Make sure the two checkboxes are checked:
    - create the crud generator preferences
    - create the crud files
- Click the "Submit" button. This will take a while (5 seconds or so, depending on the size of your database)
    - this will generate the generators preferences, and then all the crud files for the selected database
- If successful, you should see the "All tables have been generated" notification (see screenshot below)
 
[![quickstart-module-crud-generator-with-init-succe.png](https://s19.postimg.org/4xch8w9gj/quickstart_module_crud_generator_with_init_succe.png)](https://postimg.org/image/r9aa2a8kf/)


- Click the "Click here" link
- This will refresh the page (see screenshot below)


[![quickstart-module-crud-generator-with-init-and-l.png](https://s19.postimg.org/m4e4hs1yb/quickstart_module_crud_generator_with_init_and_l.png)](https://postimg.org/image/cjuhuwcm7/)



Look on the left, the tables of the oui database have been generated! Hooray!

Nullos has created two arbitrary sections on the left menu: "Main" and "Others"; we will change them in the next section.

For now, let's have a quick look at what nullos has generated: the lists and the forms.
 
- Click the "Main > Concours" item in the left menu
    - it opens the list for "Concours" in the right pane (see the screenshot below)
        - (Concours is french for "Challenge", or "Competition", but it's not important in this tutorial) 

[![concours_list.png](https://s19.postimg.org/7z8bfyswz/concours_list.png)](https://postimg.org/image/lswo50li7/)



- We will not cover all the aspects of the list here, but if you are interested, check out the dedicated <-list page->
- For the time being, we will just focus on the general aspect
    - on the right pane, at the top, there is a "Create a new item" link, which points to the insert form for the "concours" table
    - below, we have the list
        - from left to right, we have: the checkbox column, the list columns, and the action columns (Edit, Delete)
        - the "Edit" link redirects to the update form for the "concours" table (and for the selected row)
        - the "Delete" link deletes a row
        - the "equipe" column displays links (aka foreign key links) to the update forms for the "equipe" table
        - the "url photo" and "url video" are links to the related media
            - the links in the "url photo" column don't work yet, we will fix that in a next tutorial            

- Click the "Create a new item" link at the top of the list
    - it opens the insert form for the "concours" table (see screenshot below)


[![concours-form.png](https://s19.postimg.org/wh0f3uvhf/concours_form.png)](https://postimg.org/image/sxehe1srj/)


- The form is just a basic form



Ok, we are done with the installation.


If you want to redo the tutorial with another database, you should use the "Quickstart > Reset" link from the left menu.
More details in the [QuickStart Reset documentation page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/reset-page.md).



In this section, we've seen how to generate lists and forms for a given database.

In the next section, we dive into the code and customize the left menu of the nullos gui.



Configure the left menu
==================================

In this section, we start thinking about our client and customize the nullos admin gui so that it looks exactly how we want (the screenshot at the top of this page).

We will do the following:

- Hide the Quickstart section from the left menu
- Organize the sections on the left menu
- Adding colors to the sections on the left menu





Hide the Quickstart section from the left menu
-------------------------------------------------

So now we want to hide the Quickstart section on the left menu.

Well, there is something you need to know: the Quickstart section by default only shows up if you are logged as root (which is the case if you have
followed this tutorial from the beginning).

But nullos has another account named "admin", which is not allowed to see/access the Quickstart menu.

So, let's try this:

- Click the log out icon, at the top of the left menu
    - this will log you out and you will see the login screen again
    - now log back in, but this time with the admin account (pseudo: admin, password: admin)
    - tadaaa! No more QuickStart menu. 


Now in the real world, you would only give your client access to the admin account, not the root account.

Therefore this could be the end of this section; but, just for fun, let me show you another way.

- log out again
- log in again as root (pseudo: root, password: root)
    - you will see the Quickstart menu again
    - now open the **app-nullos/class-modules/QuickStart/QuickStartConfig.php** file
        - most modules have such a configuration file that you can tweak
        - you will see the showLeftMenuLinks public static method, which currently returns true
        - make it return false and refresh your page
        - tadaaa! Again we did it: no more Quickstart menu
        - when this tutorial is finished, don't forget to display the menu again 
        



Note: the procedure of hiding the Quickstart section from the left menu is also explained in the [documentation of the QuickStart module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/hide-quickstart-section.md)



Organize the sections on the left menu
-----------------------------------

So now the Quickstart menu is hidden, good.
 
But there are currently two sections on the left menu that don't look so good: "Main" and "Others".

Let's change those.

- Open the **app-nullos/class-modules/Crud/CrudConfig.php** file and search for the **getLeftMenuSections** method. 
- Replace the content of this method by the following code (don't mind the french words, it's just an example for you to understand the mechanism:


```php
    public static function getLeftMenuSections()
    {
        return [
            "Configuration" => [
                'oui.configuration',
            ],
            "Modération" => [
                'oui.concours',
                'oui.coups_de_coeur',
                'oui.videos',
            ],
            'Equipe' => [
                'oui.equipe',
                'oui.equipe_has_membres',
                'oui.membres',
            ],
            'Utilisateurs' => [
                'oui.users',
                'oui.users_has_styles_musicaux',
                'oui.users_has_instruments',
            ],
            'Données statiques' => [
                'oui.instruments',
                'oui.niveaux',
                'oui.pays',
                'oui.styles_musicaux',
            ],
            'Messages' => [
                'oui.messages',
            ],
        ];
    }
```

- Save and refresh your page, you should see the different sections on the left menu (see screenshot below)

[![leftmenu-sections-organized.png](https://s19.postimg.org/rhph98rtv/leftmenu_sections_organized.png)](https://postimg.org/image/ltj6icnhb/)



Adding colors to the sections on the left menu
--------------------------------------

Our last step for this tutorial will be to change the colors of the sections that we've just created in the left menu.

- Open the **app-nullos/class-modules/Crud/CrudConfig.php** file and search for the **getLeftMenuSectionsClasses** method. 
- Replace the content of this method by the following code


```php
    public static function getLeftMenuSectionsClasses()
    {
        return [
            "Configuration" => "blue",
            "Modération" => "blue",
            'Equipe' => "purple",
            'Utilisateurs' => "yellow",
            'Données statiques' => "blue",
            'Messages' => "gray",
        ];
    }
```


- The getLeftMenuSectionsClasses method returns an array of section label => css class
- save and refresh the page
    - tadaaa! now we have exactly the look that we want


If you wonder where those colors come from, that's because I've secretly added them in advance 
at the bottom of the **app-nullos/www/style/style.css** file (I'm that kind of cheater).



So, I hope you've enjoyed this tutorial and see you next time.





Conclusion
=================

So far, we have customized the left part of the site: the menu.
But what about the right part: the list and the forms?   
    
    
I'm working on it, stay tuned...




Related
---------------
- [Create your first page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/create-your-first-page.md)
    
    
  