# fakesmtp codeception Module

```yaml
modules:
  enabled:
    - FakeSmtp
      mail-dir: /home/me/my/fake/mail/dir
```

functions:

```php
$I->resetEmails();

$I->seeInLastEmail($string)
```
