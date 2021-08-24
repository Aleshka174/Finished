<div class="container">
    <?php if (!empty($_SESSION['status'])): ?>
            <?php if ($_SESSION['status'] == 'client'):?>
                <div class="row"> <!-- Создание заказа ВЫПОЛНЕНО--> 
                        <p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#createOffer" aria-expanded="false" aria-controls="createOffer">
                                Создание Заказа.
                            </button>
                        </p>
                        <div class="collapse" id="createOffer">
                            <div class="card card-body">
                                <form method="POST" id="createOfferForm">
                                    <input type="hidden" name="login" value="<?php
                                        echo $_SESSION['login'];
                                    ?>">
                                    <div class="row" style="padding-top: 20px">
                                        <div class="col">
                                            Имя заказа <input name="nameOffer" id= "nameOffer" type="text" required><br>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 20px 0px">
                                        <div class="col">
                                            Стоимость перехода <input name="prizeOffer" id= "prizeOffer" type="number" required><br> 
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 20px 0px">
                                        <div class="col">
                                            Адрес перехода <input name="urlOffer" id= "urlOffer" type="url" required><br> 
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 20px 0px">
                                        <div class="col">
                                            <textarea class="form-control" placeholder="Описание заказа" name = "theameOffer" id="theameOffer"></textarea>
                                            <br> 
                                        </div>
                                    </div>
                                    <div>
                                        <p>     
                                            <button class="btn btn-primary" id='buttonCreateOffer' type= 'button'>Создать заказ!</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
                <br>
                <div class="row"> <!-- Список заказов с их деактивацией ВЫПОЛНЕНО-->
                    <p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#disable" aria-expanded="false" aria-controls="disable">
                            Список заказов.
                        </button>
                    </p>
                        <div class="collapse" id="disable">
                            <div class="card card-body">
                                <form method="POST" id="disableOffer">
                                    <div class="row" style="padding: 20px 0px">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="nameOfferActive">Выберите пользователя</label>
                                            </div>
                                            <select multiple class="custom-select" name="nameOfferActive[]" id="nameOfferActive">
                                                    <?php 
                                                        foreach($data as $row){
                                                            echo "<option value=".$row['number'].">".$row['name']."! Количество мастеров - ". $row['countMaster'] ."</option><br>";
                                                        }                                        
                                                    ?>
                                            </select><br> 
                                        </div>
                                    </div>
                                    <div>
                                        <p>
                                            <button class="btn btn-primary" id='buttonDeactive' type= 'button'>Деактивировать заказ</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
                <br>
                <div class="row"> <!-- Вывод статистики системы ВЫПОЛНЕНО-->
                    <p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#statisticClient" aria-expanded="false" aria-controls="statisticClient">
                            Статистика
                        </button>
                    </p>
                    <form method= "POST" id='statistic'>
                        <div class="collapse" id="statisticClient">
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

                <script src="/public/js/deactOffer.js"></script>
                <script src="/public/js/createOffer.js"></script>
                <script src = "/public/js/formStatic.js"></script>
                <br>
                <Button type="button" class="btn btn-outline-warning"><a href="/logout">Выйти</a></Button> 
            <?php else: (header("HTTP/1.0 404 Not Found"));?>   
            <?php endif ?>
    <?php else: (header("HTTP/1.0 404 Not Found"));?>
    <?php endif ?> 
</div>
