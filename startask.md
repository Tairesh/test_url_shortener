# Задание со звездочкой

```
Подробно описать словами процесс реализации функциональности для сбора статистики по количеству переходов по сокращенным ссылкам, также указать какое дополнительное серверное ПО потребуется (если потребуется).

Пользователю должно быть доступно общее кол-во переходов по ссылке и кол-во переходов в разбивке по дням.

Необходимо учесть, что в пике количество переходов по ссылке может достигать 5.000 в секунду. Допускается задержка (не более чем в 1 минуту) при отображении актуальной статистики пользователю.

Описание выложить в тот же репозиторий файлом с названием startask.md
```

1. Создать таблицу для статистики переходов по ссылкам. В таблице должны быть следующие поля:
    - id
    - link_id - идентификатор ссылки с hash-индексом
    - created_at - дата и время перехода

2. При переходе по ссылке, создавать задачу в RabbitMQ или аналогичной очереди. В задаче должны быть следующие данные:
    - link_id
    - created_at

3. Создать воркер, который будет обрабатывать задачи из очереди. Воркер должен добавлять записи в таблицу статистики переходов batch-insert-ом.

4. Для общего числа переходов по ссылке можно использовать SQL-запрос вида:
```sql
SELECT COUNT(*) FROM `statistic` WHERE `link_id` = :link_id
```

5. Для количества переходов в разбивке по дням (в часовом поясе сервера):
```sql
SELECT DATE(`created_at`) AS `date`, COUNT(*) AS `count` FROM `statistic` WHERE `link_id` = :link_id GROUP BY DATE(`created_at`)
```