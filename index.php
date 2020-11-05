<?php
require_once('helpers.php');
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
    [
        'title' => 'Собеседование в IT компании',
        'date_of_completion' => '06.11.2020',
        'category' => 'Работа',
        'completed' => false,
    ],
    [
        'title' => 'Выполнить тестовое задание',
        'date_of_completion' => '25.12.2021',
        'category' => 'Работа',
        'completed' => false,
    ],
    [
        'title' => 'Сделать задание первого раздела',
        'date_of_completion' => '07.11.2020',
        'category' => 'Учеба',
        'completed' => true,
    ],
    [
        'title' => 'Встреча с другом',
        'date_of_completion' => '22.12.2020',
        'category' => 'Входящие',
        'completed' => false,
    ],
    [
        'title' => 'Купить корм для кота',
        'date_of_completion' => null,
        'category' => 'Домашние дела',
        'completed' => false,
    ],
    [
        'title' => 'Заказать пиццу',
        'date_of_completion' => null,
        'category' => 'Домашние дела',
        'completed' => false,
    ],
];

function esc($str)
{
    $text = htmlspecialchars($str);

    return $text;
}

function counting_tasks(array $task_list, $project)
{
    $number_of_tasks = 0;

    foreach ($task_list as $key => $val) {
        if ($val['category'] === $project) {
            $number_of_tasks++;
        }
    }

    return $number_of_tasks;
}

function checking_time($time)
{
    $final_date = strtotime($time);
    $current_time = time();
    $count_hours = floor(($final_date - $current_time) / 3600);

    return $count_hours <= 24;
}

$page_content = include_template('main.php', [
    'tasks' => $tasks,
    'projects' => $projects,
    'show_complete_tasks' => $show_complete_tasks
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'mentorName' => 'Владимир Рекман'
]);

print($layout_content);
