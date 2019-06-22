# Test

Test file: `tests/Unit/InventoryTest.php`

We have a repository (`App\Repositories\TransactionRepository`) which pretends to be a simple database, as a Collection of transactions.

We also have a Counter (`App\Inventory\Counter`) which will contain the logic you'll be creating.

## Submitting the test & Rules

1. Remember to initiate git!
2. Use git commits for changes.
3. Create a new repository on any git service (Github, Bitbucket, Gitlab, etc.) - *can* be private, invite: lra@rackbeat.com or username LasseRafn
4. Push to the repository
5. Respond to our mail with a link to the repository + invitation if private.

## Logic for `App\Inventory\Counter`

We will be calculating the average `cost price` for `X` quantity. 

### Example 

So if we have a total value of 1000, and quantity of 10 — getting the cost price of 5 items would return 500, since 5 is half the items, and 500 is half the value.

| Quantity  	| Price             	| Value       	|
|-----------	|-------------------	|-------------	|
| 10        	| 100               	| 1000        	|
| 5         	| 20                	| 100         	|
| -2        	| 10                	| -20         	|
| 15        	| 500               	| 7500        	|
| -8        	| 125               	| -1000       	|

| Total Quantity  	| Price For 10             	| Total Value       	|
|-----------	    |-------------------	    |-------------	        |
| 20        	    | 3750              	    | 7500        	        |

### Methods
1. `countTotalQuantity` should return the total summed quantity of all transactions.
2. `calculateCostPrice` should return the price for the `$quantity` passed to it. 
3. `calculateTotalValue` should return the total value for all transactions. Help: `$transaction->quantity * $transaction->unit_cost_price`

#### More info on `calculateCostPrice`

If we pass a `$quantity` of 10, we should have returned the cost price of 10 items.  

## Setup 

```bash
composer install
```

## Run tests

```bash
vendor/bin/phpunit
```

## Questions?

In case the task has not been described properly, let me know: lra@rackbeat.com :)