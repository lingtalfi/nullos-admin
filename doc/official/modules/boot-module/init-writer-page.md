The "Init writer" page
=====================
2016-12-02 -- 2016-12-03


[![boot-page.png](https://s19.postimg.org/3xdg52wgz/boot_page.png)](https://postimg.org/image/u5okuggkf/)



The "Init writer" page's goal is to create/recreate the "user" [init file](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/init-file.md).

It is part of the [Boot module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module.md).


The gui provides a form with the following fields:


- Website Information
    - Language: the default lang of the **nullos admin** website.
        - technically: the language identifier used by default for the translations of the **nullos admin**, see [Lang module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/lang-module.md) for more information
    - Website name: the name of the website
        - is used by the [nullos Layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/nullos-layout.md) to display the html page title, and the content of the left banner at the top of the left menu
        - is used in the home page
        - is used in the login page
    - Time zone: the timezone of your current location 
        - the time zone is used by the [ApplicationLog module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/applicationlog-module.md) for writing a log entry's header
        - see [Logger](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/logger.md) for more details
- Database information
    - Name: the name of the main database used by the front website
    - User: the user of the main database used by the front website
    - Password: the password of the main database used by the front website
    
