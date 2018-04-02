<?php include("design/header.html"); ?>
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
<div class="wrapper4 row2">
  <br/><br/>
<h3><font color="#252222">Search using FASTA sequence </font></h3>
    <div class="wrapper2 row3">
</div>

<br/>
    <div class="wrapper1">
<div class="content">
 <form action="result_seq.php" name="seq_search" method="POST" enctype="multipart/form-data" onSubmit="return validateFasta()" >
<br/><br/><p>
Submit a Protein sequence  (Paste in FASTA format)
<textarea name="pro_seq" id="pro_seq"  cols="80" rows="6" ></textarea>
<BR/><br/>
(OR) <br/>Upload a Protein fasta file: 

<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='5000'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="localFasta" size="22"> 
<br/><br/>
Submit Mutation List (format eg: M 45 W in a single line )<br/><br/>
<textarea name="mutat_list" id="mutat_list"  cols="50" rows="4" ></textarea>
<BR/><br/>
E-mail (Optional) : <input name="emailid" type="text" size="36"> <input name="mail" type="checkbox"> Check to receive E-mail notification of results

<br/><br/>  <input type="submit" name="RUN"  value="RUN"/><input type="Reset" name="Reset" value="Clear" />
</form>  
</p></div>
<br/><br/><br/><br/><br/><br/><br/><br/>


</div></div>




<?php include("design/footer.html"); ?>
