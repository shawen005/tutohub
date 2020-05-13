@extends('layouts.frontend.index')
    <link rel="stylesheet" href="{{ asset('frontend/css/shopping.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

<main style="margin-top:30px">
 @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="container">
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%">Course</th>
              <th style="width:10%">Price</th>
    
              <th style="width:10%">Action</th>
            </tr>
          </thead>
          <tbody>
             @foreach (Cart::content() as $item)
             <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-10">
                    <h4 class="nomargin">{{ $item->model->course_title  }}</h4>
                    <div>{{ $item->model->details }} </div>
                  </div>
                </div>

                
              </td>


              <td data-th="Price">${{ $item->model->price }} </td>
              
              
              <td class="actions" data-th="">
               
               <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-warning">Remove</button>
                            </form>
     
              </td>
            </tr>
 @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
             
              <td class="hidden-xs text-center"><strong>Total ${{ Cart::subtotal() }}</strong></td>
              <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>
</div>

</main>
@endsection