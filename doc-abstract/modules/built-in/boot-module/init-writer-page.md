Init writer page
====================
2016-12-19


The "Init writer" page's goal is to create the **app-nullos/init.php** file.

The "Init writer" page is special because it will be shown until the init file is created
 (this is hardcoded in the nullos router in the **app-nullos/www/index.php** file).
 
Note: you can also create the init file manually, if you prefer to do so.


The "Init writer" page contains one form which contains the info needed for writing
the init file. It looks like the screenshot below.

<!-boot-page->






The form contains the following fields:


- Website Information
    - Language: the default lang of the **nullos admin** website.
        - if you use the <-lang module-> (multi-language), then technically it is the language identifier used by default for the translations
    - Website name: the name of the website
        - can be used in various places like the html page title, the content of the left banner at the top of the left menu
        - is used in the home page
        - is used in the login page
    - Time zone: the timezone of your current location 
        - the time zone is used by the <-ApplicationLog module-> for writing a log entry's header (see the <-Logger-> for more details)
- Database information
    - Name: the name of the main database used by the front website
    - User: the user of the main database used by the front website
    - Password: the password of the main database used by the front website
    
