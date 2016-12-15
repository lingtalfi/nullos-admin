Bridge
===============
2016-11-30


The Bridge is a helper for nullos module developers.

In nullos, the Bridge is a bridge between the nullos core and the [modules](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules.md).

It implements a communication model where modules subscribe to a service provided by the core in one well defined and centralized location (the Bridge).


For instance, modules might want to write links in the left menu.

Rather than searching for the concrete class responsible for writing the left menu items, the module developer knows that she can hook into the 
Bridge::displayLeftMenuBlocks method (which will in turn be called by the concrete class responsible for writing the left menu items when appropriate).
 
 

The benefits of using this pattern are:

- it's easier to remember the object that needs to be hooked (it's always the Bridge)
- all subscriptions are centralized in one place



the Bridge design
-------------

The Bridge class itself is in **app-nullos/class/Bridge.php**.


It contains two main sections:

- Application services
- Instances preparation



The "Application services" section contains the services that modules can subscribe to.

The "Instances preparation" section is explained later.



If you know what a service container is, the Bridge is designed to act as a simplified service container.


The Bridge is designed to accept static or dynamic subscribers.

A static subscriber is a static method.

The code below might help understanding the concept of static subscriber (excerpt from the Bridge code).

```php
    public static function displayLeftMenuBlocks() // this is a bridge service
    {
        QuickStartModule::displayLeftMenuLinks(); // this is a static subscriber
        CrudModule::displayLeftMenuLinks(); // this is another static subscriber
    }
```

Making static subscriptions is easy for a module developer, because there is just one line of code to type.


The Bridge provides a mechanism to keep your dynamic instances in memory.

Which means upgrading this non optimized imaginary code:

```php
    public static function displayLeftMenuBlocks() // this is a bridge service
    {
        // this is an imaginary dynamic subscriber, the problem is that the instance 
        // is recreated on every call to the displayLeftMenuBlocks service
        $o = new MyModule/TemplateTool();
        $o->displayLeftMenuLinks();
    }
```

into this optimized imaginary code:

```php
    public static function displayLeftMenuBlocks() // this is a bridge service
    {
        // with the code below, thanks to the getInstance method, the instance is created only the first time,
        // then subsequent calls to the Bridge::displayLeftMenuBlocks method will RE-USE the same instance 
        self::getInstance('TemplateTool')->displayLeftMenuLinks(); 
    }
    
    //--------------------------------------------
    // INSTANCES PREPARATION
    //--------------------------------------------
    // this is a method that you need to add when using dynamic subscription 
    private static function getTemplateTool() 
    {
        return new MyModule/TemplateTool();
    }    
```


With the above code, the Bridge will call the getTemplateTool static method (get + TemplateTool).
 
So, in order to make the above code work, you need to add 
an extra getTemplateTool private static method in the Bridge, in the "Instances Preparation" section (that's the reason why 
this section exist), and which returns the instance of your class that you want.








