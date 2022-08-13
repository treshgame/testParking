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
        <h1>Клиенты</h1>
        <table class="table table-striped">
            <thead>
                <th scope="col">ФИО</th>
                <th scope="col">Машина</th>
                <th scope="col">Номер</th>
                <th scope="col">Редактировать пользователя</th>
                <th scope="col">Удалить машину</th>
            </thead>
            <tbody>
                <?
                foreach($clients as $client){
                    foreach(json_decode($client->cars) as $car){?>
                        <tr>
                            <td>{{$client->FIO}}</td>
                            <td>{{$cars["$car"]['mark']}} {{$cars["$car"]['model']}} {{$cars["$car"]['color']}}</td>
                            <td>{{$car}}</td>
                            <td><a href="/client_detail?id={{$client->id}}"><button>Редактировать</button></a></td>
                            <td><a href="/delete_car?number={{$car}}&user_id={{$client->id}}"><button>Удалить</button></a></td>
                            
                        </tr>
                    <?
                    }
                }
                ?>            
            </tbody>
        </table>
    </div>
    
</body>
</html>