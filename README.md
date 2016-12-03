Nullos Admin
================

A php admin script to interact with a front end.


This is a work in progress... (the development version).

CURRENTLY NOT FUNCTIONAL as of 2016-12-03 (act as a personal backup), BUT WILL BE SOON.

The doc (below) is not up to date, some parts need to be revisited.


[![nullos-admin.jpg](https://s19.postimg.org/xu4mj2uw3/nullos_admin.jpg)](https://postimg.org/image/m50mv43xb/)




Table of contents
--------------------

- Official
    - [nomenclature and general concepts](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts.md)
        - [nullos account](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/nullos-account.md)
        - [ric](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/ric.md)
        - [left menu organization](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/left-menu-organization.md)
        - [different types of configuration](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/different-types-of-configuration.md)
    - [overview of the tree structure](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/overview-of-the-tree-structure.md)
    - core concepts
        - [init file](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/init-file.md)
        - [local vs distant website](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/local-vs-distant-website.md)
        - [Routing](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/routing.md)
            - [create a page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/routing/create-page.md)
        - [Layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout.md)
            - [nullos main layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/nullos-main-layout.md)
            - [layout element](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout-element.md)
            - [left menu](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/left-menu.md)
                - section            
            - [IfLayout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/iflayout.md)
        - [Privilege](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege.md)
            - [the Privilege profile](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege/privilege-profile.md)
            - [configuring the Privilege profiles](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege/configuring-privilege-profiles.md)
            - [list of all privileges](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege/list-of-all-privileges.md)
        - [Logger](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/logger.md)
            - [list of log calls](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/logger/list-of-log-calls.md)
        - [Bridge](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/bridge.md)
        - [Spirit](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/spirit.md)
    - [modules](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules.md)
        - [ApplicationLog module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/applicationlog-module.md)
            - [configuring the log path](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/applicationlog-module/configuring-log-path.md)
        - [Authentication module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/authentication-module.md)
            - [configuring the nullos accounts](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/authentication-module/configuring-nullos-accounts.md)
            - [the login page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/authentication-module/login-page.md)
        - [Boot module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module.md)
            - [the "Init writer" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module/init-writer-page.md)
            - [the "Reset" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module/reset-page.md)  
        - [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module.md)
            - [the crud file](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/crud-file.md)
            - [the crud page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/crud-page.md)
            - [the "Crud Generators" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/crud-generators-page.md)
            - [configure a list](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/configure-a-list.md)
            - [configure a form](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/configure-a-form.md)
            - [left menu preferences](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/left-menu-preferences.md)
            - [crud files preferences](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module/crud-files-preferences.md)
        - [Lang module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/lang-module.md)
            - [translation files](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/lang-module/translation-files.md)
            - [the translation function](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/lang-module/translation-function.md)            
        - LeftMenuSection
            - [ToolsLeftMenuSection module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/leftmenusection/toolsleftmenusection-module.md)  
        - [QuickStart module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module.md)
            - [the "Configure" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/configure-page.md)  
            - [the "Crud Generators" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/crud-generators-page.md)  
            - [hide the Quickstart section in the left menu](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/quickstart-module/hide-quickstart-section.md)  
        - [SqlTools module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/sqltools-module.md)
            - [the "Execute SQL" page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/sqltools-module/execute-sql-page.md)
    - developers
        - [guidelines](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/developers/guidelines.md)
            - [module guidelines](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/developers/guidelines/module-guidelines.md)
- Tutorials
    - [install nullos on your machine](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-nullos-on-your-machine.md)
    - [install the "oui" test database](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-oui-database.md)
    - [getting started with nullos](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/getting-started-with-nullos.md)
    - [create your first page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/create-your-first-page.md)
- Bonus
    - [nullos aliases](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/nullos-aliases.md)    
- [documentation map](https://github.com/lingtalfi/nullos-admin/tree/master/doc/documentation-map.md)



The documentation is currently under development.

I use the <-temporary notation-> when I know that I want to write a link, but I don't know the url yet.




