Logger
===============
2016-11-30



In nullos, logging is used to intercept error messages that are not supposed to happen.


The class responsible for the logging is Logger (**app-nullos/class/Logger.php**).


**Logger** has one method: log, in which you can hook into your own log strategy.

By default, Logger uses a module named [ApplicationLogModule](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/applicationlog-module.md) (**app-nullos/class-modules/ApplicationLog**), which basically
logs quietly every message to the **app-nullos/log/nullos.log** file.




Related
-------------
- [List of log calls](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/logger/list-of-log-calls.md)
- [Nullos aliases](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/nullos-aliases.md)