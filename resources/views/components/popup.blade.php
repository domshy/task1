<html>
<head>
	<title>Bootstrap Modal Example in Laravel - Websolutionstuff</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('inc.link')
</head>
<body>
	<br>
	<h3>Bootstrap Modal Example in Laravel - Websolutionstuff</h3>
	<form method="post" action="#">
	<br><br>
	  <table class="table-bordered table-striped" width="50%">
		<thead>
		  <tr>
			<th class="text-center">No.</th>
			<th class="text-center">Name</th>
			<th class="text-center"> Example</th>
		  </tr>
		</thead>
		<tbody>
		 <tr>
			<td class="text-center">1</td>
			<td class="text-center">Admin</td>
			<td class="text-center"><button type="button" class="btn btn-primary m-2" data- 
            toggle="modal" data-target="#demoModal">Click Here</button> </td>
		 </tr>
		 <tr>
			<td class="text-center">2</td>
			<td class="text-center">Test</td>
			<td class="text-center"><button type="button" class="btn btn-primary m-2" data- 
            toggle="modal" data-target="#demoModal">Click Here</button> </td>
		 </tr>
		</tbody>

		<!-- Modal Example Start-->
			<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria- 
            labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Modal Example - 
                             Websolutionstuff</h5>
								<button type="button" class="close" data-dismiss="modal" aria- 
                                label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
								Welcome, Websolutionstuff !!
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data- 
                            dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save 
                                changes</button>
						</div>
					</div>
				</div>
			</div>
	 <!-- Modal Example End-->
			</table>
			<br>
		</form>
		@include('inc.link2')
	</body>
</html>