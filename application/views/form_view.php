<div class="container"> 
    <h1>Регистрация пользователя</h1>
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
                                foreach($data as $row){
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

<script src = "/public/js/createUserForm.js"></script>



