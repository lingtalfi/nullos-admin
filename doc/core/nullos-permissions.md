Nullos permissions
=====================
2016-12-20 -- 2016-12-25


The following must be writable:

- **app-nullos** (the <-boot module-> needs to create the **init.php** file at the root of the **app-nullos** directory)
- **app-nullos/assets** (written by some modules)
- **app-nullos/class-modules** (written by the [Saas system](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/module-concepts/saas.md))
- **app-nullos/crud** (written by the [crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module.md))
- **app-nullos/lang** (written by the [linguist module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/linguist-module.md))
- **app-nullos/layout-elements** (written during the installation/uninstallation process, see the <-Module installer-> for more information)
- **app-nullos/log** (written by the [application log module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/applicationlog-module.md))
- **app-nullos/pages** (written during the installation/uninstallation process, see the <-Module installer-> for more information)
- **app-nullos/tmp** (dedicated for modules to write temporary files into)
- **app-nullos/www** (the style directory will be written sometimes during the installation/uninstallation process, see the <-Module installer-> for more information)



