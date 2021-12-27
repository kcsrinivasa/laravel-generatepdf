<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate Invoice PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>

    <!-- custom style -->
    <style type="text/css">
     body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }
        .card{
        	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }


        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

    </style>
    <!-- end custom style -->
</head>
<body>

	<div class="p-5">
		<a href="{{route('customer.invoice_template')}}" class="btn btn-sm btn-info float-right">Download Demo Invoice</a>
		<h3 class="text-center">Enter Data to Generate Invoice PDF</h3>
		<hr>
		
			<form action="{{route('customer.invoice')}}" method="POST">
				@csrf
			<div class="card">
				<div class="card-header">Invoice Details</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Bill To :</label>
								<textarea class="form-control" name="billTo" rows="5"  placeholder="Enter Customer Datails"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Invoice Number:</label>
								<input type="text" name="invoiceNumber" class="form-control" placeholder="Enter Invoice Number">
							</div>
							<div class="form-group">
								<label>Date of Issue:</label>
								<input type="text" name="dateOfIssue" class="form-control" placeholder="Enter Date of Issue">
							</div>
						</div>
					</div>

			</div>
		</div>
		<!-- item details -->
		<hr>
	<div class="card">
		<div class="card-header">Item Details
			<button type="button" class="btn btn-success float-right" id="addItemBtn">+</button>
		</div>
		<div class="card-body">
			<table class="table" id="itemTable">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Item Details</th>
						<th>Unit Price($)</th>
						<th>Quanity</th>
						<th>Amount($)</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="itemName[]" required class="form-control" placeholder="Enter Item Name"></td>
						<td><input type="text" name="itemDetails[]" required class="form-control" placeholder="Enter Item Details"></td>
						<td>
							<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span></div><input type="text" name="unitPrice[]" required class="form-control numericOnly ItemUnitPrice calculateItemAmount" placeholder="Enter Unit Cost">
							</div>
						</td>
						<td><input type="number" name="quantity[]" required class="form-control ItemQuantity calculateItemAmount" placeholder="Enter Quanity"></td>
						<td>
							<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span>
							  </div><input type="text" name="amount[]" required class="form-control numericOnly itemAmount" placeholder="Enter Amount"></div>
						</td>
						<td><button type="button" class="btn btn-danger">&times;</button></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- item details end -->
		<hr>
		<div class="card">
			<div class="card-header">Price Details</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Subtotal:</label>
							<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span>
							  </div>
								<input type="text" name="subTotal" id="subTotal" value="0" class="calculateTotal form-control" placeholder="Enter Subtotal">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tax:</label>

							<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span>
							  </div>
								<input type="text" name="taxAmount" id="taxAmount" value="0" class="calculateTotal form-control" placeholder="Enter Tax">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Discount:</label>
							<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span>
							  </div>
								<input type="text" name="discountAmount" id="discountAmount" value="0" class="calculateTotal form-control" placeholder="Enter Discount">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Total:</label>
							<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span>
							  </div>
							<input type="text" name="totalAmount" id="totalAmount" class="form-control" placeholder="Enter Total Amount">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					
		<div class="form-group p-3">
			<button type="submit" class="btn btn-success form-control">Generate PDF</button>
		</div>			
	</form>
	</div>

<script type="text/javascript">

	$('#addItemBtn').on('click',function(){
		// alert('add row');
		var newRow = '<tr><td><input type="text" name="itemName[]" required class="form-control" placeholder="Enter Item Name"></td><td><input type="text" name="itemDetails[]" required class="form-control" placeholder="Enter Item Details"></td><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="text" name="unitPrice[]" required class="form-control numericOnly ItemUnitPrice calculateItemAmount" placeholder="Enter Unit Cost"></div></td><td><input type="number" name="quantity[]" required class="form-control ItemQuantity calculateItemAmount" placeholder="Enter Quantity"></td><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="text" name="amount[]" required class="form-control numericOnly itemAmount" placeholder="Enter Amount"></div></td><td><button type="button" class="btn btn-danger removeItemRow">&times;</button></td></tr>';
		$("#itemTable tbody").append(newRow);


	});

	$( document ).ready(function() {
		$('#itemTable').on('keypress', '.numericOnly',function(e){
			// alert('d');
	    	if (String.fromCharCode(e.keyCode).match(/[^0-9\.]/g)) return false;
		});

		$('#itemTable').on('click', '.removeItemRow',function(){
			// alert('remove row');
			$(this).parent().parent().remove();
		});

		$('.calculateTotal').on('change',function(){
			calculateTotal();
		});
		$('#itemTable').on('change','.calculateItemAmount',function(){

			// alert(parseFloat($(this).val()));
			// alert($(this).parent().parent().find('.ItemQuantity').val());
			// alert($(this).parent().parent().find('.itemAmount').val());


			$(this).parent().parent().find('.itemAmount').val(parseFloat( parseFloat($(this).parent().parent().find('.ItemQuantity').val()) * parseFloat($(this).parent().parent().find('.ItemUnitPrice').val()) ).toFixed(2));
			var itemAmount = 0;
			 $(".itemAmount").each(function(){
                itemAmount += parseFloat($(this).val());
            });

			$('#subTotal').val(parseFloat(itemAmount).toFixed(2));
			calculateTotal();
			
		});
	});


		function calculateTotal(){
			$('#totalAmount').val(parseFloat( parseFloat($('#subTotal').val()) + parseFloat($('#taxAmount').val()) - parseFloat($('#discountAmount').val()) ).toFixed(2));
		}

</script>
</body>
</html>