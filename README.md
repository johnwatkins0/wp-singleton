# wp-autoloader

Registers an SPL autoloader that loads classes, interfaces, and traits using WordPress file naming conventions.

## Example

```
| functions.php
| inc
    class-my-class.php
    trait-my-trait.php
    interface-my-interface.php
```

```PHP
<?php

namespace My_Namespace;

class My_Class implements My_Interface {
    use My_Trait;
}

```

```PHP
// functions.php

register_wp_autoload( 'My_Namespace', __DIR__ . '/inc' );
```
