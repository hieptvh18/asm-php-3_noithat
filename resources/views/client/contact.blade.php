@extends('layout.client.master')

@section('page-title','Homepage')

@section('main-content')
 <div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Contact</h2>
                    </div>

                    <form action="#" method="post">
                        <div class="row">
                            
                       
                            <div class="col-12 mb-3">
                                <input type="email" class="form-control" id="email" placeholder="Email" value="">
                            </div>
                            
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control mb-3" id="" placeholder="Fullname" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" id="city" placeholder="Title"    value="">
                            </div>
                           
                            <div class="col-12 mb-3">
                                <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Enter message"></textarea>
                            </div>

                            <button class="btn btn-secondary ml-3">Send</button>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection