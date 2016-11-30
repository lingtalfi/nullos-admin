Configuring the nullos accounts
===================================
2016-11-30




You can bind a pseudo/password pair to a [Privilege profile](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege/privilege-profile.md).

When you do so, this actually creates a [nullos account](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/nomenclature-and-general-concepts/nullos-account.md) to which a user can log in, and which is granted the privileges
of the Privilege profile.


To manage such a nullos account, do the following:

- open the **app-nullos/class-modules/Authentication/AuthenticationConfig.php** configuration file
    - search for the getCredentials method, which looks like this:
    
    
```php
  public static function getCredentials()
    {
        return [
            'root:root' => 'root',
            'admin:admin' => 'admin',
        ];
    }
```   

As you can see, the getCredentials method returns an array.

You can change the array to your likings to create/configure the **nullos accounts**.

Each entry of the array represent a **nullos account**.

The key is the pseudo/password pair separated by a colon character (your pseudo shouldn't contain a colon character).

The value is the name of the **Privilege profile** you want to bind the account to (and so if the user logs in with 
the correct pseudo/password pair, she will be granted the privileges specified in that **Privilege profile**).


