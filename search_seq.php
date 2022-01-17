<title>Search using FASTA sequence | HANS Database</title>
<?php include( "design/header.html"); ?>

<body>
	<?php include( "design/main-navigation.php"); ?>
	<!--
  Validates (true/false) a single fasta sequence string
  param   fasta    the string containing a putative single fasta sequence
  returns boolean  true if string contains single fasta sequence, false 
                   otherwise 
 -->
	<script type="text/javascript">
		//var filefasta = document.getElementById.localFasta.value;
		function validateseqform() {
		//var fasta = document.getElementById.pro_seq.value;
		if((document.seq_search.pro_seq.value === "") && (document.seq_search.localFasta.value === "") && (document.seq_search.mutat_list.value === "")){
		                alert("Please upload a file or paste a sequence and submit mutation list");
		                document.seq_search.pro_seq.focus();
		                //document.seq_search.pro_seq.select();
		    //          validform = false;
		                return false;
		          }
		    
		    else if(document.seq_search.emailid2.value !== ""){
		            var emailid = document.seq_search.emailid2;
		              var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		         if(emailid.value.match(mailformat)){
		              
		              return true;
		              }
		              else
		              {
		              alert("You have entered an invalid email address!");
		              document.seq_search.emailid2.focus();
		              return false;
		              }
		            }
		    
		          else if((document.seq_search.pro_seq.value !== "") && (document.seq_search.localFasta.value !== "")){
		               alert("Please either upload a file or paste a sequence (not both)");
		               document.seq_search.pro_seq.focus();
		              //  validform = false;
		                return false;
		          }
		          else if((document.seq_search.pro_seq.value !== "") && (document.seq_search.mutat_list.value === "")){
		                alert("Please submit mutation list");
		               document.seq_search.pro_seq.focus();
		              return false;
		          }
		          else if((document.seq_search.localFasta.value !== "") && (document.seq_search.mutat_list.value === "")){
		                alert("Please submit mutation list");
		               document.seq_search.pro_seq.focus();
		              return false;
		          }
		          else if((document.seq_search.pro_seq.value === "") && (document.seq_search.localFasta.value === "") && (document.seq_search.mutat_list.value !== "")){
		                alert("Please either upload a file or paste a sequence");
		               document.seq_search.pro_seq.focus();
		              return false;
		          }
		          else if((document.seq_search.mutat_list.value !== "") && ((document.seq_search.pro_seq.value !== "") || (document.seq_search.localFasta.value !== ""))){
		              var mutat = document.seq_search.mutat_list.value;
		              var mutlength = document.seq_search.mutat_list.value.split(/\r?\n|\r/).length;
		              //alert(mutlength);
		
		              var mutatlist = /^[ACDEFGHIKLMNPQRSTUVWY]( \d+) [ACDEFGHIKLMNPQRSTUVWY]$/;
		              for (var i = 0; i < mutlength; i++) {
		              if(mutat.match(mutatlist)) {
		                return true;
		              }
		                else{
		                alert("Mutation list is not in specified format");
		                document.seq_search.mutat_list.focus();
		                return false;
		              }
		              
		            }
		
		        
		    
		          else if ((document.seq_search.pro_seq.value !== "") && (document.seq_search.localFasta.value === "")){
		            var seqfasta = document.seq_search.pro_seq.value;
		            // immediately remove trailing spaces
		            seqfasta = seqfasta.trim();
		            // split on newlines... 
		            var lines = seqfasta.split('\n');
		            // check for header
		            if (seqfasta[0] === '>') {
		              // remove one line, starting at the first position
		              lines.splice(0, 1);
		              if (lines[0] === undefined) {
		          alert("Please enter amino acid sequence in second line"); 
		          document.seq_search.pro_seq.focus();
		          return false;
		            } 
		            else {
		           //     validform = true;
		                return true;
		         }
		            }
		            else{
		            alert("First line should start with '>' and amino-acid sequence in next line");
		            return false;
		            }
		            // join the array back into a single string without newlines and 
		            // trailing or leading spaces
		             seqfasta = lines.join('').trim();
		  // note that the empty string is caught above
		  // allow for Selenocysteine (U)
		  //return /^[ACDEFGHIKLMNPQRSTUVWY\s]+$/i.test(fasta);
		
		    if (seqfasta.search(/[^ACDEFGHIKLMNPQRSTUVWY\s]/i) !== -1) { 
		
		    alert("Unspecified amino acid seq");  
		    document.seq_search.pro_seq.focus();
		    //The seq string contains non-protein characters
		    return false;
		    }
		          }
		    
		    
		    
		         //else {
		           //     validform = true;
		          //      return true;
		         //}
		       
		}
	</script>
	<header class="main-header">
		<div class="container">
			<h3>Search using FASTA sequence</h3>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="login-blue p-3 shadow-lg rounded">
					<div class="pt-3">
						<h3 class="text-white ">Search using FASTA sequence</h3>
					</div>
					<hr>
					<form action="result_seq.php" name="seq_search" method="POST" target="_self" enctype="multipart/form-data" onsubmit="return(validateseqform());">
						<div class="form-group">
							<label for="Protein sequence">Submit a Protein sequence (Paste in FASTA format)</label>
							<textarea name="pro_seq" id="pro_seq" rows="5" class="form-control"></textarea>
						</div>(OR)
						<br/>
						<label for="usr">Upload a Protein fasta file:</label>
						<input type='hidden' name='MAX_FILE_SIZE' value='5000'>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="localFasta">
							<label class="custom-file-label" for="customFile">Choose file</label>
							<script>
								// Add the following code if you want the name of the file appear on select
								$(".custom-file-input").on("change", function() {
								  var fileName = $(this).val().split("\\").pop();
								  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
								});
							</script>
						</div>
						<br>
						<br>
						<p>Choose Homolog Search Algorithm:</p>
						<div class="form-check-inline">
							<label for="BP" class="form-check-label">
								<input type="radio" id="bp" name="HS" value="BP" class="form-check-input">BlastP(Faster)</label>
						</div>
						<div class="form-check-inline">
							<label for="PB" class="form-check-label">
								<input type="radio" id="bp" name="HS" value="PB" class="form-check-input">PSI-BLAST</label>
						</div>
						<br>
						<br>
						<div class="form-group">
							<label for="">Submit Mutation List (format eg: M 45 W in a single line)</label>
							<textarea name="mutat_list" id="mutat_list" rows="5" class="form-control"></textarea>
						</div>
						<br/>
						<br/>
						<div class="form-group">
							<input type="text" name="emailid2" class="form-control" placeholder="E-mail (Optional)">
							<label for="email">Receive E-mail notification of results</label>
						</div>
						<input type="submit" name="RUN" value="Run" class="btn  btn-outline-light col" />
						<br>
						<br>
						<input type="Reset" name="Reset" value="Clear" class="btn  btn-outline-warning col" />
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	</div>
	</div>
	<?php include( "design/footer.html"); ?>
</body>

</html>