Linguist module
===================
2016-12-19



- [Linguist module](#linguist-module)
- [The Linguist gui](#the-linguist-gui)


The Linguist module is a tool which helps creating a multi-language **nullos admin** website.


[![linguist.png](https://s19.postimg.org/it030hbz7/linguist.png)](https://postimg.org/image/vke96zlr3/)


This is basically a personal tool that I built in order to speed up the translation process
of the nullos admin website.

Then, I decided that it was interesting enough to become a public module.


The Linguist gui
=================
2016-12-19

The "Linguist" module helps translating the nullos admin website from one language to another.


It basically offers a gui with the following features:

- edit the [translation files](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module/translation-files.md) (see [Lang module](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module.md))
- import the translations from one lang to another
- display the translations from any given code file


In order to do so, the Linguist uses the [tabby tabs](https://github.com/lingtalfi/nullos-admin/tree/master/doc/core/layout/tabby.md) system with 4 tabs:

- config
    - define the reference lang, which is used to export translations to another language
        - usually the reference lang is english
- help
    - a link to this documentation
- translate
    - the gui tool to interact with the [translations files](https://github.com/lingtalfi/nullos-admin/tree/master/doc/modules/lang-module/translation-files.md) directly
        - it has various filters, one of them shows only translations that are different
                the reference language (i.e. the untranslated messages)
    - it can do nice things like exporting all the identifiers from the reference lang to another
- tools
    - extract the translation messages from your php code (helper to write the translation files)



[![linguist.png](https://s19.postimg.org/it030hbz7/linguist.png)](https://postimg.org/image/vke96zlr3/)







