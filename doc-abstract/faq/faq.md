Faq
============
2016-12-30





How to make an http redirection 302?
---------------------------------------

When you are inside the layout, how do you make an http redirection?

```php
HttpResponseUtil::redirect("/my/url"); // the website absolute url will be automatically prepended
```

This will actually clean all the ob buffers, and make a regular http redirection
using the php location header.



How to make a div that shows progress steps in live?
---------------------------------------------
You can use the LiveSteps helper from the Layout module.
Find implementation indications in that class.
 




