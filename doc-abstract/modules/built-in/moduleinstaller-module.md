ModuleInstaller module
========================
2016-12-25



The "ModuleInstaller" module install/uninstall all the modules in nullos, via a gui.


Learn more about the module installer gui by reading the <-moduleinstaller page-> document. 



The "ModuleInstaller" module uses a lot of conventions.


- If the module has an Installer class, then the gui displays the "install/uninstall" links
    - if the Installer class implements "Packable...", then the gui displays the "pack" links
- If the module is a core module, then it will not display the remove link, otherwise it will
    - core modules are defined in the ModuleInstallerConfig class
    
The ModuleInstaller also uses the <-Saas system-> to help with the modules intercommunication.
    
    
The Installer class basically implements an interface with two methods:

- install
- uninstall


If you are interested in, follow me in the source code.

    