@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-8 offset-2">
    @include('components.alert')
    <div class="card">
      <div class="card-header">
        My Camps
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <td>User</td>
              <td>Camp</td>
              <td>Price</td>
              <td>Register Data</td>
              <td>Paid Status</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @forelse($checkouts as $c)
            <tr>
              <td>{{$c->User->name}}</td>
              <td>{{$c->Camp->title}}</td>
              <td>{{$c->Camp->price}}</td>
              <td>{{$c->created_at->format('M d Y')}}</td>
              <td>
                @if($c->is_paid)
                  <span class="badge bg-success">Paid</span>
                @else
                <span class="badge bg-warning">Waiting</span>
                @endif
              </td>
              <td>
                @if(!$c->is_paid)
                <form action="{{route('admin.checkout.update', $c->id)}}" method="post">
                  @csrf
                  <button class="btn btn-primary btn-sm">Set To Paid</button>
                </form>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6">No Camps Registered</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection