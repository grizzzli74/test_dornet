<?php

/**
 * В этой функции мы начинаем с числа 1 и выводим его.
 * Затем мы увеличиваем счетчик и выводим каждый раз по два пробела, чтобы создать отступ для следующего числа.
 * Мы продолжаем этот процесс до тех пор, пока не достигнем числа ‘n’.
 * Затем мы переходим на новую строку.
 *
 * @param int $n
 * @return void
 */
function generateLadder(int $n): void
{
	$number = 1;
	$carriageHorizontal = 0;
	$carriageVertical = 0;
	while ($number <= $n) {
		print($number);
		$number++;
		if ($carriageHorizontal >= $carriageVertical) {
			$carriageVertical++;
			$carriageHorizontal = 0;
			print(PHP_EOL);
			continue;
		}

		$carriageHorizontal++;

		print(" ");

		// fix помогает избежать смещение чисел до 10, просто визуально приятно становится.
		if ($number <= 10) {
			print(" ");
		}
	}
}

// Вызов функции
$n = 66;
generateLadder($n);
