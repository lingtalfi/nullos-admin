Module
===================
2016-12-21



todo: experimental

This is an experimental document, you shouldn't rely on the information in this document. 



In nullos admin, third parties can bring new functionalities to the core by using modules.
 
A module can be very big as well as very small: it can handle a full website, or just do a specific task,
it all depends on the module author.


The only thing modules have in common is that they can be installed/uninstalled.

Apart from that, sky is the limit.





Installation/Uninstallation
===============================
2016-12-21


The installation is a three step process:

- import the module directory
- call the module installer if any
    - display messages for the user if any


Import the module directory
-----------------------------

Modules base files are contained in the **module directory**, and the module directories are
installed in the **app-nullos/class-modules** directory.

However, some modules might need to create files in other places (for instance 
translation files in the **app-nullos/lang** directory).

So for those modules there is the module installer system.


Call the module installer
----------------------------

Anything that a module needs that is not in the **module directory** is installed 
using the **module installer**.
 
For a given PizzaModule, the module installer is the PizzaModuleInstaller class.

When nullos installs a module, it looks for the installer class ("PizzaModuleInstaller"),
and call its "install" static method.


Note: when that call is made, the application is already initialized (the init file is loaded).


Sometimes, the module needs to communicate some information about the installation process.
This is done by returning a Report object.




Uninstallation
-----------------
For a given PizzaModule, the PizzaModuleInstaller class is used too.

When nullos uninstalls a module, it calls the "uninstall" static method of the installer.

Sometimes, the module needs to communicate some information about the uninstallation process.
This is done by returning a Report object. 

For instance, a module might want to say that the lang directory wasn't deleted because it
contained sensitive information, and that it should be removed manually.
 
 

Dependencies
---------------

When installing itself, a module will install whatever it needs to be functional,
which includes its own dependencies.

A module installation/uninstallation should not be destructive and leave alone any work done
by other modules or humans.








