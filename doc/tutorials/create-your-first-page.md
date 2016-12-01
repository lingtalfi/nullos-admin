Create your first page
========================
2016-11-30



Hello friends, in this tutorial you learn how to create a page, and how to create a link to that page in the left menu.

The final result will look like this.

[![create-page-final-result.png](https://s19.postimg.org/3medba9k3/create_page_final_result.png)](https://postimg.org/image/ssfbi4au7/)



Table of content
----------------------
- [Install the nullos package](#install-the-nullos-package)
- [Create the page](#create-the-page)
- [Create a menu link](#create-a-menu-link)
- [Conclusion](#conclusion)




Install the nullos package
=============================

To install the nullos package on your machine, please follow the instructions on the [Install nullos on your machine tutorial](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/install-nullos-on-your-machine.md).

I will be waiting for you :)






Create the page
==================


First thing first: let's create the page.

In nullos, all the pages are located in the **app-nullos/pages** directory.

- Create the **app-nullos/pages/myPage.php** file and put the following code in it:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
</head>

<body>
Hello there, this is my page.
</body>
</html>
```


We've just created a page, but now we need to access it.

This is done by telling the [router](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/routing.md) that our page exists.


- Open the **app-nullos/www/index.php** file (which contains the router)
    - in the ROUTER section, find the **$uri2pagesMap** variable
    - add this entry to the **$uri2pagesMap** array:
    
    
```php
'/mypage' => 'myPage.php',    
```    

Now the router is configured.

- Open your browser and open the **http://nullos-admin/mypage** page.
    - you should see your page (see screenshot below)
    
    
[![mypage-free.png](https://s19.postimg.org/jyof10nvn/mypage_free.png)](https://postimg.org/image/cip5f8067/)


Granted, not the best design in the world, but the point is that with a little more time, we could build anything we want.


But let's say we want to create a page that looks more like a default **nullos page**.

In order to do that, we can use the [Layout](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/layout.md) object provided by the nullos application.


- Open the **app-nullos/pages/myPage.php** file again and replace its content with the following:


```php
<?php


Layout::create()->setElementFiles([
    'body' => "mypage.php",
])->display();

```

- The code above tells the Layout object to display the html page using the **mypage.php** file as the **body** element
    - when you use a layout, you need to know which **layout elements** it uses, and provide each of them
    - luckily in the the case of the nullos main layout, there is only one element called **body**
- Create a **app-nullos/layout-elements/nullos/mypage.php** file and put the following content in it:
   
   
```txt
Now we're talking!
``` 


- Refresh your browser, you should see the left menu on the left, and your page content on the right pane (see screenshot below)


[![mypage-with-layout.png](https://s19.postimg.org/qrorxaeoz/mypage_with_layout.png)](https://postimg.org/image/559rg9g4f/)

     
     
Nice, but let's take this a step further.
     
- Open the **app-nullos/layout-elements/nullos/mypage.php** file again, and replace its content with the following:

```html
<div class="freepage tac">
    <h3>This is my page</h3>
    <p>
        I'm some random text.
    </p>
    <div class="alert-success alert">
        I'm a success alert
    </div>
    <div class="alert-error alert">
        I'm an error alert
    </div>
    <h3>What would a website be without a lorem paragraph?</h3>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, architecto at cumque delectus dolorum eius iure maiores mollitia nihil, nobis reiciendis voluptatem. Accusamus commodi consequuntur dolorem excepturi iusto officia ratione?
    </p>
    <div class="alert-success alert flexc">
        <?php Icons::printIcon("done", "green", 48); ?> I'm a success alert with an icon
    </div>
    <div class="technical-note icon-box">
        <div>
            <span><?php Icons::printIcon('build'); ?></span>
            <span class="text">
                I'm an icon box
            </span>
        </div>
    </div>
</div>
```


- Refresh your browser and you should see some formatted content (see screenshot below)
     
     
     
[![mypage-with-formatted-layout.png](https://s19.postimg.org/9pvxv6ztv/mypage_with_formatted_layout.png)](https://postimg.org/image/b4xijx0wv/)
     
     
As you can see, we now have applied a basic formatting to our page.
     
The styles used in this page come from the nullos style.css file (**app-nullos/www/style/style.css**).
     
As everything with nullos, feel free to play with the code and add your own styles if you find that the nullos default
is too limiting.
     
     
  

Create a menu link
========================

Now that our page is created, we need a link to call the **/mypage** uri.


The method responsible for displaying the links on the left menu of the main layout in nullos is **Bridge::displayLeftMenuBlocks**.

The [Bridge](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/core-concepts/bridge.md) object
is located in **app-nullos/class/Bridge.php**.

To do it the nullos way, we are going to create a [module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules.md)
which will subscribe to the displayLeftMenuBlocks method.

- Create a **app-nullos/class-modules/MyPage** directory
- Create a **app-nullos/class-modules/MyPage/MyPageModule.php** file and put the following code in it:

```php
<?php


namespace MyPage;


class MyPageModule
{
    public static function displayLeftMenuLinks()
    {
        ?>
        <section class="section-block table-links">
            <h3>My Page</h3>
            <ul class="linkslist">
                <li>
                    <a href="/mypage">My page</a>
                </li>
            </ul>
        </section>
        <?php
    }
}
```

Now that our module is created, let's hook it into Bridge.

- Open the **app-nullos/class/Bridge.php** file, and search for the displayLeftMenuBlocks static method
    - Add the following line at the end of this displayLeftMenuBlocks method:


```php
MyPageModule::displayLeftMenuLinks();
```

- Add the following line at the top of the Bridge file if it has not already been added by your editor:

```php
use MyPage\MyPageModule;
```


- Now refresh the page in your browser: Tadaa! you should now see the same screen as the screenshot at the top of this tutorial
     
     
     
Conclusion
=============

Now you know how to create a page, with or without using the nullos main layout.

You also how to add your own links in the left menu provided by the nullos main layout.













Related
------------
- [Getting started with nullos](https://github.com/lingtalfi/nullos-admin/tree/master/doc/tutorials/getting-started-with-nullos.md)
