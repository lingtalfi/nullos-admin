Translation files
======================
2016-11-30



In nullos, the translation files are used by the <-Lang module-> to provide multi-language feature 
to the **nullos admin** website.


The translation files are located in the **app-nullos/lang/{lang}** directory, where {lang} is the name of the lang used.

The default lang is en (english).


Each translation file is a php file, which file name is the **context**.

The context is defined in the <-translation function-> page.


Therefore the full path of any translation file is: **app-nullos/lang/{lang}/{context}.php**, where:

- lang is the current language (handled by the **Lang module**)
- context is the second argument of the **translation function**




The content of a php translation file looks like this:


```php
<?php


$defs = [
    'This is the 404 page.' => 'Ceci est la page 404.',
    "You are lost." => "Vous êtes perdu(e).",
    // ...
];
```


The example code above shows an english to french translation.

As you can see, there is a **$defs** array which contains all the terms and translations.
 
The keys of the **$defs** array are the identifiers (see **translation function** for more details), and the values
are the translated values (in french in the example).


Notice that in this particular example the keys are in english.

Nullos uses english like identifiers, but you can create any identifier you want.

In some cases where the sentence to translate is very long, you can use a short identifier, like in the following example:

```php
<?php


$defs = [
    "lorem" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi venenatis lorem quam, ut lobortis elit commodo sed. Vestibulum velit velit, lacinia non luctus vel, ullamcorper ut lacus. Fusce pretium velit ac dapibus eleifend. Nam imperdiet tincidunt risus non mattis. Suspendisse eleifend, quam at pulvinar tempor, libero sem imperdiet mauris, eget maximus ante neque a dolor. Cras lobortis finibus nibh non faucibus. Fusce malesuada sit amet lectus vel pharetra. Vivamus pharetra, massa quis aliquet lacinia, tortor diam egestas odio, ut venenatis metus urna ut eros. Fusce ornare vitae metus luctus imperdiet. Mauris efficitur luctus sodales. ",
    //
];
```

As you can see, using the "short identifier trick" allows us to have slightly faster and more readable keys. 



