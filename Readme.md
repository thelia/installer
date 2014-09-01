# Custom installer for [Composer](http://getcomposer.org)

This installer allows you to install module and templates using composer. We created special ```type``` for Thelia

You can now create module and submit them on [packagist.org](http://packagist.org)

List of special types :

- ```thelia-module``` => install your module in ```local/module```
- ```thelia-frontoffice-template``` => install your template in ```templates/frontOffice```
- ```thelia-backoffice-template``` => install your template in ```templates/backOffice```
- ```thelia-email-template``` => install your template in ```templates/email```
- ```thelia-pdf-template``` => install your template in ```templates/pdf```

## Example ```composer.json``` file

```json
{
    "name": "thelia/hooktest-module",
    "type": "thelia-module",
    "require": {
        "thelia/installer": "~1.0"
    }
}
```

This would install your module in ```local/modules/hookstest-module```

You certainly notice that ```hooktest-module``` is not a valid name for a Thelia module. In fact [packagist.org](http://packagist.org) doesn't allow
package in uppercase. For fixing this, you must use an extra param in your composer.json

```json
{
    "name": "thelia/hooktest-module",
    "type": "thelia-module",
    "require": {
        "thelia/installer": "~1.0"
    },
    "extra": {
        "installer-name": "HookTest"
    }
}
```

With this new section, your module will be install now in ```local/modules/HookTest```