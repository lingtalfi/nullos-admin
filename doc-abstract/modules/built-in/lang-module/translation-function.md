Translation function
======================
2016-11-30



The translation function is part of the <-Lang module->.

In nullos, the translation function plays the biggest role in the multi-language system.
 
The translation function is the **__** (double underscore) function.

It is defined in **app-nullos/functions/main-functions.php**.

Its signature is the following:

```php
function __($identifier, $context = 'default', array $tags = [])
```



- identifier: string, represents either the message itself or an identifier of the message (useful to shorten very long messages)
    - note: the __ throws an exception if the identifier is not found. In terms of design, this means:
        - it's impossible to have a non translated identifier left over (unless you let your website throw exceptions) 
        - therefore you can "safely" use short identifiers without encouring the risk that some of them won't be translated and left over as identifiers 
- context: string, the name of the php file in which to find the translations
    - all php translation files are in the **app-nullos/lang/{lang}** directory (more info in the [translation files page](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/lang-module/translation-files.md))
    - note that if you use a slash in your context, it allows you to organize your translation files into subdirectories
- tags: an array of tag symbol => tag value. 
    - a tag, in the translation string, is represented between curly braces                          
    - a tag is a symbolic notation for a variable word in the translation string (for instance: I have {number} cats).
    - a tag symbol doesn't have the curly braces around, see the examples below.
    
    
    
Here are a few examples of how to use the translation function in your code:

```php
echo __("I don't want to subscribe"); // call with the default context 
echo __("I don't want to subscribe", "bad-subscribers"); // call with the 'bad-subscribers' context 
echo __("I have {number} cats", null, ["number" => 6]); // call with the default context, and using tags 
```


There is also a triple underscore (**___**) version of the translation function.



The **___** (triple underscore) function is identical to the **__** ()double underscore) function, except that its output
is passed to the php's **htmlspecialchars** function before being returned.


The **___** (triple underscore) function is designed to work with html attributes.

