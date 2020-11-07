<?php

namespace App\Providers;

use App\Customer;
use App\Order;
use Illuminate\Support\ServiceProvider;
use Billing\Domain\Repository\CustomerRepositoryInterface;
use Billing\Persistence\CustomerRepository;
use Billing\Domain\Repository\OrderRepositoryInterface;
use Billing\Persistence\InvoiceRepository;
use Billing\Persistence\OrderRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Eloquent\Model;

class BillingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
	{
		$this->registerCustomerRepository();
		$this->registerOrderRepository();
		$this->registerInvoiceRepository();
	}
	
	private function registerCustomerRepository()
	{
		$this->app->singleton(CustomerRepositoryInterface::class, function ($app) {
			return new CustomerRepository($app[EntityManagerInterface::class]);
		});
	}

	private function registerOrderRepository()
	{
		$this->app->singleton(OrderRepositoryInterface::class, function ($app) {
			return new OrderRepository($app[EntityManagerInterface::class]);
		});
	}

	private function registerInvoiceRepository()
	{
		$this->app->singleton(InvoiceRepositoryInterface::class, function ($app) {
			return new InvoiceRepository($app[EntityManagerInterface::class]);
		});
	}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}