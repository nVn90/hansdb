<title>Query Results | HANS Database</title>
<?php
include("design/header.html");
session_start();
?>

<SCRIPT TYPE="text/javascript">
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=500,height=300,scrollbars=yes');
return false;
}
</SCRIPT>
<?php include("design/main-navigation.php"); ?>

<body>
    <style>
        .wrapperNew {
            width: 900px;
            min-height: 20vh;
            padding: 20px;
            margin: 0 auto;
            display: flex;
        }

        aside {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
            position: absolute;
            font-weight: bold;
            top: 50vh;
            left: 35vh;
        }

        main {
            display: flex;
            overflow: scroll;
            max-width: min-content;
            vertical-align: center;
            padding: 5px;
        }

        main .col {
            max-width: min-content;
            text-align: center;
        }

        main .col {
            display: flex;
            flex-direction: column;
            width: 55px;
        }

        main .col span:first-child,
        aside span:first-child {
            padding: 7px;
            /* height: 52px; */
            text-align: center;
            font-weight: bold;
        }

        .red {
            color: red;
            display: block;
            background-color: red;
            border-radius: 50%;
        }

        .green {
            color: green;
            display: block;
            background-color: green;
            border-radius: 50%;
        }

        span a {
            text-decoration: none;
            color: inherit;
        }
    </style>



    <div class="container">
        <div class="wrapper4 row2">
            <br />
            <?php
            $mutmatrix = array();
            $swiss_id = $_POST["swiss_id"];
            //echo $protein_seq;
            $swiss_id2 = trim($swiss_id);
            ?>
            <h3>
                <font color="# ">SWISSPORT ID : &nbsp;&nbsp;<font color=" #e74c3c"><?php echo $swiss_id2; ?></font></font>
            </h3>
            
            <!-- <div class="wrapper1"> -->
                <?php
                $inp = $swiss_id2 . ".out";
                //echo $inp;
                $inp_swiss_file = "Data_for_Db/" . $inp;
                $fileopen = @fopen("$inp_swiss_file", "r") or die("Unable to open file!");
                //echo $inp_swiss_file;
                //echo fgets($fileopen);
                //$data = file_get_contents('$fileopen', true);
                //foreach(file($fileopen) as $line) {
                //echo $line[0]."\n";
                //}
                while (!feof($fileopen)) {

                    $mutmatrix[] = fgets($fileopen);
                    //echo "\n";

                    //$splitmatrix=preg_split("/[\t]/", $mutmatrix[0];
                }
                $length = count($mutmatrix);
                echo $length;
                ?>
                <?php
                $x = 0;
                $y = 0;
                $i = 0;
                ?>
                <div class="zui-wrapper">
                    <div class="zui-scroller">
                        <div class="table-responsive">
                            <!-- UPDATED STARTS -->
                            <div class="wrapperNew">
                                <aside>
                                    <span>Sequence</span>
                                    <span>A</span>
                                    <span>C</span>
                                    <span>D</span>
                                    <span>E</span>
                                    <span>F</span>
                                    <span>G</span>
                                    <span>H</span>
                                    <span>I</span>
                                    <span>K</span>
                                    <span>L</span>
                                    <span>M</span>
                                    <span>N</span>
                                    <span>P</span>
                                    <span>Q</span>
                                    <span>R</span>
                                    <span>S</span>
                                    <span>T</span>
                                    <span>V</span>
                                    <span>W</span>
                                    <span>Y</span>
                                </aside>
                                <main>
                                    <?php
                                        while($i < $length-1) {
                                            $splitmatrix=explode("\t", $mutmatrix[$i]);
                                            ?>
                                        <div class="col">
                                        <span>
                                        <?php
                                        echo  $splitmatrix[1];
                                        ?>
                                        |
                                        <?php
                                        echo  $splitmatrix[2];
                                        $y=$i+19;
                                        for ($x = $i; $x <= $y; $x++) {
                                        ?>
                                        </span>
                                        <?php
                                        $splitmatrix2=explode("\t", $mutmatrix[$x]);
                                        if ($splitmatrix2[12]==-1){
                                        ?>
                                        <span>
                                        <a class="green" href="swisspopup.php?id=<?php echo $swiss_id2 ; ?>_<?php echo $splitmatrix2[2] ; ?>_<?php echo $splitmatrix2[3] ; ?>" onClick="return popup(this, 'output data')"> <?php echo   $splitmatrix2[3];?></a>
                                        </span>
                                        <?php
                                        }
                                        elseif ($splitmatrix2[12]==1){
                                            ?>
                                            <span>
                                        <a  class="red" href="swisspopup.php?id=<?php echo $swiss_id2 ; ?>_<?php echo $splitmatrix2[2] ; ?>_<?php echo $splitmatrix2[3] ; ?>"  onClick="return popup(this, 'output data')"> <?php echo   $splitmatrix2[3]; ?></a>                                        
                                        </span>
                                        <?php
                                        }
                                        else {
                                            ?>
                                            <span>
                                        <?php
                                        echo $splitmatrix2[3];
                                        ?>
                                        </span>
                                        <?php
                                    }    
                                        }
                                        ?>
                                        </div>
                                        <?php
                                        $y=$y+1;
                                        $i=$y; 
                                    ?>
                                        <?php
                                        }
                                        ?>
                                </main>
                            </div>
                            <!-- UPDATED ENDS -->
                        </div>
                    </div>
                </div>
                <?php
                ?>
            <!-- </div> -->
        </div>
    </div>
    <?php include("design/footer.html"); ?>
</body>