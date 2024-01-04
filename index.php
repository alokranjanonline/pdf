<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Cataloge Price Change</title>
  </head>
   <body style="font-size: 13px;font-weight: lighter;">
      <div class="container mt-3">			
			<p><h4 class="text-center"><u>Upload file to change the price.</u></h4></p>
			<div class="uploadexcel" >
				<form action="action_excel1.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td><input type="file" id="myFile" name="filename" class="form-control"></td>
									<td><input type="submit" name="Submit" value="Submit" class="btn btn-success"></td>
								</tr>
							</tbody>
						</table>						
					</div>
				</form>
			</div>	
			<div class="preloadpdf mt-5">
				<embed src="demo-file.pdf" width="800px" height="400px" />
			</div>
		</div>
</body>
</html>


