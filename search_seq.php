<?php include("design/header.html"); ?>
<!--
  Validates (true/false) a single fasta sequence string
  param   fasta    the string containing a putative single fasta sequence
  returns boolean  true if string contains single fasta sequence, false 
                   otherwise 
 -->

<script type="text/javascript">
<!--
//var filefasta = document.getElementById.localFasta.value;
function validate() {
//var fasta = document.getElementById.pro_seq.value;
if((document.seq_search.pro_seq.value == "") && (document.seq_search.localFasta.value == "") && (document.seq_search.mutat_list.value == "")){
                alert("Please upload a file or paste a sequence and submit mutation list");
                document.seq_search.pro_seq.focus();
                //document.seq_search.pro_seq.select();
    //          validform = false;
                return false;
          }
          else if((document.seq_search.pro_seq.value != "") && (document.seq_search.localFasta.value != "")){
               alert("Please either upload a file or paste a sequence (not both)");
               document.seq_search.pro_seq.focus();
              //  validform = false;
                return false;
          }
          else if((document.seq_search.pro_seq.value != "") && (document.seq_search.mutat_list.value == "")){
                alert("Please submit mutation list");
               document.seq_search.pro_seq.focus();
              return false;
          }
          else if((document.seq_search.localFasta.value != "") && (document.seq_search.mutat_list.value == "")){
                alert("Please submit mutation list");
               document.seq_search.pro_seq.focus();
              return false;
          }

          else if((document.seq_search.mutat_list.value != "") && ((document.seq_search.pro_seq.value != "") || (document.seq_search.localFasta.value != ""))){
              var mutat = document.seq_search.mutat_list;
              var mutatlist = /^[ACDEFGHIKLMNPQRSTUVWY]( \d+) [ACDEFGHIKLMNPQRSTUVWY]$/;
              if(mutat.value.match(mutatlist)) {
                return true;
              }
                else{
                alert("Mutation list is not in specified format");
                return false;
              }
              
            }

          else if ((document.seq_search.pro_seq.value != "") && (document.seq_search.localFasta.value == "")){
            var seqfasta = document.seq_search.pro_seq.value;
            // immediately remove trailing spaces
            seqfasta = seqfasta.trim();
            // split on newlines... 
            var lines = seqfasta.split('\n');
            // check for header
            if (seqfasta[0] == '>') {
              // remove one line, starting at the first position
              lines.splice(0, 1);
              if (lines[0] ==undefined) {

          alert("Please enter amino acid sequence in second line"); 
          document.seq_search.pro_seq.focus();
          return false;
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

    if (seqfasta.search(/[^ACDEFGHIKLMNPQRSTUVWY\s]/i) != -1) { 

    alert("Unspecified amino acid seq");  
    document.seq_search.pro_seq.focus();
    //The seq string contains non-protein characters
    return false;
    }

          }

         
         else {
                validform = true;
                return true;
         }
   //var fasta = document.getElementById.pro_seq.value;

}
//-->
</script>
<div class="wrapper4 row2">
  <br/><br/>
<h3><font color="#252222">Search using FASTA sequence </font></h3>
    <div class="wrapper2 row3">
</div>

<br/>
    <div class="wrapper1">
<div class="content">
 <form action="result_seq.php" name="seq_search" method="POST" target="_self" enctype="multipart/form-data" onsubmit="return(validate());" >
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
