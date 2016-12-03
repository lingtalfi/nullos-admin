IfLayout
===================
2016-12-03



The IfLayout object is a [Layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout.md) object,
with the difference that it checks whether or not a database connexion is set before calling the given **body** layout-element.

If the database connexion is not set, then it will use the generic **app-nullos/layout-elements/nullos/db-required.php** instead.