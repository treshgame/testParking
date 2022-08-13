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
            @csrf
            <input type="text" name="user_id" value="{{$client->id}}" hidden>
            <div class="form-group row">
                <label>ФИО </label>
                <input type="text" class="form-control" name="name" value="{{$client->FIO}}">
            </div>
            <div class="form-group row">
                <label>Пол</label>
                <div class="form-check">
                    <label>М</label>
                    <input type="radio" name="sex" value="М" @if($client->sex == 'М') checked @endif>
                    <label>Ж</label>
                    <input type="radio" name="sex" value="Ж"@if($client->sex == 'Ж') checked @endif>
                </div>
                
            </div>
            <div class="form-group row">
                <label>Телефон</label>
                <input type="text" name="phone" class="form-control" value="{{$client->phone_num}}">
            </div>
            <div class="form-group row">
                <label>Адрес</label>
                <input type="text" name="adress" class="form-control" value="{{$client->adress}}">
            </div>
            <input type="submit" class="btn-success" value="Сохранить">
        </form>

        <form method="POST" action="/update_cars">
            @csrf
            <input type="text" value="{{count($cars)}}" name="cars_amount" hidden>
            <input type="text" value="{{$client->id}}" name="user_id" hidden>
            <?
                $i = 1;
                foreach($cars as $car){
                    ?>
                    <h2>Автомобиль {{$i}}</h2>
                    <div class="form-group row car_input_{{$i}}">
                        <label>Марка</label>
                        <input type="text" class="form-control" name="mark_{{$i}}" id="mark_{{$i}}" value="{{$car->mark}}" required>
                    </div>
                    <div class="form-group row car_input_{{$i}}">
                        <label>Модель</label>
                        <input type="text" class="form-control" name="model_{{$i}}" id="model_{{$i}}" value="{{$car->model}}" required>
                    </div>
                    <div class="form-group row car_input_{{$i}}">
                        <label>Цвет</label>
                        <input type="text" class="form-control" name="color_{{$i}}" id="color_{{$i}}" value="{{$car->color}}" required>
                    </div>
                    <div class="form-group row car_input_{{$i}}">
                        <label>Гос Номер РФ</label>
                        <input type="text" class="form-control" name="car_number_{{$i}}" id="car_number_{{$i}}" value="{{$car->car_number}}" readonly>
                    </div>
                    <div class="form-group row car_input_{{$i}}">
                        <label for="">Автомобиль на стоянке </label>
                        <div class="form-check">
                            <label for="">Да</label>
                            <input type="radio" name="park_state_{{$i}}" id="park_state_1_{{$i}}" value="1" @if($car->on_parking == 1) checked @endif>
                            <label for="">Нет</label>
                            <input type="radio" name="park_state_{{$i}}" id="park_state_2_{{$i}}" value="0" @if($car->on_parking == 0) checked @endif>
                        </div>
                    </div>
                <?
                $i++;
            }
            ?>
            <h3>Новый автомобиль</h3>
            <div class="form-group row car_input_1">
                <label for="">Марка</label>
                <input type="text" class="form-control" name="mark_{{$i}}" id="mark_{{$i}}" >
            </div>
            <div class="form-group row car_input_1">
                <label for="">Модель</label>
                <input type="text" class="form-control" name="model_{{$i}}" id="model_{{$i}}">
            </div>
            <div class="form-group row car_input_1">
                <label for="">Цвет</label>
                <input type="text" class="form-control" name="color_{{$i}}" id="color_{{$i}}">
            </div>
            <div class="form-group row car_input_1">
                <label for="">Гос Номер РФ</label>
                <input type="text" class="form-control" name="car_number_{{$i}}" id="car_number_{{$i}}">
            </div>
            <div class="form-group row car_input_1">
                <label for="">Автомобиль на стоянке</label>
                <div class="form-check">
                    <label for="">Да</label>
                    <input type="radio" name="park_state_{{$i}}" id="park_state_1_{{$i}}" value="1">
                    <label for="">Нет</label>
                    <input type="radio" name="park_state_{{$i}}" id="park_state_2_{{$i}}" value="0">
                </div>
            </div>

            <input type="submit" value="Сохранить" class="btn-success">
        </form>
    </div>
</body>
</html>