@include('frontend.header')

	@if(session('order') !== null)
	<h5 style="text-align: center;">Your order ID :</h5><br>

	<div><p style="font-weight: 900;text-align: center;" >{{session('order')}}.</p>
	</div>
	<h5 style="text-align: center;" > You can track your order by entering Order ID</h5><br>
	<h4 style="text-align: center;">Thank you for Taking our services. Kindly provide feebacks</h4>

	@else
	<h4 style="text-align: center;">Donot hit URL directly to access</h4>

  @endif


<br><br><br><br><br><br><br><br><br><br><br><br>

@include('frontend.footer')