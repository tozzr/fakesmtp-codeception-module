# fakesmtp codeception Module

```yaml
modules:
  enabled:
    - FakeSmtp
  config:
    FakeSmtp
      dir: /home/me/my/fake/mail/dir
```

functions:

```php
$I->resetEmails();

$I->seeInLastEmail($string)
```
