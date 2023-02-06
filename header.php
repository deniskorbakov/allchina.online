
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="img/favicon.svg" alt="" width="30" height="24">
        </a>

        <a class="navbar-brand" href="#">allchina</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Главная</a></li>
                <li class="nav-item"><a href="china_calendar.php" class="nav-link">Китайский календарь</a></li>
                <li class="nav-item"><a href="tea.php" class="nav-link">Чай</a></li>
                <li class="nav-item"><a href="article.php" class="nav-link">Статьи</a></li>
                <li class="nav-item"><a href="faq.php" class="nav-link">О нас</a></li>

            </ul>

            <div class="collapse navbar-collapse " id="navbarNav"> 
		        <ul class="navbar-nav ms-auto">
                    <?php
                        error_reporting(E_ERROR);
                        $login = $_COOKIE["user"];
                        $email = $_COOKIE["email"];
                        $userstatus;

                        include_once 'connectionBD.php';
                        $sql = "SELECT `status` FROM `users` WHERE `login` = '$login' and `email` = '$email'";
                        if($result = $mysql->query($sql)) {
                            foreach($result as $row) { 
                            $userstatus = $row["status"];
                            }
                        }
                            
                            if ($userstatus == 1) : ?>
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="user_account.php">Кабинет пользователя</a></li>
                            
                            <?php else: ?>
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="aut.php">Авторизоваться</a></li>
                                <li class="nav-item"><a class="nav-link active" href="reg.php">Зарегистрироваться</a></li>
                                
                            <?php endif ?> 
		        </ul>		  
		    </div>
        </div>
    </div>   
</nav>






