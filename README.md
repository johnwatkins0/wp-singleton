# wp-singleton

A singleton trait for use in WordPress projects

## Example

```PHP

use JohnWatkins0\WPSingleton\Singleton;

class My_Class {
    use Singleton;

    protected function init() {
        // Do stuff when the object is first created.
    }
}

My_Class::get_instance(); // Retrieve an instance.
My_Class::get_instance(); // Same instance as above.
new My_Class(); // Error.

```
