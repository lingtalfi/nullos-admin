Install the FrontOne website in one click
============================================
2016-12-25



In this tutorial, we learn how to install the <-FrontOne-> website in one click (almost).


<!-frontone->




Here is our war plan:

- Install nullos
- Install the FrontOne module




The hardest part is to install nullos, once you know how to install nullos, the rest is always a piece of cake.



Install nullos
===================

Install the nullos application.

You don't need a database.

If you don't know how to install nullos, please read the <-install nullos tutorial-> then come back.

When you are done with the nullos installation, you can now skip to the next part.


Install the frontOne module
=============================

To install the frontOne module, we are going to use the <-ModuleInstaller module->.

Click the "ModuleInstaller" link on the left menu, you will stumble upon the ModuleInstaller page.

<!-module-installer-page->

Find the "FrontOne" module in the list.

The "FrontOne" module is a built-in module, so it's already in the list.

Click the "install" link next to the module name.

When it's done, refresh the page, for instance by clicking the "continue" link in the success alert.

That's it! See, just one click ;)

On the left, you should now see the "Front" section with 3 links: Theme, Articles and Social links (see screenshot below).


<!-front-one-admin-left-menu->


To use the frontOne website, please refer to the <-frontOne module documentation->.

Basically, an **app-vitrine-one** directory has been created next to the **app-nullos** directory.

It contains the FrontOne front website, which is nothing more that a plain old <-kif application->.
 
Point a webserver to the **app-vitrine-one/www** and redirect all virtual requests to the index.php,
and you will be able to see the FrontOne front website.



I hope you start to understand what **nullos admin** can do for you: administer any website, with a little bit of work.

For info, it took me 2 days to write the FrontOne 
module code (and I spent half the time creating various tools that didn't exist then),
so it's not very long.
 












 

















