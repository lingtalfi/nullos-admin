What is a module?
=======================
2017-01-20


A module is a piece of code that you inject in the application, and that does something.

A module can do absolutely anything: from simply writing a random number in a file,
or displaying a left menu item, to creating a whole website with its backend gui, or even more (sky is the limit).



Modules can be installed and uninstalled, except for native modules which are always in 
the application (I coded them and you generally won't need to worry about them).
 
When a module is installed, it can do things like copying files, creating database tables,
providing services for the other modules, subscribing to other modules' services.


Modules are located in the class-modules directory.


To install a module, you just need to call its install method.

This can be done programmatically (test it by yourself), or there is a "module installer" module
which provides you with a gui for installing modules (and managing modules in general).


Modules reside in directories called packages (a package is a directory containing your classes).
You can name your classes how you want, however, some conventions are used.

Depending on the class suffix, the class has a certain role (replace MyModule with the name of your module):

- MyModule: (no suffix) this is the main module class, which contains the hooks (subscriptions) to other modules's services
- MyModuleService: this class provides services to other modules. A service is usually a public static method,
            and by convention, all the subscribers module subscribe use the same method name (in the MyModule class).
            So for instance, you will have a HamburgerModule which provides a ham service through the 
            HamburgerModuleService::ham public static method, and a BooModule which will subscribe to that 
            service using the BooModule::ham public static method.
- MyModulePreferences: a class that you can use to quickly access your module configuration data.
                        Data is stored in files (in the assets directory).
            
                     



