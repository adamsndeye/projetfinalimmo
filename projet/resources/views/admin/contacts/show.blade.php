
@extends('admin.layouts.layoutadmin')

@section('content')

   <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-8 col-md-12">
                        <div class="white-box">
                              <h3 class="box-title mb-0 ">Message</h3>
                            <div class="user-btm-box mt-5 d-md-flex">
                                 <div class="mail-contnet">
                                        <h5>{{$contact->nom}}</h5><span class="time">{{$contact->created_at}}</span>
                                        <br>
                                        <div class="mb-3 mt-3">
                                            <span class="mail-desc">{{$contact->message}} </span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
                
            </div>
                

 @endsection