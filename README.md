<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Инструкция по развёртыванию проекта:
> "Тестовое задание для кандидата на вакансию Laravel разработчика".

Клонируем проект и переходим в папку с проестом

     git clone https://github.com/splaa/test-feedback-form.git && cd test-feedback-form

    cp .env.example .env
>Вы можете установить зависимости приложения, 
> перейдя в каталог приложения и выполнив 
> следующую команду. 
> Эта команда использует небольшой контейнер 
> Docker, содержащий PHP и Composer, 
> для установки зависимостей приложения:
 
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

Собираем и запускаем контейнеры    
    
    sail build --no-cache
    sail up -d
Запускаем миграции с начальными данными

    sail artisan migrate --seed

Открываем проект в IDE
   
    pstorm test-feedback-form

Запускаем Queue 

    sail artisan queue:work    

>Failed: - Ошибка
> 
>Processed: - Выполнение успешно
![img.png](img.png)

Посмотреть отправленные email
http://0.0.0.0:8025/

![img_1.png](img_1.png)

скачать отправленный файл 
![img_2.png](img_2.png)


-регистрация\авторизация:
http://localhost/
![img_3.png](img_3.png)

      #Manager  
      e-mail:  manager@example.com
      password: manager

      #Client  
      e-mail:  client@example.com
      password: client

также можна редактировать создвать Роли и права 
![img_4.png](img_4.png)


[Команды применяемые в ходе тестового](progress_execution_test.md)
