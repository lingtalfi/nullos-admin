Configuring the Privilege profiles
==============================
2016-11-30





To configure a [Privilege](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege.md) profile, open the init file (**app-nullos/init.php** if present or **/app-nullos/init-fallback.php** otherwise)
and search for the PRIVILEGE section.

You will find the call to the setProfiles method:

```php
Privilege::setProfiles([
    'root' => [
        '*',
    ],
    'admin' => [],
]);
```


The setProfiles method accepts an array which keys are the profile names, and which values are the list of
granted privileges.

The asterisk (*) is a wildcard which means that all the privileges are granted.

As we can see from the code above, there are two Privilege profiles defined in **nullos admin**:

- The root profile, which is granted every privilege
- The admin profile, which is granted no privilege at all
    - this means the admin can log in the **nullos admin** website, but will be denied any special privilege 
    
    
    
You can create new profiles by adding new entries in the array. 
For instance, the following code adds a Privilege profile named test, which is granted the rights to 
test the feature one privilege and the feature two privilege:



```php
Privilege::setProfiles([
    'root' => [
        '*',
    ],
    'admin' => [],
    'test' => [
        'featureOne',
        'featureTwo',
    ],
]);
```

Of course, the feature one privilege and feature two privilege need to be implemented in your nullos application.


Also, in order to benefit the privileges of the "test" profile, you need to create an account and bind the "test" profile to that account.

See the [Configuring the nullos accounts](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/authentication-module/configuring-nullos-accounts.md) page for more details.


You can also assign existing privileges to a profile.

See the [list of all available privileges](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/privilege/list-of-all-privileges.md). 


