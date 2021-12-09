## Инструкция по запуску

1. Загрузить код с репозитория:

```bash
git clone https://github.com/MirchenkoSK/bwai.git && cd bwai
```

2. Скопировать .env файл

```bash
cp .env.example .env
```

3. Собрать контейнер

```bash
./vendor/bin/sail up -d
```

4. Установить зависимости

```bash
./vendor/bin/sail composer install
```

5. Скомпилировать исходники
Я разделил админку и пользовательскую часть, так что их нужно собирать отдельно.
Подробности смотрите в package.json

```bash
./vendor/bin/sail npm run app:dev
./vendor/bin/sail npm run bwai:dev
```

6. Сгенерировать ключ приложения

```bash
./vendor/bin/sail artisan key:generate
```

7. Запустить миграции и посев данных

```bash
./vendor/bin/sail artisan migrate --seed
```


### Еще несколько команд, которые возможно понадобятся:

8. Откат миграций

```bash
./vendor/bin/sail artisan:reset
```

9. Останавливает сервер и удаляет контейнеры

```bash
./vendor/bin/sail down
```

10. На случай, если что-то пошло не так. Останавливает сервер и удаляет контейнеры, образы и сеть чтобы можно было начать с пункта 3.

```bash
./vendor/bin/sail down --rmi all -v
```

По всем другим вопросам обращайтесь ко мне - mirchenkosk@gmail.com или заглядывайте в документацию Laravel, Inertia, VueJS и Doker.