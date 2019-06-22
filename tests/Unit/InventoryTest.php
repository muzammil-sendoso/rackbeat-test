<?php

namespace Tests\Unit;

use App\Inventory\Counter;
use App\Repositories\TransactionRepository;
use Tests\TestCase;

class InventoryTest extends TestCase
{
	/** @var TransactionRepository */
	protected $repository;

	/** @var Counter */
	protected $counter;

	public function setUp() {
		parent::setUp();

		$this->repository = new TransactionRepository();
		$this->counter    = new Counter( $this->repository );
	}

	public function test_can_calculate_cost_price() {
		$this->repository->create( 10, 10.0 );

		$this->assertEquals( 10.0, $this->counter->calculateCostPrice( 1 ) );
	}

	public function test_can_calculate_cost_price_with_multiple_purchases_and_sales() {
		$this->repository->create( 10, 10.0 );
		$this->repository->create( 10, 20.0 );
		$this->repository->create( -10, 15.0 );

		$this->assertEquals( 15.0, $this->counter->calculateCostPrice( 1 ) );

		$this->repository->create( -4, 6.0 );

		$this->assertEquals( 63.0, $this->counter->calculateCostPrice( 3 ) );
	}

	public function test_can_calculate_total_stock_count() {
		$this->repository->create( 10, 10.0 );
		$this->repository->create( 20, 8.0 );
		$this->repository->create( -10, 0.0 );

		$this->assertEquals( 20, $this->counter->countTotalQuantity() );

		$this->repository->create( -15, 0.0 );

		$this->assertEquals( 5, $this->counter->countTotalQuantity() );
	}

	public function test_can_calculate_total_value() {
		$this->repository->create( 10, 10.0 );
		$this->repository->create( 20, 8.0 );
		$this->repository->create( -10, 5.0 );

		$this->assertEquals( 210.0, $this->counter->calculateTotalValue() );

		$this->repository->create( -15, 1.0 );

		$this->assertEquals( 195.0, $this->counter->calculateTotalValue() );
	}
}
