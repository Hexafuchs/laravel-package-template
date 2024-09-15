Installation
============

You can install the package via composer:

.. code-block:: bash

    composer require hexafuchs/:package_slug

You can publish and run the migrations with:

.. code-block:: bash

    php artisan vendor:publish --tag=":package_slug_without_prefix-migrations"
    php artisan migrate

You can publish the config file with:

.. code-block:: bash

    php artisan vendor:publish --tag=":package_slug_without_prefix-config"


Optionally, you can publish the views using

.. code-block:: bash

    php artisan vendor:publish --tag=":package_slug_without_prefix-views"
