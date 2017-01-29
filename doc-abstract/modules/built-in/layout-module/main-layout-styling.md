Main layout styling
=======================
2016-12-30


This is a work in progress.

The intent is to provide help to the nullos developer who wants to re-use the css classes
used by the **nullos admin** website, so that she can integrate her modules in the style of the nullos
admin website.



The nullos admin css files are organized by functionality.
The core files that one can use are at the root of the **www/style** directory:

- style.css
    - technical note:
        - an alert box with a wrench icon, used in the boot module's "init writer" page
    - alert-success     
    - alert-error     
    - alert-info: 
        - this displays a notification
        
        
- admintable.css
- grouped-items.css
- key2value-form.css
- layout.css
- pastel-theme.css
- tabby.css
- infoitem.css
    - an info item is an html table which displays an associative array representing an item.
        It is used by the <-moduleInstaller module->, in order to display a specific module's information



Examples
=============

infoitem.css
----------------

```php
AssetsList::css(url('style/infoitem.css'));
QuickTable::printItem($info, [
    'class' => 'infoitem',
]);
```

 
 
Technical note
-----------------

```php
Goofy::technicalNote(__("This will create/overwrite the {path} file.", LL, ['path' => '<span class="path">app-nullos/init.php</span>']));
```


Alert alert-error, alert-success, alert-info
------------------------
```php
Goofy::alertInfo('A new version of the "module information list" is available.<br>
    <a href="#">Click here to update the list</a>.');
```

