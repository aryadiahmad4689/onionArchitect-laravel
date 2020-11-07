<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Billing\Domain\Service\CustomerService;
use Billing\Domain\Repository\CustomerRepositoryInterface;
// use Billing\Domain\Service\CustomerService;
use Billing\Domain\Repository\OrderRepositoryInterface;
use Billing\Domain\Value\Email;
use Billing\Domain\Value\Id;
use Billing\Domain\Value\Name;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    //
    protected $customerService;
    protected $customerRepository;
    protected $orderRepository;
    public function __construct(CustomerService $customerService,CustomerRepositoryInterface $customerRepository,OrderRepositoryInterface $orderRepository)
    {
        $this->customerService = $customerService;
        $this->customerRepository = $customerRepository;
        $this->orderRepositoryInterface = $orderRepository;
    }

    public function index()
    {
       dd($this->customerRepository->getAll());
    }

    public function store(Request $request, $id ='')
    {
        $this->customerService->create(
            new Id($id),
            new Name($request->name),
            new Email($request->email)
        );

        return redirect()->back();
    }
}