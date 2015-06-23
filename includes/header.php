        <div id="nav-bar">
                    <img src="images/logo.png" style="position:absolute;left:60px;top:-5px"/>
                    <p style="position:absolute;
                              left:170px;
                              top:0px;
                              text-transform:uppercase;
                              color:#ff6600;
                              font-weight:800;
                              font-size:30px;">Text Park</p>
                              
            <?php   if(!loggedin()){
                        echo '<div class="link-wrap">';
                            echo '<div class="link"> <a href="index.php" style="top:38px;"> Home </a> </div>';
                            echo '<div class="link"> <a href="#about" style="top:38px;"> About </a> </div>'; 
                            echo '<div class="link"> <a href="#services" style="top:38px;">Services </a> </div>'; 
                            echo '<div class="link"> <a href="#team" style="top:38px;"> Team </a> </div>'; 
                            echo '<div class="link"> <a href="#contact-us" style="top:38px;"> Contact us </a> </div>'; 
                        echo '</div>';
                    }
                    else{
                        echo '<div class="link-wrap" style="width:360px">';
                            echo '<div class="link"> <a href="index.php" style="top:38px;"> Home </a> </div>';
                            echo '<div class="link"> <a href="profile.php" style="top:38px;"> Profile </a> </div>';
                            echo '<div class="link"> <a href="logout.php" style="top:38px;"> Logout </a> </div>';
                        echo '</div>';
                    }
            ?>   
        </div>
