<?php

/**
 * Функция принимает два аргумента с типом string
 * Далее она осуществляет проверки на то, является ли аргумент числом или строкой содержащей число.
 * Если один из аргументов не является числом или строкой содержащей число, то прерывает выполнение функции с ошибкой.
 * Если проверки прошли успешно, то выводит результат.
 *
 * @param string $a
 * @param string $b
 * @return void
 */
function sum(string $a, string $b): void
{
	if (!is_numeric($a)) {
		error_log("Аргумент $a не является числом");
		return;
	}

	if (!is_numeric($b)) {
		error_log("Аргумент $b не является числом");
		return;
	}

	$numbers = [$a, $b];
	print_r(array_sum($numbers));
	print_r(PHP_EOL);
}

/**
 * Такая же, как функция sum, только реализованна через регулярное выражение.
 *
 * @param $a
 * @param $b
 * @return void
 */
function pregMatchSum($a, $b): void
{
	$pattern = '/\d+/';
	preg_match_all($pattern, $a, $matches1);
	preg_match_all($pattern, $b, $matches2);

	$sum = [];
	foreach ($matches1[0] as $key => $number1) {
		$sum[] = $number1;
	}
	foreach ($matches2[0] as $number2) {
		$sum[] = $number2;
	}

	print_r(array_sum($sum));
	print_r(PHP_EOL);
}

// Вызов функций
$a = '111111111111111111111111111111111111111111111111111111111111111111111111222222222222222222222222222222234324234234324324';
$b = '131313131313131313131313131313131313131313131313131313131313131313131313123123123123123123123123123123234234234234234234';

sum($a, $b);
pregMatchSum($a, $b);
