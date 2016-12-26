FrontOne: Articles page
=======================
2016-12-25


[![front-one-articles.png](https://s19.postimg.org/fnybcm3tv/front_one_articles.png)](https://postimg.org/image/fb6x6fljz/)



It contains one list of articles, and one edit form.

- Active: 0|1, 0 means that the article will not be shown in the menu
- Position: number: the relative position of the article in the menu (starting at 0)
- Protected: whether or not the system is allowed to remove the files of the article 
        when the "Delete" button is clicked.
        For some reasons, I decided that the "Articles" that come by default
        could not be removed
        


Articles
==============

Articles are located in the **app-vitrine-one/articles** directory, which itself contains:

- the articles (php files at the root)
    - use those files to configure your article (i.e. make it protected/unprotected, choose the title, ...)
- the **models/** directory (you can use a model when creating/editing an article with the gui)
- the **content/** directory, which actually contains the content of the article
    - use those files to edit the content directly (or use the gui otherwise)
    
    
A nice thing is that you have two ways to edit the articles:

- using the files directly (in **app-vitrine-one/articles**)
- using the gui articles page


Note: The gui is synced automatically (it reads the files in the filesystem dynamically).













