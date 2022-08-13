<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <ul class="list-group row">
                <li class="list-group-item "><a href="/">Главная</a></li>
                <li class="list-group-item"><a href="/newclient">Добавить нового пользователя</a></li>
                
            </ul>
        </div>
    </header>
    <div class="container">
        <h1>Клиент</h1>
        <form method="POST" action="/user_update">
            <?php echo csrf_field(); ?>
            <input type="text" name="user_id" value="<?php echo e($client->id); ?>" hidden>
            <div class="form-group row">
                <label>ФИО </label>
                <input type="text" class="form-control" name="name" value="<?php echo e($client->FIO); ?>">
            </div>
            <div class="form-group row">
                <label>Пол</label>
                <div class="form-check">
                    <label>М</label>
                    <input type="radio" name="sex" value="М" <?php if($client->sex == 'М'): ?> checked <?php endif; ?>>
                    <label>Ж</label>
                    <input type="radio" name="sex" value="Ж"<?php if($client->sex == 'Ж'): ?> checked <?php endif; ?>>
                </div>
                
            </div>
            <div class="form-group row">
                <label>Телефон</label>
                <input type="text" name="phone" class="form-control" value="<?php echo e($client->phone_num); ?>">
            </div>
            <div class="form-group row">
                <label>Адрес</label>
                <input type="text" name="adress" class="form-control" value="<?php echo e($client->adress); ?>">
            </div>
            <input type="submit" class="btn-success" value="Сохранить">
        </form>

        <form method="POST" action="/update_cars">
            <?php echo csrf_field(); ?>
            <input type="text" value="<?php echo e(count($cars)); ?>" name="cars_amount" hidden>
            <input type="text" value="<?php echo e($client->id); ?>" name="user_id" hidden>
            <?
                $i = 1;
                foreach($cars as $car){
                    ?>
                    <h2>Автомобиль <?php echo e($i); ?></h2>
                    <div class="form-group row car_input_<?php echo e($i); ?>">
                        <label>Марка</label>
                        <input type="text" class="form-control" name="mark_<?php echo e($i); ?>" id="mark_<?php echo e($i); ?>" value="<?php echo e($car->mark); ?>" required>
                    </div>
                    <div class="form-group row car_input_<?php echo e($i); ?>">
                        <label>Модель</label>
                        <input type="text" class="form-control" name="model_<?php echo e($i); ?>" id="model_<?php echo e($i); ?>" value="<?php echo e($car->model); ?>" required>
                    </div>
                    <div class="form-group row car_input_<?php echo e($i); ?>">
                        <label>Цвет</label>
                        <input type="text" class="form-control" name="color_<?php echo e($i); ?>" id="color_<?php echo e($i); ?>" value="<?php echo e($car->color); ?>" required>
                    </div>
                    <div class="form-group row car_input_<?php echo e($i); ?>">
                        <label>Гос Номер РФ</label>
                        <input type="text" class="form-control" name="car_number_<?php echo e($i); ?>" id="car_number_<?php echo e($i); ?>" value="<?php echo e($car->car_number); ?>" readonly>
                    </div>
                    <div class="form-group row car_input_<?php echo e($i); ?>">
                        <label for="">Автомобиль на стоянке </label>
                        <div class="form-check">
                            <label for="">Да</label>
                            <input type="radio" name="park_state_<?php echo e($i); ?>" id="park_state_1_<?php echo e($i); ?>" value="1" <?php if($car->on_parking == 1): ?> checked <?php endif; ?>>
                            <label for="">Нет</label>
                            <input type="radio" name="park_state_<?php echo e($i); ?>" id="park_state_2_<?php echo e($i); ?>" value="0" <?php if($car->on_parking == 0): ?> checked <?php endif; ?>>
                        </div>
                    </div>
                <?
                $i++;
            }
            ?>
            <h3>Новый автомобиль</h3>
            <div class="form-group row car_input_1">
                <label for="">Марка</label>
                <input type="text" class="form-control" name="mark_<?php echo e($i); ?>" id="mark_<?php echo e($i); ?>" >
            </div>
            <div class="form-group row car_input_1">
                <label for="">Модель</label>
                <input type="text" class="form-control" name="model_<?php echo e($i); ?>" id="model_<?php echo e($i); ?>">
            </div>
            <div class="form-group row car_input_1">
                <label for="">Цвет</label>
                <input type="text" class="form-control" name="color_<?php echo e($i); ?>" id="color_<?php echo e($i); ?>">
            </div>
            <div class="form-group row car_input_1">
                <label for="">Гос Номер РФ</label>
                <input type="text" class="form-control" name="car_number_<?php echo e($i); ?>" id="car_number_<?php echo e($i); ?>">
            </div>
            <div class="form-group row car_input_1">
                <label for="">Автомобиль на стоянке</label>
                <div class="form-check">
                    <label for="">Да</label>
                    <input type="radio" name="park_state_<?php echo e($i); ?>" id="park_state_1_<?php echo e($i); ?>" value="1">
                    <label for="">Нет</label>
                    <input type="radio" name="park_state_<?php echo e($i); ?>" id="park_state_2_<?php echo e($i); ?>" value="0">
                </div>
            </div>

            <input type="submit" value="Сохранить" class="btn-success">
        </form>
    </div>
</body>
</html><?php /**PATH C:\OpenServer\domains\testParking\resources\views/detail.blade.php ENDPATH**/ ?>