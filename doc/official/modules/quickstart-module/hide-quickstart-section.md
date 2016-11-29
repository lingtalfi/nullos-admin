Hide the Quickstart section on the left menu
============================
2016-11-29






The QuickStart module, and the Quickstart section on the left menu are only visible if you are logged with the root account.


If you log in with the admin account, which is the reserved account for your client), then the QuickStart module's features won't be accessible
and the Quickstart section on the left menu will not be visible.


You can also hide the Quickstart section on the left menu by updating the code in the **QuickStartConfig.php** file:

- Open the **app-nullos/class-modules/QuickStart/QuickStartConfig.php** file
- Search for the **showLeftMenuLinks** method
- Update the code so that it returns false



The two screenshots below show the left menu of the **nullos admin** before and after hiding the Quickstart section.



[![hide-quickstart-section-before.png](https://s19.postimg.org/brrtvp8f7/hide_quickstart_section_before.png)](https://postimg.org/image/hspisrv1b/)


[![hide-quickstart-section-after.png](https://s19.postimg.org/pwxmxihgj/hide_quickstart_section_after.png)](https://postimg.org/image/kya4izdnj/)



