<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Клиент</h2>
        <form method="POST" action="/addNewclient">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label for="">ФИО</label>
                <div class="col-lg-6 col-md-8">
                    <input type="text" class="form-control" name="name" id="">
                </div>        
            </div>
            <div class="form-group row">
                <label>Пол</label>
                <div class="form-check">
                    <label for="male_sex">М</label>
                    <input type="radio" id="male_sex" name="sex"  value="М">
                    <label for="female_sex">Ж</label>
                    <input type="radio" id="female_sex" name="sex"value="Ж">
                </div>
            </div>
            <div class="form-group row">
                <label for="">Телефон</label>
                <div class="col-lg-6 col-md-8">
                    <input type="text" name="phone" class="form-control" id="phone" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="">Адрес</label>
                <div class="col-lg-6 col-md-8">
                    <input type="text" name="adress" class="form-control" id="adress">
                </div>
            </div>
            <h2>Автомобили</h2>
            <input type="text" value="1" name="cars_amount" id="cars_amount" hidden>
            <div class="form-group row car_input_1">
                <label for="">Марка</label>
                <input type="text" class="form-control" name="mark" id="mark_1" required>
            </div>
            <div class="form-group row car_input_1">
                <label for="">Модель</label>
                <input type="text" class="form-control" name="model" id="model_1" required>
            </div>
            <div class="form-group row car_input_1">
                <label for="">Цвет</label>
                <input type="text" class="form-control" name="color" id="color_1" required>
            </div>
            <div class="form-group row car_input_1">
                <label for="">Гос Номер РФ</label>
                <input type="text" class="form-control" name="car_number" id="car_number_1" required>
            </div>
            <div class="form-group row car_input_1">
                <label for="">Автомобиль на стоянке</label>
                <div class="form-check">
                    <label for="">Да</label>
                    <input type="radio" name="park_state" id="park_state_1" value="<?php echo e(true); ?>">
                    <label for="">Нет</label>
                    <input type="radio" name="park_state" id="park_state_2" value="<?php echo e(false); ?>">
                </div>
            </div>
            <input type="submit" class="btn">
        </form>
    </div>

    

    <script src="js/bootstrap.min.js"></script>
    <script src="js/form.js" ></script>
</body>
</html><?php /**PATH C:\OpenServer\domains\testParking\resources\views/new_client.blade.php ENDPATH**/ ?>