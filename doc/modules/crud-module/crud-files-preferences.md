Crud files preferences
=========================
2016-12-03


**Crud files preferences** are files used by the [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module.md) in order to control various aspects of the creation of the [crud files](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-files.md).


The **crud files preferences** are auto-generated via the [Crud Generator page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/crud-module/crud-generators-page.md), in the **app-nullos/assets/modules/crud/auto-crud-files-preferences.php** file.


The developer can override all of the **crud files preferences** configuration, or part of it, by creating the **app-nullos/assets/modules/crud/crud-files-preferences.php** file.
 
 
How the auto-generated **crud files preferences** and the user **crud files preferences** are combined is defined in the **CrudFilesGenerator::getPreferences** method.
 
 
The creation of the **crud files** is done by the **CrudFilesGenerator** object.
