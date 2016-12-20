Nullos Admin
================

A php script to administer any website.



[![nullos-admin.jpg](https://s19.postimg.org/v2eide6sj/nullos_admin.jpg)](https://postimg.org/image/r616helsv/)



Table of contents
---------------------
[TOC]




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













