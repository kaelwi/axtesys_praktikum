@extends('app')
	
	@section('order')

	<!-- 
	<form action="{{ url('order') }}" method="POST">
	<label for="orderby">Order by:</label>
	<select name="orderby">
		<option value="firstName">First Name</option>
		<option value="lastName">Last Name</option>
		<option value="phone_number">Phone Number</option>
		<option value="email">Email</option>blade
		<option value="friends">Friends</option>
	</select>
	<input type="submit" value="Submit">
	</form>
	
	-->
	
	<form action="{{ url('order') }}" method="POST">
	<!-- <label for="orderby">Order by:</label> <br> -->
	<label><input type="radio" name="order" value="firstName" {{ (request()->is('*/firstName')) ? 'checked' : '' }}>First Name</label><br>
	<label><input type="radio" name="order" value="lastName" {{ (request()->is('*/lastName') || request()->is('/')) ? 'checked' : '' }}>Last Name</label><br>
	<label><input type="radio" name="order" value="phone_number" {{ (request()->is('*/phone_number')) ? 'checked' : '' }}>Phone Number</label><br>
	<label><input type="radio" name="order" value="email" {{ (request()->is('*/email')) ? 'checked' : '' }}>Email</label><br>
	<label><input type="radio" name="order" value="friends" {{ (request()->is('*/friends')) ? 'checked' : '' }}>Friends</label><br><br>
	<input type="submit" value="Order by">
	</form>
	
	<br>
	<br>
	
	@endsection
	@section('content')
	
	<table>
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Friend</th>
			<th>Delete/Add</th>
		</tr>
		@foreach($contacts as $contact)
		<tr>
			<td>{{$contact->lastName}}</td>
			<td>{{$contact->firstName}}</td>
			<td>{{$contact->phone_number}}</td>
			<td>{{$contact->email}}</td>
			<td>{{$contact->friends}}</td>
			<td> 
				<form action="{{ url('contact/'.$contact->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">	
					<!-- <button type="submit">-</button>		 -->			
					 <input type="image" src="{{ URL::to('/img/delete_icon.png') }}" style="width:25px"> 
				</form>
			</td>
		</tr>
		@endforeach
		<tr>
			<form action="{{ url('contact') }}" method="POST">
			<td><input type="text" name="lastName"></td>
			<td><input type="text" name="firstName"></td>
			<td><input type="text" name="phone_number"></td>
			<td><input type="text" name="email"></td>
			<td><input type="text" name="friends"></td>
			<td><button type="submit">+</button></td>
			</form>
		</tr>
	</table>
	
	<!--
	<h2>Enter new contact</h2>
	<form action="{{ url('contact') }}" method="POST">
		<table>
			<tr>
				<td><label for="firstName">First Name</label></td>
				<td><label for="lastName">Last Name</label></td>
				<td>Add</td>
			</tr>
			<tr>
				<td><input type="text" name="firstName"></td>
				<td><input type="text" name="lastName"></td>
				<td><button type="submit">+</button></td>
			</tr>
				
		</table>
	
	</form>
	-->
	
	@endsection