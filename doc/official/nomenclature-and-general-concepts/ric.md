Ric
======================
2016-11-30


Ric is a term used by the [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module.md).


It stands for row identifier columns, and is basically the equivalent of a sql primary key.

In other words, the ric is the set of columns which allow to identify any row uniquely.

The ric is an array.
 
Typically, when a table has a column named id, the ric contains only that column (as the id suffices to identify any row in a unique manner
for a given table).


In the nullos documentation, the term ric can refer to either of those definitions, depending on the context:

- array which values are the name of the ric columns
- array which keys are the name of the ric columns, and which values are the values of the ric columns for a given row (aka ric values)

