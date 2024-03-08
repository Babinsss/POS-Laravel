@extends('layouts.admin')

@section('content-header', 'Dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="card bg-purple">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3>{{$products_count}}</h3>
              <p>Total Products</p>
            </div>
            <i class="fas fa-dolly-flatbed fa-3x"></i>
          </div>
        </div>
        <a href="{{route('products.index')}}" class="card-footer text-white d-flex justify-content-between">
          <span>More Info</span>
          <span><i class="fas fa-arrow-circle-right"></i></span>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card bg-primary">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3>{{$orders_count}}</h3>
              <p>Orders Count</p>
            </div>
            <i class="fas fa-chart-line fa-3x"></i>
          </div>
        </div>
        <a href="{{route('orders.index')}}" class="card-footer text-white d-flex justify-content-between">
          <span>More Info</span>
          <span><i class="fas fa-arrow-circle-right"></i></span>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card bg-green">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3>{{config('settings.currency_symbol')}} {{number_format($income, 2)}}</h3>
              <p>Total Income</p>
            </div>
            <i class="fas fa-dollar-sign fa-3x"></i>
          </div>
        </div>
        <a href="{{route('orders.index')}}" class="card-footer text-white d-flex justify-content-between">
          <span>More Info</span>
          <span><i class="fas fa-arrow-circle-right"></i></span>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card bg-teal">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3>{{config('settings.currency_symbol')}} {{number_format($income_today, 2)}}</h3>
              <p>Today's Income</p>
            </div>
            <i class="fas fa-money-check-alt fa-3x"></i>
          </div>
        </div>
        <a href="{{route('orders.index')}}" class="card-footer text-white d-flex justify-content-between">
          <span>More Info</span>
          <span><i class="fas fa-arrow-circle-right"></i></span>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card bg-red">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3>{{$customers_count}}</h3>
              <p>Total Customers</p>
            </div>
            <i class="fas fa-users fa-3x"></i>
          </div>
        </div>
        <a href="{{ route('customers.index') }}" class="card-footer text-white d-flex justify-content-between">
          <span>More Info</span>
          <span><i class="fas fa-arrow-circle-right"></i></span>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection