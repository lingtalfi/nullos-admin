Nullos Admin
================

A php script to administer any website.



[![nullos-admin.jpg](https://s19.postimg.org/v2eide6sj/nullos_admin.jpg)](https://postimg.org/image/r616helsv/)



Table of contents
---------------------
- [Nullos Admin](#nullos-admin)
 * [Table of contents](#table-of-contents)
- [What is nullos?](#what-is-nullos)
- [Where to start?](#where-to-start)
- [Nullos Admin: the website](#nullos-admin-the-website)
- [Nullos admin: the cms](#nullos-admin-the-cms)
 * [The Privileges](#the-privileges)
 * [Modules](#modules)
 * [Layout](#layout)
 * [The Router](#the-router)
- [Tutorials section](#tutorials-section)
- [Documentation Tree](#documentation-tree)
- [History Log](#history-log)


What is nullos?
==================
2016-12-19

Nullos admin is a [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif) application that let you administrate any website.

Nullos was created with the intent to be sold as the administration gui of your client's website.

In other words, it is supposed to be human friendly (as opposed to a geek only tool).


Nullos admin has two main features:


- crud generation 
    - the idea is that you can probably administer most of a website just by interacting with its database(s) 
    - therefore nullos has a crud generator, which generate human friendly customizable lists/forms  
- customizable cms
    - if you cannot do an (administrative) task using only the database, then you need another way to do it 
    - nullos allows you to create new menus and pages, so that the sky becomes the limit






Where to start?
==================
2016-12-19

If you are new to [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif) applications, familiarize yourself with a kif application structure and inner working.

Basically once you know how kif works, you know 95% of nullos admin.


Assuming that this is the case by now, let's continue with **nullos admin**'s specific things.

If you are more a doer, then check out the [tutorials section](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials),
or if you want to have a more theoretical understanding of the general **nullos admin** tool,
then continue reading.


 
Nullos Admin: the website
==================================
2016-12-19

The first time you open the nullos admin website, you get the login screen (see screenshot below).
 
[![login-screen.png](https://s19.postimg.org/ls2e9uw2r/login_screen.png)](https://postimg.org/image/gtevvbs9r/)

If you log in as root (pseudo: root, password: root), then you will see the nullos admin gui,
with a left menu, and the main content on the right (see screenshot below).

[![main-screen.png](https://s19.postimg.org/b6iixupr7/main_screen.png)](https://postimg.org/image/xigbr8ov3/)

Actually if you look more closely, you will see four parts: a top bar, a left menu, a body,
and a bottom bar (see the screenshot below).

[![layout.jpg](https://s19.postimg.org/dy1sogo9v/layout.jpg)](https://postimg.org/image/o847npe5b/)



On the left menu, you will see the "Tools" section, which contains links to the default tools
that you have at your disposal so far:

- [Init writer](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module/init-writer-page.md)
- [Reset](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module/reset-page.md)
- [Crud Generators](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-generators-page.md)
- [Execute SQL](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module/execute-sql-page.md)
- [QuickDoc](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/quickdoc-module.md)
- [IconsViewer](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/iconsviewer-module.md)
- [Linguist](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/linguist-module.md)
- [NullosInfo](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/nullosinfo-module.md)



Those tools are the collection of tools that I like to have when creating a new backoffice.

Basically, they help generate the crud files (which saves a lot of work), and there are useful tools as well,
like the "Linguist" (very helpful when creating multi-language pages), or the "Execute SQL" tool which
helps with sql related tasks (like importing a database).
  
  
You can change those tools if you want: add your own, remove those that you don't need.

In fact, you can change every aspect of the nullos admin gui, because **nullos admin** is a cms.





Nullos admin: the cms
=========================
2016-12-19


As I said earlier, nullos is nothing more than a [kif application](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif).


Below are the few things that make nullos unique compared to a flat kif application.


The Privileges
----------------
2016-12-19

When you log in the **nullos admin** website, you are identified as a profile with 
certain privileges.

Those privileges determine which actions you can do, and which you can't.

In nullos, you can potentially put a privilege check on every single action.

Nullos admin actually uses the [Privilege framework](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/Privilege) to handle the privileges of the application.


Modules
--------------
2016-12-19

Nullos embraces the modules system described in [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif).

In nullos, a module contains some functionality, and can be plugged in and out the nullos application.

Typically, a module is responsible for a new item (or more) in the left menu, and the corresponding page(s).



Layout
---------
2016-12-19


For general information about a layout, please refer to the [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif) documentation.


**Nullos admin** only uses one Layout so far.

The Layout class itself is in the **app-nullos/class/Layout** directory, and it's a whole world by itself.

It contains various classes that help with the creation of new modules:
 
- some only visual:
    - Goofy, Key2ValueForm, Tabby
- some others concerned with the logic:
    - IfDbLayout (will redirect you to an error page if your init file is not configured with a database)


The **layout-elements** are located in the **app-nullos/layout-elements** directory.

    
    



The Router
------------
2016-12-19

Nullos router uses a basic [kif](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/kif) router, but also has the extra features:
 
- If you are not logged in, you will be redirected to the **login** page 
- If the application is not initialized (i.e. the init file is not found), you will be redirected to the **boot** page 





Tutorials section
=========================
2016-12-19


- [getting started with nullos admin](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/getting-started-with-nullos-admin.md)


Documentation Tree
======================
2016-12-21


  - [README.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/README.md)
  - [assets](https://github.com/lingtalfi/nullos-admin/tree/master/doc/assets)
  - [bonus](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus)
    - [developer-guidelines](https://github.com/lingtalfi/nullos-admin/tree/master/doc/developer-guidelines)
      - [developer-guidelines.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/developer-guidelines.md)
      - [module-guidelines.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/module-guidelines.md)
    - [nullos-aliases.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/nullos-aliases.md)
  - [core](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core)
    - [init-file.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/init-file.md)
    - [layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/layout)
      - [tabby.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tabby.md)
    - [layout.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/layout.md)
    - [logger](https://github.com/lingtalfi/nullos-admin/tree/master/doc/logger)
      - [list-of-log-calls.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/list-of-log-calls.md)
    - [logger.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/logger.md)
    - [nullos-account.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/nullos-account.md)
    - [nullos-permissions.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/nullos-permissions.md)
    - [privilege](https://github.com/lingtalfi/nullos-admin/tree/master/doc/privilege)
      - [configuring-privilege-profiles.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/configuring-privilege-profiles.md)
      - [list-of-all-privileges.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/list-of-all-privileges.md)
      - [privilege-profile.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/privilege-profile.md)
  - [modules](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules)
    - [applicationlog-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/applicationlog-module)
      - [configuring-log-path.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/configuring-log-path.md)
    - [applicationlog-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/applicationlog-module.md)
    - [authentication-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/authentication-module)
      - [configuring-nullos-accounts.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/configuring-nullos-accounts.md)
      - [login-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/login-page.md)
    - [authentication-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/authentication-module.md)
    - [boot-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/boot-module)
      - [init-writer-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/init-writer-page.md)
      - [reset-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/reset-page.md)
    - [boot-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/boot-module.md)
    - [crud-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/crud-module)
      - [crud-files-preferences.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/crud-files-preferences.md)
      - [crud-files.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/crud-files.md)
      - [crud-generators-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/crud-generators-page.md)
      - [crud-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/crud-page.md)
      - [left-menu-preferences.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/left-menu-preferences.md)
      - [ric.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/ric.md)
    - [crud-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/crud-module.md)
    - [iconsviewer-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/iconsviewer-module.md)
    - [lang-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/lang-module)
      - [translation-files.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/translation-files.md)
      - [translation-function.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/translation-function.md)
    - [lang-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/lang-module.md)
    - [linguist-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/linguist-module.md)
    - [module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/module.md)
    - [nullosinfo-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/nullosinfo-module.md)
    - [quickdoc-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/quickdoc-module.md)
    - [sqltools-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/sqltools-module)
      - [execute-sql-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/execute-sql-page.md)
    - [sqltools-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/sqltools-module.md)
  - [todolist.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/todolist.md)
  - [tutorials](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials)
    - [configure-a-list.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/configure-a-list.md)
    - [getting-started-with-nullos-admin.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/getting-started-with-nullos-admin.md)
    - [install-oui-database.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/install-oui-database.md)


History Log
===============

- 1.1.0 - 2016-12-21

    - add QuickDoc TreeTransformer
    - add SimpleForm layout helper
    - add ArrayDataTable in crud module, and ArrayCrud layout helper 
    
- 1.0.0 - 2016-12-20

    - First release    





