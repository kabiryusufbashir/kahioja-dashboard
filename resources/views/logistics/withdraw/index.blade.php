@extends('layouts.logistics') 

@section('content')

					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">My Withdraws</h4>
										<ul class="links">
											<li>
												<a href="{{ route('logistics.dashboard') }}">Dashboard</a>
											</li>
											<li>
												<a href="{{ route('logistics-wt-index') }}">My Withdraws</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">
									    @include('includes.admin.form-success')
										<div class="row mb-4">
										    <div class="col-md-12 d-flex justify-content-center">
										        <strong>{{__("Available Balance: ₦")}}{{ Auth::guard('logistics')->user()->current_balance }}</strong>      
										    </div>
										</div>
										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
						                                <th>Withdraw Date</th>
						                                <th>Bank Name</th>
						                                <th>Account No</th>
						                                <th>Account Name</th>
						                                <th>Amount</th>
						                                <th>{{ __("Charges") }}</th>
						                                <th>Status</th>
														</tr>
													</thead>

												<tbody>
                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td>{{date('d-M-Y',strtotime($withdraw->created_at))}}</td>
                                    <td>{{$withdraw->bank_name}}</td>
                                    <td>{{$withdraw->iban}}</td>
                                    <td>{{$withdraw->acc_name}}</td>
                                    <!-- @if($withdraw->method != "Bank")
                                        <td>{{--$withdraw->acc_email--}}</td>
                                    @else
                                        <td>{{--$withdraw->iban--}}</td>
                                    @endif -->
                                    <!--<td>{{$sign->sign}}{{ round($withdraw->amount * $sign->value , 2) }}</td>-->
                                    <td>{{$sign->sign}}{{ $withdraw->amount - $withdraw->fee }}</td>
                                    <td>{{$sign->sign}}{{ $withdraw->fee }}</td>
                                    <td>{{ucfirst($withdraw->status)}}</td>
                                </tr>
                            @endforeach
												</tbody>
													
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

@endsection    



@section('scripts')

{{-- DATA TABLE --}}


    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			ordering:false
		});

      	$(function() {
        $(".btn-area").append('<div class="col-sm-4 text-right">'+
        	'<a class="add-btn" href="{{route('logistics-wt-create')}}">'+
          '<i class="fas fa-plus"></i> Withdraw Now'+
          '</a>'+
          '</div>');
      	});												
									
    </script>

{{-- DATA TABLE --}}
    
@endsection   