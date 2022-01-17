<!--
  Validates (true/false) a single fasta sequence string
  param   fasta    the string containing a putative single fasta sequence
  returns boolean  true if string contains single fasta sequence, false 
                   otherwise 
 -->
 <script type="text/javascript">
	//var filefasta = document.getElementById.localFasta.value;
	function validateFasta() {
	var fasta = document.getElementById.pro_seq.value;
	if((document.seq_search.pro_seq.value == "") && (document.seq_search.localFasta.value == "")){
	                alert("Please upload a file or paste a sequence");
	                document.seq_search.pro_seq.focus();
	                document.seq_search.pro_seq.select();
	           //validform = false;
	                return false;
	          }
	          else if((document.seq_search.pro_seq.value != "") && (document.seq_search.localFasta.value != "")){
	                alert("Please either upload a file or paste a sequence (not both)");
	                validform = false;
	                return false;
	          }
	         //else {
	           //     validform = true;
	             //   return true;
	         //}
	   //var fasta = document.getElementById.pro_seq.value;
	//fasta validation
		else if (!fasta) { // check there is something first of all
			return false;
		}
	
		// immediately remove trailing spaces
		fasta = fasta.trim();
	
		// split on newlines... 
		var lines = fasta.split('\n');
	
		// check for header
		if (fasta[0] == '>') {
	
			// remove one line, starting at the first position
			lines.splice(0, 1);
		}
	else{
	
	alert("no fasta format");
	return false;
	}
	
		// join the array back into a single string without newlines and 
		// trailing or leading spaces
		fasta = lines.join('').trim();
	
		if (!fasta) { // is it empty whatever we collected ? re-check not efficient 
	return false;
		}
	else{
	
	alert("blank no seq");
	return false;
	}
	
		// note that the empty string is caught above
		// allow for Selenocysteine (U)
		//return /^[ACDEFGHIKLMNPQRSTUVWY\s]+$/i.test(fasta);
	
			if (fasta.search(/[^ACDEFGHIKLMNPQRSTUVWY\s]/i) != -1) { 
	
	    alert("Unspecified amino acid seq");  
	    //The seq string contains non-protein characters
	    return false;
	
	 }
	
	
	else {
	             //  validform = true;
	               return true;
	         }
	
	
	}
</script>
<title>Query | HANS Database</title>
<?php include( "design/header.html"); ?>

<body>
	<?php include( "design/main-navigation.php"); ?>
	<header class="main-header">
		<div class="container">
			<h3>Query using SWISSPORT ID</h3>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="login-blue p-3 shadow-lg rounded">
					<div class="pt-3">
						<h3 class="text-white ">Query using SWISSPORT ID</h3>
					</div>
					<hr>
					<form action="result_query.php" name="query_search" method="POST" enctype="multipart/form-data" onSubmit="return validate()">
						<div class="form-group">
							<label for="">Submit SWISSPORT ID (Example: A8MXD5 )</label>
							<textarea name="swiss_id" id="swiss_id" rows="5" class="form-control"></textarea>
						</div>
						<!--
E-mail (Optional) : <input name="emailid" type="text" size="36"> <input name="mail" type="checkbox"> Check to receive E-mail notification of results
-->
						<input type="submit" name="RUN" value="Run" class="btn  btn-outline-light col" />
						</br>
						</br>
						<input type="Reset" name="Reset" value="Clear" class="btn  btn-outline-warning col" />
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<?php include( "design/footer.html"); ?>
</body>

</html>