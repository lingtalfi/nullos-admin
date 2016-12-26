The ModuleInstaller module page
=======================
2016-12-25




The "module installer" module can display all the modules, and provides a gui to install/uninstall/pack them,
and even remove some of them.



<!-module installer->



What is it?
-----------

The ModuleInstaller module gui displays the list of all modules available in the current **nullos admin** application.

Some modules can be installed/uninstalled, some other can be packed, and some of them can be removed.

- Install a module means modifying the current nullos app so that the module can do its job
- Uninstalling is the opposite: it undoes all the steps taken in the "Installation process"
        Even if a module is uninstalled, its files remains in the nullos admin
- Packing: this operation is actually very handy when you develop a module.
        It basically prepares a menu for export.
        If you develop your own module, you need to put all the assets in one place (see more about <-developing your modules->).
        
        This is a boring task which must be done on every update.
        
        The pack operation does exactly that for you in one click.
- Remove: some modules can be removed, depending on whether or not they are core modules.
            Core modules can't be removed (beause they belong to the core),
            but non core modules can be removed.
            
            Removing a module means deleting its files. It's destructive.
            
    
    
To learn more about the module code, read the <-ModuleInstaller module-> page.
    
    
- "Pack all": this is a button at the top of the list.
        It's useful to pack all your modules at once if you are developing modules at the same time
        and you cannot remember which modules you've already committed, and which one you have not 
    