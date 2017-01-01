Nullos permissions
=====================
2016-12-20 -- 2016-12-25


The following must be writable:

- **app-nullos** (the <-boot module-> needs to create the **init.php** file at the root of the **app-nullos** directory)
- **app-nullos/assets** (written by some modules)
- **app-nullos/class-modules** (written by the <-Saas system->)
- **app-nullos/crud** (written by the <-crud module->)
- **app-nullos/lang** (written by the <-linguist module->)
- **app-nullos/layout-elements** (written during the installation/uninstallation process, see the <-Module installer-> for more information)
- **app-nullos/log** (written by the <-application log module->)
- **app-nullos/pages** (written during the installation/uninstallation process, see the <-Module installer-> for more information)
- **app-nullos/tmp** (dedicated for modules to write temporary files into)
- **app-nullos/www** (the style directory will be written sometimes during the installation/uninstallation process, see the <-Module installer-> for more information)



