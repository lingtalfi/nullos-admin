Install the "oui" test database
===============================
2016-11-30


In some tutorials, we need some data to work with, I generally use the oui database
as a starting point for the tutorials.



I have this nice database in [oui.sql](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/assets/oui.sql).


To install it, open phpMyAdmin and paste the content of **oui.sql** in the SQL tab and press the Go button (see screenshot below).

[![phpmyadmin-import.png](https://s19.postimg.org/8k9uvzo4j/phpmyadmin_import.png)](https://postimg.org/image/ng8e3kzj3/)


Another way to do it, perhaps faster, is to use the following command line:

```bash
mysql -uroot -proot < oui.sql
```

If you are curious, here is what it looks like, using the MysqlWorkBench software: [oui schema](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/assets/db.png)




Related
==============
- [Install nullos on your machine](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-nullos-on-your-machine.md)
- [Install the "oui" test database](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-oui-database.md)
- [Getting started with nullos](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/getting-started-with-nullos.md)