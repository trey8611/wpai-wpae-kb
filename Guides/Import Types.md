## A description of import types

- New Items Import -

This is primarily used to create and manage products. It keeps internal track of the products that it imports, 
which means that it can later update/create/delete products as they're changed/added/removed in your import file. 
It's also the only import type that can add/remove variations for variable products.

One limitation of new items imports is that cannot detect/update products that it didn't previously create.

- Existing Items Import -

This is primarily used to update specific data (e.g., stock/price) for products that already exist (created 
manually or by other imports). This import type does not keep internal track of the products it imports, so 
it cannot delete missing products from the file. It also can't maintain the relationship between parent products 
and their variations, so it can't be used to add variations to existing products.

If you're updating variations with this import type, you should make extra sure that these data points are not 
being updated in the import settings: https://d.pr/nwqacy.

## Here is an explanation of what each kind of import can and can't do:

A "New Items" import **can**:
- Create products.
- Update products that it created itself.
- Delete products (that it created itself previously) when they don't exist in the import file that is in use for the import.
- Add new variations to existing WooCommerce Products (using this option: https://d.pr/i/DoJKHL).

A "New Items" import **can't**:
- Update products that it did not create (whether they were manually created or created by another import).
- Delete products that it did not create (whether they were manually created or created by another import).
- Reference the Unique Identifier for another import.

An "Existing Items" import **can**:
- Create new products (though I would advise using a "New Items" import to create products instead, due to what that import type can do).
- Update products that it did not create itself (since it does not reference an identifier of its own, but rather, matches records by Title, Content, Custom Field or Post ID).

An "Existing Items" import **can't**:
- Delete products that don't exist in the import file.
- Reference the Unique Identifier for another import (it is meant to match records by one of the four options mentioned above).
- Add new variations to existing WooCommerce Variable Products.