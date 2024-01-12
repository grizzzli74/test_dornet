<?php


/**
 * Функция принимает три аргумента: размер матрицы ($n х $m), максимальное число для генерации ($q) и массив использованных чисел ($usedNumbers).
 * Далее она создает двумерный массив (матрицу) и в цикле заполняет каждую строку случайными числами. Перед добавлением числа в массив проверяется, не было ли оно уже использовано. Если было, то генерируется новое случайное число. Если уникальные числа закончились, то дописывает строку до конца с нулевыми значениями номера и выходит из итерации.
 *
 * @param int $n
 * @param int $m
 * @param int $q
 * @return void
 */
function generateMatrix(int $n, int $m, int $q): void
{
	$matrix = [];
	$usedNumbers = [];
	$matrixColumnSum = 0;

	for ($i = 0; $i < $m; $i++) {
		$tempRow = [
			'row' => [],
			'sum' => 0,
		];
		for ($j = 0; $j < $n; $j++) {
			$number = 0;
			if (count($usedNumbers) < $q) {
				do {
					//Генерация случайного числа
					$number = rand(1, $q);

					//Проверка на уникальность числа
				} while (in_array($number, $usedNumbers));
			};

			$tempRow['row'][] = $number;
			$tempRow['sum'] += $number;
			$usedNumbers[] = $number;
		}

		$matrix[] = $tempRow;

		if (count($usedNumbers) >= $q) break;
	}

	foreach ($matrix as $row) {
		if (!$row['sum']) {
			continue;
		}

		$matrixColumnSum += $row['sum'];

		foreach ($row['row'] as $number) {
			$format = "% " . strlen($q);
			if ($number === 0) {
				$format .= "s ";
				print_r(sprintf($format, ''));
				continue;
			}

			$format .= "d ";
			print_r(sprintf($format, $number));
		}

		print_r('  ');
		print_r($row['sum']);
		print_r(PHP_EOL);
	}

	print_r("Сумма столбцов: $matrixColumnSum" . PHP_EOL);
}

// Вызов функции
$n = 10;
$m = 10;
$q = 78;
generateMatrix($n, $m, $q);
