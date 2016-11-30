Logger
===============
2016-11-30



In nullos, logging is used to intercept error messages that are not supposed to happen.


The class responsible for the logging is Logger (**app-nullos/class/Logger.php**).


**Logger** has one method: log, which looks like this:

```php
public static function log($msg, $targetIdentifier = null)
    {
        if (true === Helper::isLocal()) {
            a("LOGGER");
            az(func_get_args());
        } else {
            // put your logging code here...
        }
    }
```

As you can see, its default behavior is to complain out loud in development, but the production implementation
is left to you.