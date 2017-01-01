Module Repository System
==========================
2016-12-30



At this point in time, I want to be able to download modules from the web.

Here is the system I imagined.


The module info list
=======================

There is a gui provided by the [ModuleInstaller module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/moduleinstaller-module.md).

It displays two tabs:

- the list of the modules on your application's filesystem
- the "import modules from the web" tab
    - this is basically a gui that allows you to search for modules available on the web
    - as for now, I'm only using ONE repository for all the modules (I believe it makes things simpler
            but that remains to be proven), so this means potential third party authors have to 
            commit to this repository to share their modules...


On the web, there is a repository of modules which contains a list of 
modules information (version, author, description, instructions on how to download the module, ...).

This list of modules information is enough to display the second tab (the search tab).
Therefore, it's useful to have it on the local machine rather than on the net.

That's a very important observation, as my design is built on it.

In fact, every time the gui is displayed, the first thing it does is compare the
distant list of module information (from the repository) with one it has in cache.

This check operation has to be fast, and is done using a simple mechanism:
the distant module repository has an id.txt file which contains a simple number 
that increments every time the list is updated.
 
The gui keeps track of that number to know whether or not it's out of sync or if it has the latest
version of the module info list.


When a new list is available on the web, the gui displays a link for the user (i.e. it offers
the user the choice to update the local list, or to remain out of sync).

If the user clicks the link, then the new list is downloaded.

After having said all that, what remains is that basically the gui always work along 
with a local copy of the module info list.


downloading module files
=======================

I believe there are two types of users:

- those who prefer to download modules one by one
- those who prefer to download all modules at once in a cache, and then copy modules from the cache


My system should adapt both needs.
One can cache a whole repository at once, and/or every downloaded module get cached automatically,
and there is an option to force the re-download from the web (in case the cache get stale or something).
 






The module info file
========================

This file contains information about the module.
You can add any information you want for your own needs, but the following
are the one used by the gui of the <-moduleInstaller module->.

- version: the version number of the module, if any
- description: a succint description of the module (about 150 chars)
- author: the name of the author
- releaseDate: the date the module was first released (format yyyy-mm-dd)


The name of the file is **module-info.yml** and it contains <-babyYaml-> code.

Here is an example module info file:

```yaml
version: 1.0.0
description: <
With Counter, you know how many times your website has been seen.
The front end collects every page refresh, and the backend provides a gui to see the statistics.
>
author: lingtalfi
releaseDate: 2016-12-30
```