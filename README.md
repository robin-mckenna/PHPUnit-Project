# Zend Project

## Creating Modules

- Create module with detault directory structure
- Add module to autoload section of composer.json

- Ensure Composer updates its autoload rules
`$ composer dump-autoload`

- Create `module/{moduleName}/config/module.config.php` and add boilerplate code

- Inform the application about our new module
    - Register module in `config/modules.config.php`

## Routing

Routing is performed in the modules module.config.php

## Database Setup

- Using sqlite create `{database}.db` in the data directory
- Create sql schema script to drop, create and insert