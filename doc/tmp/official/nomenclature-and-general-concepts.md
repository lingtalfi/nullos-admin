Nomenclature and general concepts
==================================
2016-11-28



List of nullos specific terms
----------------------------------



- <-ric->




### ric

row of identifying columns.

The ric is the equivalent of the primary key in sql, which means it's the minimal set of columns that
allow to identify any entry of a given table in an unique manner.

In terms of code, it's an array containing either:

- the name of the ric columns
- the name (as keys) and values (as values) of the ric columns


Both are called ric; the context determines which version is used.
 
There is also the "ric string", which is a string containing only the values of the ric separated by
a special symbol called ricSeparator, which is --*-- by default (two dashed, an astersk, two dashes).

The "ric string" is passed by the url and allows an update form to retrieve the data of the row identified by the ric.


