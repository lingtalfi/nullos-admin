Module
===================
2016-12-21 -- 2016-12-25

 


In nullos admin, most functionalities are brought via modules.

Modules are small pieces of code created by third parties, which one can plug in/out the nullos admin
to enhance/reorganize its behavior.

A module can be very big as well as very small: it can handle a full website, or just do a specific task,
it all depends on the module author. The sky is the limit.


There is module that rules them all: it's called the "ModuleInstaller" module.

It provides a gui to install/uninstall/pack the modules.

More about the module installer in the <-module installer page->.





Module organization
========================
2016-12-25


The configuration of your module is stored in the following locations:

- **MyModulePreferences**, contains the preferences for your module (admin preferences)
- **MyModuleConfig**, contains the core config of your module (important paths, other things...)
- **MyModuleServices**, offer services to other modules (see the <-saas system-> for more details)
- **MyModuleModule**, subscribe to other module's services (see the <-saas system-> for more details).
- **MyModuleUtil**, I believe this class should be used as a (preferably private) interface of the module.
            Basically, it would be the remote of the module, which triggers its most requested features.
- **MyModule/Util/**, this directory should contain the Utilities used by the module.
                    The most used utilities might be referenced in the **MyModuleUtil** class.
- **MyModuleInstaller**, create this class and implement ModuleInstallerInterface to have the <-ModuleInstaller module->
                    gui display the "install/uninstall links".
                    If you implement the PackableModuleInstallerInterface, then the gui will display
                    the "pack" link. (more info in the <-module installer module page->)
                    
- **MyModule/InstallAssets/**, this directory is by convention used by the ModuleInstaller.
                    It contains the files that the module will deploy/remove during the 
                    installation/uninstallation process.
                    
- **MyModuleHelper**, I believe this one should be used as an internal helper for the module author only
                    
                    
                    
                   





ModulePreferences
===================

Some modules need to store some preferences (for instance the location of a file, or a number, etc...).

It's common that modules store such preferences in a file: **app-nullos/assets/modules/$yourModule/prefs.php**

There is an easy way to implement to access/store data in and out this preferences file:

- create a MyModulePreferences class, and extend the ModulePreferences class.
- then create a **public static getDefaultPreferences()** method, which should return the default preferences array
- now you can call the ModulePreferences::getPreferences and ModulePreferences::setPreferences methods
    
    





