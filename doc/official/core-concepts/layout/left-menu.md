Left menu
=====================
2016-12-03




The **left menu** is the left part of the [nullos main layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/nullos-main-layout.md).

It contains the navigation links organized in sections:

- [the "Tools" section](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout/left-menu/tools-section.md)
- Website: this section contains links to the <-crud lists-> and <-crud forms->, which allow interaction with the <-front website(s)-> database(s)
- Plugins: todo




The left menu's displaying originates from the [Layout object](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout.md), which calls 
the [Bridge](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/bridge.md)'s displayLeftMenuBlocks method.



Left menu nomenclature and design
--------------------

The left menu links are organized in **sections**.

Each section contains one or more **link items**.

A section is an object with the following properties:

- label
- isCollapsible: true (little plus icon on the right)
    - isOpen: true
- icon: null|svgIconName todo, expand on SvgIcon tool
- cssClass
- items: array of **link items**
    
    
Each **link item** is an object with the following properties:
   
- label     
- icon
- cssClass
- children: null|array of **link items**
    - isCollapsible
    - isOpen



