ApplicationLog module
========================
2016-12-02



The ApplicationLog module provides one method: **log**, which basically quietly logs any error passed to it to the
**app-nullos/log/nullos.log** file.



The ApplicationLog module is located in **app-nullos/class-modules/ApplicationLog**, and is the default logging strategy
of a fresh nullos application.

See the **Logger::log** implementation of the <-Logger-> for more details.



Related
===========
- <-Configuring the log path->