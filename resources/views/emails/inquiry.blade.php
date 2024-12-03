@component('mail::message')
<h1>New Inquiry Received</h1>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone Number:</strong> {{ $data['phone'] }}</p>
<p><strong>Call Time:</strong> {{ $data['call_time'] }}</p>
<p><strong>Message:</strong> {{ $data['message'] }}</p>
<br>
{{config('app.name')}}
@endcomponent