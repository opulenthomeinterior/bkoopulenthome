@component('mail::message')

<h3>{{$data['notification_type']}}</h3>

<p>Customer Name: {{$data['customer_name']}}</p>
<p>Customer Email: {{$data['customer_email']}}</p>
<p>Customer Contact: {{$data['customer_contact']}}</p>
<p>Customer Payment Method: {{$data['payment_method']}}</p>

<br>
{{config('app.name')}}
@endcomponent