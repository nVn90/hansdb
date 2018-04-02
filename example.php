<?php include("design/header.html"); ?>

<div class="wrapper4 row2">
  <br/>
<h3><font color="#252222">Example</font></h3>
    <div class="wrapper2 row3">
</div>

    <div class="wrapper1">
<div class="content">    
<br/><br/>
<h1>prediction-protein</h1>
Step 1:  Formatted text as per the specification of FASTA/PEARSON format. The first line starts with a ">" and an identifier of the protein sequence and sequences following from the second line which can be pasted in the textarea.
<br/><br/>   
 Step 2: Protein sequence in Fasta format uploaded from the disk.
<br/><br/>
    An example of protein sequence in fasta format is given here under for reference.
<br/>   
&nbsp;&nbsp; Example:

&nbsp;&nbsp;&nbsp;&nbsp;    >sp|O00217|NDUS8_HUMAN mitochondrial OS=Homo sapiens GN=NDUFS8 PE=1 SV=1
    MRCLTTPMLLRALAQAARAGPPGGRSLHSSAVAATYKYVNMQDPEMDMKSVTDRAARTLL
    WTELFRGLGMTLSYLFREPATINYPFEKGPLSPRFRGEHALRRYPSGEERCIACKLCEAI
    CPAQAITIEAEPRADGSRRTTRYDIDMTKCIYCGFCQEACPVDAIVEGPNFEFSTETHEE
    LLYNKEKLLNNGDKWEAEIAANIQADYLYR
<br/><br/>
    Mutation List
<br/>
    Hansa requires atleast one mutation for predicting it's effect over the given protein sequence. The correct format of mutation list must have "WILD TYPE AMINOACID" "SPACE" "POSITION NUMBER" "SPACE" "MUTANT TYPE AMINOACID" in each line. More than one mutation can be provided for a protein sequence. The tools predicts effect of each mutation from the mutation list.
<br/>
    An example list of mutation(s) is provided here for reference.
    <br/>Example:<br/>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;R 102 H
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;P 79 L

<br/><br/>
<h1>prediction-alignment</h1>
<br/>    
Step 1. Multiple sequence Alignment in Fasta format uploaded from the disk.
<br/><br/>
    Mutation List
<br/>
    Hansa requires atleast one mutation for predicting it's effect over the given protein sequence. The correct format of mutation list must have "WILD TYPE AMINOACID" "SPACE" "POSITION NUMBER" "SPACE" "MUTANT TYPE AMINOACID" in each line. More than one mutation can be provided for a protein sequence. The tools predicts effect of each mutation from the mutation list.
<br/>
    An example list of mutation(s) is provided here for reference.
   <br/> Example:
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;R 102 H
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;P 79 L
<br/>
</div>

  

<br/><br/><br/><br/><br/><br/><br/><br/>

</div></div>

<?php include("design/footer.html"); ?>
