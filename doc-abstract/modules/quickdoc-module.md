QuickDoc module
===================
2016-12-19 -- 2016-12-26



[TOC]

The QuickDoc module is a tool which helps creating a documentation.


<!-quickdoc->


While writing the nullos admin documentation, I noticed that I was constantly
moving the documentation pages around. The problem when you do so is that you must also rewrite all 
the links urls. 

So I decided to have a more portable forms of links and images references, and I called that tool AbstractDoc,
which became QuickDoc in nullos.

Doing so, I discovered other benefits of having an abstract doc:

- more portable
- easier to write the doc (you don't need to fetch a link somewhere else, so you stay focus)


I then added a few more tools: the toc converter, a todo scanner, and a tree scanner.



General concept
=================
2016-12-19


When you write your documentation, if you need to write:

- a link
    - use the <-link-> notation
- an image
    - use the <!-image-> notation
- a todo item
    - use the todo: anything notation
    
- a table of contents
    - use the &#91;TOC] notation 
    
- the tree structure of your documentation (like the one at the bottom of the <-README.md-> file)
    - use the &#91;TREE] notation 


This allows you to stay focused on the writing of the documentation.

You end up with an abstract doc.

Using the QuickDoc Gui, you can convert the abstract doc to a concrete doc.

In practice, I was only concerned with putting the doc on github, so I only implemented that feature only.

However, in theory it wouldn't take too much effort to convert the abstract doc into another 
format, like the html format for instance.



Using the QuickDoc Gui
-------------------

QuickDoc uses the <-tabby layout->.
There are 6 tabs:

- config
    - you start there, defining the path to your abstract doc and the path to your concrete doc
    - linksUrlPrefix: this is a prefix applied when the symbol is a relative path (without a leading slash)
    - linksAbsoluteUrlPrefix: this is a prefix applied when the symbol is an absolute path (starts with a slash)
    - note: either the linksUrlPrefix OR the linksAbsoluteUrlPrefix will be applied, but not both at the same time
    
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



The nullos documentation
---------------------------
2016-12-20

Actually, you are currently reading a product example of the QuickDoc module.

If you look in the nullos repository, you will find two documentation directories:

- doc-abstract: which is my working directory, containing only symbols (no github specific things)
- doc: which is the current doc you are reading, and which contains resolved symbols (links, images, TOC)



 






