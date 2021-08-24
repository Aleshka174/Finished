<div class="container pt-4">
    <?php if (!empty($_SESSION['status'])): ?>    
        <?php if ($_SESSION['status'] == 'web-dev'): ?>
            <div class="row"> <!-- Список заказов с их отпиской Выполнено-->
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#disable" aria-expanded="false" aria-controls="disable">
                        Отписаться от заказов.
                    </button>
                </p>
                    <div class="collapse" id="disable">
                        <div class="card card-body">
                            <form method="POST" id="disableOffer">
                                <input type="hidden" name="login" value="<?php
                                    echo $_SESSION['login'];
                                ?>">
                                <div class="row" style="padding: 20px 0px">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="nameOfferActive">Выберите заказ</label>
                                        </div>
                                        <select class="custom-select" name="nameOfferActive" id="nameOfferActive">
                                            <option selected disabled>Имя заказа</option>
                                            <?php
                                                foreach($data['offerActive'] as $row){
                                                    echo "<option value=".$row['number'].">".$row['name']."</option><br>";
                                                }                                                
                                            ?>
                                        </select><br> 
                                    </div>
                                </div>
                                <div>
                                    <p>
                                        <button class="btn btn-primary" id='buttonDeactiveSub' type= 'button'>Деактивировать заказ</button>
                                    </p>
                                    <p>
                                        <button class="btn btn-primary" id='buttonPutHref' type= 'button'>Получить ссылку заказа!</button>
                                    </p>
                                </div>
                            </form>
                            <div id="result">
                                Вывод ссылок!
                            </div>
                        </div>
                    </div>
            </div>
            <br>
            <div class="row"> <!-- Подписание на заказы ВЫПОЛНЕНО--> 
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#enable" aria-expanded="false" aria-controls="enable">
                        Подписать на заказы.
                    </button>
                </p>
                    <div class="collapse" id="enable">
                        <div class="card card-body">
                            <form method="POST" id="enableOffer">
                                <input type="hidden" name="login" value="<?php
                                    echo $_SESSION['login'];
                                ?>">
                                <div class="row" style="padding: 20px 0px">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="nameOfferDeactive">Выберите заказ</label>
                                        </div>
                                        <select class="custom-select" name="nameOfferDeactive" id="nameOfferDeactive">
                                            <option selected disabled>Имя заказа | Стоимость </option>
                                                <?php
                                                    foreach($data['offer'] as $row){
                                                        echo "<option value=".$row['number'].">".$row['name']." | ". $row['prize'] ."</option><br>";
                                                    }
                                                ?>
                                        </select><br> 
                                    </div>
                                </div>
                                <div>
                                    <p>
                                        <button class="btn btn-primary" id='buttonActiveSub' type= 'button'>Подписаться на заказ</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <br>
            <div class="row"> <!-- Вывод статистики системы ВЫПОЛНЕНО-->
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#statisticWeb" aria-expanded="false" aria-controls="statisticWeb">
                        Статистика
                    </button>
                </p>
                <form method= "POST" id='statistic'>
                    <div class="collapse" id="statisticWeb">
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
            <script src="/public/js/subOffer.js"></script>
            <script src = "/public/js/formStatic.js"></script>
            <br>
            <Button type="button" class="btn btn-outline-warning"><a href="/logout">Выйти</a></Button> 
        <?php else: (header("HTTP/1.0 404 Not Found"));?>    
        <?php endif ?>
    <?php else: (header("HTTP/1.0 404 Not Found"));?>
    <?php endif ?> 
</div>
