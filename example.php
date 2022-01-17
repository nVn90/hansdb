<title>Example | HANS Database</title>
<?php include( "design/header.html"); ?>

<body>
	<?php include( "design/main-navigation.php"); ?>
	<header class="main-header">
		<div class="container">
			<h3>Example</h3>
		</div>
	</header>
	<div class="container">
		<div class="wrapper4 row2">
			<div class="wrapper2 row3"></div>
			<div class="wrapper1">
				<div class="content">
					<h2>prediction-protein</h2>
					<p>Step 1: Formatted text as per the specification of FASTA/PEARSON format. The first line starts with a ">" and an identifier of the protein sequence and sequences following from the second line which can be pasted in the textarea.</p>
					<p>Step 2: Protein sequence in Fasta format uploaded from the disk.</p>
					<p>An example of protein sequence in fasta format is given here under for reference.</p>Example:
					<div class="card">
						<div class="card-body">
<pre>
    >sp|O00217|NDUS8_HUMAN mitochondrial OS=Homo sapiens GN=NDUFS8 PE=1 SV=1
    MRCLTTPMLLRALAQAARAGPPGGRSLHSSAVAATYKYVNMQDPEMDMKSVTDRAARTLL
    WTELFRGLGMTLSYLFREPATINYPFEKGPLSPRFRGEHALRRYPSGEERCIACKLCEAI
    CPAQAITIEAEPRADGSRRTTRYDIDMTKCIYCGFCQEACPVDAIVEGPNFEFSTETHEE
    LLYNKEKLLNNGDKWEAEIAANIQADYLYR
</pre>
						</div>
					</div>
					<br>
					<h4>Mutation List</h4>
					<p>Hansa requires atleast one mutation for predicting it's effect over the given protein sequence. The correct format of mutation list must have "WILD TYPE AMINOACID" "SPACE" "POSITION NUMBER" "SPACE" "MUTANT TYPE AMINOACID" in each line. More than one mutation can be provided for a protein sequence. The tools predicts effect of each mutation from the mutation list.</p>
					<p>An example list of mutation(s) is provided here for reference.</p>Example:
					<div class="card">
						<div class="card-body"> <pre>
    R 102 H
    P 79 L
    </pre>
						</div>
					</div>
					<br>
					<h2>prediction-alignment</h2>
					<p>Step 1. Multiple sequence Alignment in Fasta format uploaded from the disk.</p>
					<h4>Mutation List</h4>
					<p>Hansa requires atleast one mutation for predicting it's effect over the given protein sequence. The correct format of mutation list must have "WILD TYPE AMINOACID" "SPACE" "POSITION NUMBER" "SPACE" "MUTANT TYPE AMINOACID" in each line. More than one mutation can be provided for a protein sequence. The tools predicts effect of each mutation from the mutation list.</p>
					<p>An example list of mutation(s) is provided here for reference.</p>Example:
					<div class="card">
						<div class="card-body"> <pre>
    R 102 H
    P 79 L
</pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include( "design/footer.html"); ?>
</body>

</html>