List of Log calls
=====================
2016-12-02




- Boot
    - app-nullos/layout-elements/nullos/modules/boot/boot.php
        - boot.page: when a non pdo exception is throws while processing the form on the boot page
- Crud
    - app-nullos/class-modules/Crud/Form.php
        - crud.pdoException.form.insert: when a pdo exception occurs during an insert
        - crud.pdoException.form.update: when a pdo exception occurs during an update
    - app-nullos/layout-elements/nullos//modules/crud/crud.php
        - crud.page.table: when a file is not found, or the table name invalid
    - app-nullos/layout-elements/nullos//modules/quickstart/sub/crud-generators.php
        - crud.page.generators: when something wrong happens with the crud generators page
	
- SqlTools			
    - app-nullos/layout-elements/nullos/modules/sqltools/sqltools.php
        - sqltools.pdoException: when a pdo exception occurs
        - sqltools.page: when a non pdo exception occurs while executing a sql request	

	
Note: it seems that modules put their name as the namespace

Note2: if you want to see the live list of the log calls of the nullos application, check out the [Nullos info module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/nullosinfo-module.md).
	
	
		