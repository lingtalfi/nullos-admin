Spirit
===============
2016-11-30


The Spirit class is in **app-nullos/class/Spirit.php**.
 
The goal of the Spirit object is to make configuration variables available to the whole system.

It's like defining some constants in the init file, except that constants cannot change, whereas we can alter
the Spirit variables whenever we want.


Nullos core uses the following variables:



- uri: contains the current uri (for instance **/**), matched by the [Router](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/routing.md) 
- ricSeparator: used by the [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module.md) to separate the [ric](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/ric.md) values


