@if($data)
    <form action="{{route('combo_service.callback')}}" method="POST" class="text-center mx-auto mt-5">
        {{csrf_field()}}
        <input type="hidden" name="razorpay_order_id" value="{{$data['razorpay_order_id']}}">
        <input type="hidden" id="combo_service_id" name="combo_service_id" value="{{$data['combo_service_id']}}">
        <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_live_G5XMGhycexOpb5"
                data-amount="{{1999*100}}"
                data-currency="INR"
                data-buttontext="Pay with Razorpay"
                data-name="Webscome Pvt Lmtd."
                data-description="Make Payment"
                data-theme.color="#F37254"
        >
        </script>
        <input type="hidden" custom="Hidden Element" name="hidden">
    </form>
@else
    {{abort(403)}}
@endif
