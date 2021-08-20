<div id="footer">
    <ul>
        <li>

            <h2> <span>Abo</span>ut US </h2>
            <?php
            include("inc/db1.php");
            $get_about = $con->prepare("select * from about");
            $get_about->setFetchMode(PDO::FETCH_ASSOC);
            $get_about->execute();

            $get_contact = $con->prepare("select * from contact");
            $get_contact->setFetchMode(PDO::FETCH_ASSOC);
            $get_contact->execute();

            while($row = $get_about->fetch()){
                echo '<p>'. $row["aboutt"].'</p>';
            }
            ?>
        
        </li>
        <li>
            <h2> <span>Con</span>tact US </h2>
            <?php
            while($row1 = $get_contact->fetch()){
               
            echo'
            <div id="info"><i class="fa fa-map-marker" style="font-size:24px" ></i>
                <p>'.$row1['add1'].'</p>
            </div>
            <div id="contact"><i class="fa fa-phone" style="font-size:24px"></i></i>
                <p>+977-'.$row1['phn'].'</p>
            </div>
            <div id="msg"><i class="fa fa-envelope" style="font-size:20px"></i></i>
                <p>'.$row1['email'].'</p>
            </div>

            <div id="f_share">
                <div id="fb">   
                    <a href="'.$row1['fb'].'"> <i class="fa fa-facebook-f" style="font-size:24px"></i> </a>
                </div>
                <div id="in">
                    <a href="'.$row1['gp'].'"><i class="fa fa-instagram" style="font-size:24px"></i></a>
                </div>

                <div id="ln">
                    <a href="'.$row1['link'].'"><i class="fa fa-linkedin" style="font-size:24px"></i></a>
                </div>
                <div id="tw">
                    <a href="'.$row1['tw'].'"><i class="fa fa-twitter" style="font-size:24px"></i></a>
                </div>
            </div>';}
            ?>

        </li>
        <li>
            <h2> <span>Lea</span>ve Your Message </h2>
            <form method="post">
                <div id="f_input">
                    <i class="fa fa-user-circle" style="font-size:20px"></i>
                    <input type="text" name="q_name" placeholder="Enter Your Name"/>
                </div>
                <div id="f_input">
                    <i class="fa fa-envelope" style="font-size:20px"></i>
                    <input type="text" name="q_email" placeholder="Enter Your Email"/>
                </div>
                <textarea name="msg" placeholder="Enter Your Message"/> </textarea>
                <button>Send</button>
            </form>
        </li> 
        <br clear="All"/>
        <h3> All Rights Reserve to Sagar KC CopyRight@ 2020</h3>
    </ul>
</div>


<!--
One of the most important lesson that has been just understood by me is, i have to
divide my whole bunch of  time into very small chunk and then move and follow accordingly 
with it. 
Note if we want to color the placeholder from css we use the webkit... syntax for it.
-->