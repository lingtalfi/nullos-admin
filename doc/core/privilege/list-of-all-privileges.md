List of all privileges in nullos
=============================
2016-11-30



in nullos, we use the [Privilege framework's namespace convention](https://github.com/lingtalfi/nullos-admin/tree/master/doc/https://github.com/lingtalfi/Privilege#namespace-convention-and-wildcards),
using the module names as the namespace.




- **sqlTools.access**: permission to display the "Execute SQL" menu item in the "Tools" section on the left menu, and to access to the corresponding page  
- **toolsLeftMenuSection.access**: access to the "Tools" section of the left menu
- **boot.access.init**: access to the "Boot" item link in the "Tools" section of the left menu (nullos main layout), and to the corresponding page
- **boot.access.reset**: access to the "Boot" item link in the "Tools" section of the left menu (nullos main layout), and to the corresponding page

TODO: check the following 
- **crud.access.table**: access to the crud generated item links in the "Website" section of the left menu (nullos main layout), and to the corresponding pages
- **crud.access.generator**: access to the "Crud Generators" item link in the "Tools" section of the left menu (nullos main layout), and to the corresponding page
- **quickDoc.access**: access to the "QuickDoc" item link in the "Tools" section of the left menu (nullos main layout), and to the corresponding page
- **iconsViewer.access**: access to the "IconsViewer" item link in the "Tools" section of the left menu (nullos main layout), and to the corresponding page
- **linguist.access**: access to the "Linguist" item link in the "Tools" section of the left menu (nullos main layout), and to the corresponding page


Note: if you want to see the privileges calls in live, check out the [NullosInfo module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/nullosinfo-module.md).


If you're a nullos developer and you're looking for a naming convention for privileges, check out the 
[modules guidelines](https://github.com/lingtalfi/nullos-admin/tree/master/doc/bonus/developer-guidelines/module-guidelines.md).