<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate Invoice PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />

	<style type="text/css">
	
		.item-table td{
			text-align: right;
		}

	</style>
</head>
<body>
	<div class="p-2 bg-info">
		<table class="table table-borderless">
			<tr>
				<td class="w-25"><img src="{{asset('public/assets/images/invoice_logo.png')}}" class="w-100" alt="invoice logo"></td>
				<td class="w-25"></td>
				<td class="w-25"><p class="font-weight-bold">#34, IT Solutions And Tech Park.<br>Vijay Nagar, India<br>Mob : 9000000009</p></td>
			</tr>
		</table>
	</div>


	<div class="p-2">
		<table class="table table-borderless">
			<tbody>
				<tr>
					<td class="w-40">
						<div class="" >
							<p class="text-secondary mb-1">
								Billed To :
							</p>
							<p class="">Customer Name <br>Customer Address,<br>City, State<br>Mobile Number</p>
						</div>
					</td>
					<td class="w-30">
						<div class="" >
							<p class="text-secondary mb-1">
								Invoice Number :
							</p>
							<p class="">#0015400</p>

							<p class="text-secondary mb-1">
								Date of Issue :
							</p>
							<p class="">DD-MM-YYYY</p>
						</div>
					</td>
					<td class="w-10"></td>
					<td class="w-20">
						<div class="">
							<p class="text-secondary mb-1">
								Invoice Total :
							</p>
							<h3 class="text-primary">$10500.00</h3>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="table item-table">
			<thead class="thead-dark ">
				<tr class="">
					<th class="w-40">Description</th>
					<th class="w-20 text-right">Unit Cost</th>
					<th class="w-20 text-right">Quantity</th>
					<th class="w-20 text-right">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>
						Your Item Name1
						<br><p class="text-secondary m-1">Item1 description details</p>
					</th>
					<td>$1000</td>
					<td>2</td>
					<td>$2000</td>
				</tr>
				<tr>
					<th>
						Your Item Name2
						<br><p class="text-secondary m-1">Item2 description details</p>
					</th>
					<td>$2000</td>
					<td>2</td>
					<td>$4000</td>
				</tr>
				<tr>
					<th>
						Your Item Name3
						<br><p class="text-secondary m-1">Item3 description details</p>
					</th>
					<td>$1500</td>
					<td>3</td>
					<td>$4500</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td colspan="2">
						<table class="table table-borderless">
							<tr>
								<td class="w-50 text-info">Subtotal : </td>
								<td class="w-50">$10500</td>
							</tr>
							<tr>
								<td class="w-50 text-info">Tax : </td>
								<td class="w-50">$500</td>
							</tr>
							<tr>
								<td class="w-50 text-info">Discount : </td>
								<td class="w-50">$500</td>
							</tr>
							<tr>
								<td class="w-50 text-info">Total : </td>
								<td class="w-50">$10500</td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

	</div>

    <!-- Footer -->
<footer class="page-footer bg-info fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center p-3">© {{date('Y')}} Copyright:<a href="" class="text-dark"> companydomain.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>