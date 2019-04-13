<?php
      $bdd = new PDO('mysql:host=localhost;dbname=ataya;charset=utf8', 'root', '');
            if(!$bdd){
                 }   
            else {
                    $ret = $bdd->query('SELECT COUNT(*) AS nbmsg FROM message WHERE vu = 0');
                    $data = $ret->fetch();
                    $nb_message = $data['nbmsg'];

                    $ret = $bdd->query('SELECT COUNT(*) AS nbcmt FROM comments WHERE approbation = 0');
                    $data = $ret->fetch();
                    $nb_comment = $data['nbcmt'];
            }
?>
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-4.jpg">



    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    ATAYA CLUB
                </a>
            </div>

            <ul class="nav">
                <?php
                if(!isset($page)) {
                    $page = '';
                }
                    if($page == 'prcp') {
                        echo'
                            <li class="active">
                                <a href="dashboard.php">
                                    <i class="pe-7s-graph"></i>
                                    <p>Principale</p>
                                </a>
                            </li>
                        ';
                    } else {
                        echo'
                            <li >
                                <a href="dashboard.php">
                                    <i class="pe-7s-graph"></i>
                                    <p>Principale</p>
                                </a>
                            </li>
                        ';
                    } 
                    if($page == 'galerie') {
                        echo'
                            <li class="active">
                                <a href="galeri.php">
                                    <i class="pe-7s-camera"></i>
                                    <p>Galerie</p>
                                </a>
                            </li>
                        ';
                    } else {
                        echo'
                            <li>
                                <a href="galeri.php">
                                    <i class="pe-7s-camera"></i>
                                    <p>Galerie</p>
            						     </a>
                            </li>
                        ';
                    } 
                    if($page == 'cmt') {
                        echo'
                            <li class="active">
                                <a href="commentaires.php">
                                    <i class="pe-7s-comment"></i>
                                    <p>Commentaires </p>
                                </a>
                            </li>
                        ';
                    } else {
                        if($nb_comment > 0)
                        echo'
                            <li>
                                <a href="commentaires.php">
                                    <i class="pe-7s-comment"></i>
                                    <p>Commentaires &nbsp;&nbsp;&nbsp;<span class="badge badge-secondary">'.$nb_comment.'</span></p>
                                </a>
                            </li>
                        '; 
                        else 
                        echo'
                            <li>
                                <a href="commentaires.php">
                                    <i class="pe-7s-comment"></i>
                                    <p>Commentaires </p>
                                </a>
                            </li>
                        '; 
                        
                    }
                    if($page == 'event') {
                        echo'
                            <li class="active">
                                <a href="event.php">
                                    <i class="pe-7s-news-paper"></i>
                                    <p>événements</p>
                                </a>
                            </li>
                        ';
                    } else {
                        echo'
                            <li>
                                <a href="event.php">
                                    <i class="pe-7s-news-paper"></i>
                                    <p>événements</p>
                                </a>
                            </li>
                        ';
                    } 
                    if($page == 'msg') {
                        echo'
                            <li class="active">
                                <a href="messages.php">
                                    <i class="pe-7s-chat"></i>
                                    <p>Messages</p>
                                </a>
                            </li>
                        ';
                    } else {
                        if ($nb_message > 0)
                        echo'
                            <li>
                                <a href="messages.php">
                                    <i class="pe-7s-chat"></i>
                                    <p>Messages &nbsp;&nbsp;&nbsp;<span class="badge badge-secondary">'.$nb_message.'</span></p>
                                </a>
                            </li>
                        ';
                        else 
                        echo'
                            <li>
                                <a href="messages.php">
                                    <i class="pe-7s-chat"></i>
                                    <p>Messages </p>
                                </a>
                            </li>
                        ';
                    } 
                ?>

				<li class="active-pro">
                    <a href="deconnecter.php">
                        <i class="pe-7s-key"></i>
                        <p>Déconnecter</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
