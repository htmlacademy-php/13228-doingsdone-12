<?php
require_once('helpers.php');
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
    [
        'title' => 'Собеседование в IT компании',
        'date_of_completion' => '01.12.2019',
        'category' => 'Работа',
        'completed' => false,
    ],
    [
        'title' => 'Выполнить тестовое задание',
        'date_of_completion' => '25.12.2019',
        'category' => 'Работа',
        'completed' => false,
    ],
    [
        'title' => 'Сделать задание первого раздела',
        'date_of_completion' => '21.12.2019',
        'category' => 'Учеба',
        'completed' => true,
    ],
    [
        'title' => 'Встреча с другом',
        'date_of_completion' => '22.12.2019',
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
