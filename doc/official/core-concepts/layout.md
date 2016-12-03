Layout
===============
2016-11-30 -- 2016-12-03


The Layout object is a helper object.

It helps creating the <-nullos main layout-> todo.

It is used by most **nullos admin** pages and therefore gives a general consistent look to the **nullos admin** website.


The code for the Layout object can be found in **app-nullos/class/Layout.php**.



Layout elements
---------------------

Elements of the layout that are common to every page are coded directly inside the Layout object.

Elements that vary from page to page are called **layout-elements** and are provided by the developer who uses the Layout object.

In other words, when you use a Layout object, you also need to provide all the **layout-elements** defined by this Layout object.

By convention, the **layout-elements** are files located in the **app-nullos/layout-elements** directory.

Therefore, when you use the Layout object, you only need to provide the paths to the layout-elements files that you want to use.

