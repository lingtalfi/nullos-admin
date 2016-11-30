Overview of the tree structure
===============================
2016-11-30



When you download the nullos repository, you have the following structure:


- app-nullos/
    - class/
    - class-modules/
    - class-planets/
    - crud/
    - functions/
    - lang/
    - layout-elements/
    - log/
    - pages/
    - scripts/
    - www/
    - init-fallback.php

- doc/
- tools/
- README.md



### Permission note
When you work in local, to make development easier, you should grant the permissions to write
to every directory and file, because files will might be generated all over the place. 

You can use regular restrictions in production ()once all your files are generated).




- app-nullos/ is the main directory containing the **nullos admin** application code
- doc/ is the directory containing the repo doc
- tools/ contains some personal tools that I put here as a backup, you should never use them
- README.md is the readme file of the github repository



By far the most important directory is **app-nullos**.

It contains the following:

- class: this directory contains the core class of the **nullos application**
- class-modules: this directory contains the modules class of the **nullos application**
- class-planets: this directory contains the classes that I borrowed from the [universe framework](https://github.com/karayabin/universe-snapshot)
    - I decided that nullos would ship with them natively, to ease the installation process for the nullos users
- crud: this directory is owned by the [Crud module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/crud-module.md)
    - it contains all the **crud files** which are used to display the lists and forms used by the **Crud module**  
- functions: this directory contains the php functions files used by the **nullos application**
- lang: this directory is owned by the [Lang module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/official/modules/lang-module.md)
- layout-elements: this directory is owned by the Layout class, which is part of the core and is responsible for displaying the html of the pages 
    - this directory contains the "layout elements" used by the Layout class 
- log: this directory contains the log (php error_log directive) file(s) of the **nullos application** 
- pages: this directory contains the pages of the **nullos application**, you should create your page in this directory
- scripts: this directory contains scripts that might be used by some modules
- www: this directory is the webserver root, your webserver should point to it, and redirect all virtual uri (uri that don't match an existing php file) to the index.php file
- init-fallback.php: this file is used instead of the init.php file unless the init.php file exist

