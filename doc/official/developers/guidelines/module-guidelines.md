Module guidelines
=====================
2016-12-02



This document part of the **nullos admin** [developers guidelines](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/developers/guidelines.md).




An example is perhaps better than the whole text below, so have a look at
the [Boot module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module.md), which implements
all the guidelines.




Package structure
--------------
A module MyPizza should contain the following:


- MyPizzaConfig: contains the configuration of the module
- MyPizzaModule: contains the hook methods that create links with the nullos core, or methods that are likely to do so one day 
- MyPizzaUtil: contains the internal, private methods, that no one cares about except the MyPizza module
    - it could be expanded/replaced with an Util directory containing multiple Utilities




Bridge
----------

When hooking into a bridge method, it makes sense to create/call a method on the module with the same name as the Bridge one.
For instance, if the Bridge has a method makePizza and I want to hook into it, I would create a makePizza method in my MyPizza module,
and then hook it into the Bridge::makePizza method.






Privileges
--------------

A privilege is composed of dot separated components (like.this.for.instance).

Each component uses camelCase case style.

- the first component is the module name
- the second component is the privilege type
    - a common type is access, which grants the displaying of a link to a given page, and allows to access the content of the page
        - the page is specified using the third component (only if the module deals with more than one page) 




Pages
----------------------

Page files for a MyPizza module should be located in **app-nullos/pages/modules/{myPizza}/{myPizza}.php**.

{myPizza} should be replaced by the camelCase for the module class name.


Create only one page if possible, using get parameters to differentiate between pages, and using internal layout-elements branching;
so that we don't waste the set of available urls.



Layout elements
----------------------

Layout elements files for a MyPizza module should be located in **app-nullos/layout-elements/modules/{myPizza}/{myPizza}.php**.
{myPizza} should be replaced by the camelCase for the module class name.



Translation files
----------------------

Translation files for a MyPizza module should be located in the **app-nullos/lang/{lang}/modules/{myPizza}** directory.

If there is only one translation file, or the main translation file (if there is one) should 
be located in the **app-nullos/lang/{lang}/modules/{myPizza}/{myPizza}.php** file.

{myPizza} should be replaced by the camelCase for the module class name.

When calling the __ method, the identifier can be hardcoded, no need to put the identifier or part of the identifier in the Config of the module: we can "safely" rely on the convention just described above.



Logger
-------------

If the MyPizza module uses the Logger, the identifier's namespace should be {myPizza}.

- if the log is related to the main page of the module (if it has one), then use {myPizza}.page
    - if the log is related to a page of the module, then use {myPizza}.page as a namespace
- if the log captures a PdoException, then use {myPizza}.pdoException



All log calls are registered in a file, like the [list of log calls](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/logger/list-of-log-calls.md) page for **nullos**.



