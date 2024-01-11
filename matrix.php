<?php


/**
 * Функция принимает три аргумента: размер матрицы ($n х $m), максимальное число для генерации ($q) и массив использованных чисел ($usedNumbers).
 * Далее она создает двумерный массив (матрицу) и в цикле заполняет каждую строку случайными числами. Перед добавлением числа в массив проверяется, не было ли оно уже использовано. Если было, то генерируется новое случайное число. Если уникальные числа закончились, то выходит из итерации.
 *
 * @param int $n
 * @param int $m
 * @param int $q
 * @return void
 */
function generateMatrix(int $n, int $m, int $q): void
{
	$usedNumbers = [];

	for ($i = 0; $i < $m; $i++) {
		$tempRow = [];

		for ($j = 0; $j < $n; $j++) {
			if (count($usedNumbers) >= $q) return; // можно было бы использовать goto end или break

			$number = rand(1, $q);

			while (in_array($number, $usedNumbers)) {
				$number = rand(1, $q);
			}

			$tempRow[] = $number;
			$usedNumbers[] = $number;
		}

		print_r(implode(' ', $tempRow));
		print_r('  ');
		print_r(array_sum($tempRow));
		print(PHP_EOL);
	}
}

// Вызов функции
$n = 3;
$m = 2;
$q = 9;
generateMatrix($n, $m, $q);
