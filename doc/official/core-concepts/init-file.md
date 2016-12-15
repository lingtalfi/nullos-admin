Init file
==============
2016-12-02



The init file contains 
the [core configuration](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/different-types-of-configuration.md) 
of a **nullos admin** application.



Only one **init file** is used by **nullos admin**, either

- the "user" init file **app-nullos/init.php**
- the "fallback" init file **app-nullos/init-fallback.php**, which is only used if the "user" init file is not present
  
  

A fresh install of **nullos admin** only contains the "fallback" init.

The "user" init file can be created manually, or with the 
help of the [Boot module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/boot-module.md).


