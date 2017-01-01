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
2016-12-19 -- 2016-12-25

In nullos, a module contains some functionality, and can be plugged in and out the nullos application.

More information in the [module page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/module-concepts/module.md).



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
    - [developer-guidelines](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/developer-guidelines)
      - [developer-guidelines.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/developer-guidelines/developer-guidelines.md)
      - [module-guidelines.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/developer-guidelines/module-guidelines.md)
    - [nullos-aliases.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/nullos-aliases.md)
  - [core](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core)
    - [init-file.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/init-file.md)
    - [layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/layout)
      - [tabby.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/layout/tabby.md)
    - [layout.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/layout.md)
    - [logger](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/logger)
      - [list-of-log-calls.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/logger/list-of-log-calls.md)
    - [logger.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/logger.md)
    - [nullos-account.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/nullos-account.md)
    - [nullos-permissions.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/nullos-permissions.md)
    - [privilege](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/privilege)
      - [configuring-privilege-profiles.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/privilege/configuring-privilege-profiles.md)
      - [list-of-all-privileges.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/privilege/list-of-all-privileges.md)
      - [privilege-profile.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/privilege/privilege-profile.md)
  - [faq](https://github.com/lingtalfi/nullos-admin/tree/master/doc/faq)
    - [faq.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/faq/faq.md)
  - [modules](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules)
    - [applicationlog-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/applicationlog-module)
      - [configuring-log-path.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/applicationlog-module/configuring-log-path.md)
    - [applicationlog-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/applicationlog-module.md)
    - [authentication-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/authentication-module)
      - [configuring-nullos-accounts.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/authentication-module/configuring-nullos-accounts.md)
      - [login-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/authentication-module/login-page.md)
    - [authentication-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/authentication-module.md)
    - [boot-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module)
      - [init-writer-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module/init-writer-page.md)
      - [reset-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module/reset-page.md)
    - [boot-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/boot-module.md)
    - [crud-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module)
      - [crud-files-preferences.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-files-preferences.md)
      - [crud-files.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-files.md)
      - [crud-generators-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-generators-page.md)
      - [crud-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-page.md)
      - [left-menu-preferences.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/left-menu-preferences.md)
      - [ric.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/ric.md)
    - [crud-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module.md)
    - [frontone-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/frontone-module)
      - [articles-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/frontone-module/articles-page.md)
      - [social-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/frontone-module/social-page.md)
      - [theme-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/frontone-module/theme-page.md)
    - [frontone-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/frontone-module.md)
    - [iconsviewer-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/iconsviewer-module.md)
    - [lang-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module)
      - [translation-files.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module/translation-files.md)
      - [translation-function.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module/translation-function.md)
    - [lang-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module.md)
    - [layout-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/layout-module)
      - [main-layout-styling.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/layout-module/main-layout-styling.md)
    - [layout-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/layout-module.md)
    - [linguist-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/linguist-module.md)
    - [logwatcher-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/logwatcher-module.md)
    - [module-concepts](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/module-concepts)
      - [module-repository-system.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/module-concepts/module-repository-system.md)
      - [module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/module-concepts/module.md)
      - [saas.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/module-concepts/saas.md)
    - [moduleinstaller-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/moduleinstaller-module)
      - [module-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/moduleinstaller-module/module-page.md)
    - [moduleinstaller-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/moduleinstaller-module.md)
    - [nullosinfo-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/nullosinfo-module.md)
    - [quickdoc-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/quickdoc-module.md)
    - [sqltools-module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module)
      - [execute-sql-page.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module/execute-sql-page.md)
    - [sqltools-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/sqltools-module.md)
    - [stats-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/stats-module.md)
    - [toolsleftmenusection-module.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/toolsleftmenusection-module.md)
  - [todolist.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/todolist.md)
  - [tutorials](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials)
    - [configure-a-list.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/configure-a-list.md)
    - [generate-admin-with-nullos.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/generate-admin-with-nullos.md)
    - [install-frontone.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-frontone.md)
    - [install-module-tutorial.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-module-tutorial.md)
    - [install-nullos-tutorial.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-nullos-tutorial.md)
    - [install-oui-database.md](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-oui-database.md)


History Log
===============

- 1.1.0 - 2016-12-21

    - add QuickDoc TreeTransformer
    - add SimpleForm layout helper
    - add ArrayDataTable in crud module, and ArrayCrud layout helper 
    
- 1.0.0 - 2016-12-20

    - First release    





