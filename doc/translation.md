Translation
================
2016-11-26



TODO....



In the php files, you store the terms definitions as an array of identifier => translated message.

The identifier can be whatever you want: either the original message, or a shorter identifier.




Benefits of using identifiers include:


- an identifier can also be the message itself
- you can shorten long texts into one keyword, slightly improving the general performances in terms of memory 
- sometimes you need to translate terms that doesn't mean a lot without a context (i.e. name, user). You could add the contextual details on the identifier  (i.e. dbName, dbUser)



Contexts
---------------

blabla