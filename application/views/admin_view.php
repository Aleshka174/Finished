<div class="container">
    <?php if (!empty($_SESSION['status'])): ?>
        <?php if ($_SESSION['status'] == 'admin'): ?>
            <div class="row"> <!-- Регистрация пользователей ВЫПОЛНЕНО--> 
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#registr" aria-expanded="false" aria-controls="registr">
                        Регистрация пользователя.
                    </button>
                </p>
                <div class="collapse" id="registr">
                    <div class="card card-body">
                        <form method="POST" id="createUser">
                            <div class="row" style="padding-top: 20px">
                                <div class="col">
                                    Логин <input name="login" id= "login" type="text" required><br>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px 0px">
                                <div class="col">
                                    Пароль <input name="password" id= "password" type="password" required><br> 
                                </div>
                            </div>
                            <div class="row" style="padding: 20px 0px">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Выберите статус</label>
                                    </div>
                                    <select class="custom-select" name="status" id="statusUser">
                                        <option selected>Выберите...</option>
                                            <?php  
                                                foreach($data['status'] as $row){
                                                    if ($row['status'] !== 'admin') {
                                                        echo "<option value=".$row['status'].">".$row['status']."</option><br>";
                                                    }
                                                }
                                            ?>
                                    </select><br> 
                                </div>
                            </div>
                            <div>
                                <p>     
                                    <button class="btn btn-primary" id='buttonCreateUser' type= 'button'>Зарегистрировать</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="row"> <!-- Деактивация пользователей ВЫПОЛНЕНО -->
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#disable" aria-expanded="false" aria-controls="disable">
                        Отключение пользователя.
                    </button>
                </p>
                    <div class="collapse" id="disable">
                        <div class="card card-body">
                            <form method="POST" id="disableUser">
                                <div class="row" style="padding: 20px 0px">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="loginDeactive">Выберите пользователя</label>
                                        </div>
                                        <select class="custom-select" name="login" id="loginDeactive">
                                            <option selected>Выберите...</option>
                                                <?php  
                                                    foreach($data['users'] as $row){
                                                        echo "<option value=".$row['login'].">".$row['login']." - ". $row['status'] ."</option><br>";
                                                    }                                                
                                                ?>
                                        </select><br> 
                                    </div>
                                </div>
                                <div>
                                    <p>
                                        <button class="btn btn-primary" id='buttonDeleteUser' type= 'button'>Отключить пользователя</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            <div class="row"> <!-- Подсчет заработка системы ВЫПОЛНЕНО --> 
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#coinSys" aria-expanded="false" aria-controls="coinSys">
                        Стоимость системы.
                    </button>
                </p>
                <form method="POST">
                    <div class="collapse" id="coinSys">
                        <div class="card card-body">
                            <div class="row" style="padding: 20px 0px">  
                                <p id="resultCoin"></p>
                            </div>
                            <p>
                                <button class="btn btn-primary" id='buttonCoin' type= 'button'>Получить стоимость</button>
                            </p>
                        </div>
                    </div>
                </form>
                </div>
                <br>
            <div class="row"> <!-- Вывод статистики системы ВЫПОЛНЕНО-->
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#statisticAdmin" aria-expanded="false" aria-controls="statisticAdmin">
                        Статистика
                    </button>
                </p>
                <form method= "POST" id='statistic'>
                    <div class="collapse" id="statisticAdmin">
                        <input type="hidden" name="status" value="<?php
                            echo $_SESSION['status'];
                        ?>">
                        <input type="hidden" name="login" value="<?php
                            echo $_SESSION['login'];
                        ?>">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">Период</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control py-2 border-right-0 border" name = "startDate" id = "start" type="date">            
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control py-2 border-right-0 border" name = "endDate" id= "end" type="date">
                                    </div>                
                                </div>                    
                        </div>                      
                        <button id = "buttonStat" type= 'button' class="btn btn-primary">Получить</button>
                        <div id="content">
                            <p>
                                Вывод статистики!
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <Button type="button" class="btn btn-outline-warning"><a href="/logout">Выйти</a></Button>
            <script src = "/public/js/coinSystem.js"></script>
            <script src = "/public/js/createUser.js"></script>
            <script src = "/public/js/deactiveUser.js"></script>
            <script src = "/public/js/formStatic.js"></script>
        <?php else: (header("HTTP/1.0 404 Not Found"));?>
        <?php endif ?>
    <?php else: (header("HTTP/1.0 404 Not Found"));?>
    <?php endif ?>
</div>