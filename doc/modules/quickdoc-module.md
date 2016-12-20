QuickDoc module
===================
2016-12-19



[TOC]

The QuickDoc module is a tool which helps creating a documentation.


[![quickdoc.png](https://s19.postimg.org/7vyrbpp7n/quickdoc.png)](https://postimg.org/image/xrihuwr1b/)


While writing the nullos admin documentation, I noticed that I was constantly
moving the documentation pages around. The problem when you do so is that you must also rewrite all 
the links urls. 

So I decided to have a more portable forms of links and images references, and I called that tool AbstractDoc,
which became QuickDoc in nullos.

Doing so, I discovered other benefits of having an abstract doc:

- more portable
- easier to write the doc (you don't need to fetch a link somewhere else, so you stay focus)


General concept
=================
2016-12-19


When you write your documentation, if you need to write:

- a link
    - use the <-link-> notation
- an îmage
    - use the <!-image-> notation
- a todo item
    - use the todo: anything notation


This allows you to stay focused on the writing of the documentation.

You end up with an abstract doc.

Using the QuickDoc Gui, you can convert the abstract doc to a concrete doc.

In practice, I was only concerned with putting the doc on github, so I only implemented that feature only.

However, in theory it wouldn't take too much effort to convert the abstract doc into another 
format, like the html format for instance.



Using the QuickDoc Gui
-------------------

QuickDoc uses the [tabby layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/layout/tabby.md).
There are 6 tabs:

- config
    - you start there, defining the path to your abstract doc and the path to your concrete doc 
- help
    - contains a link to the quickdoc documentation (this page)
- action
    - this tab contains two buttons:
        - Rescan
            - will refresh the links and images tabs
        - Regenerate
            - will create the concrete doc (using the abstract doc)
- links
    - this will show you the resolved/unresolved links from your abstract doc
- images
    - this will show you the resolved/unresolved images from your abstract doc
- todo
    - this will show you the todo items contained in your abstract doc









