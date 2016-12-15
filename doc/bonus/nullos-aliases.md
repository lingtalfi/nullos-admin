Nullos aliases
==================
2016-11-30



Here are some aliases for your **.bash_profile**.


```bash
nullosPath="/pathto/php/projects/nullos-admin/app-nullos"

# monitor the php error log file
alias nulp='tail -f -n 100 "$nullosPath/log/php.err.log"'

# monitor the nullos application log (from class/Logger and using class-modules/ApplicationLog/ApplicationLogModule)
alias null='tail -f -n 100 "$nullosPath/log/nullos.log"'
```