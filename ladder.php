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
		$format = "% " . strlen($n) . "d ";
		echo sprintf($format, $number);
		$number++;
		if ($carriageHorizontal >= $carriageVertical) {
			$carriageVertical++;
			$carriageHorizontal = 0;
			echo PHP_EOL;
			continue;
		}

		$carriageHorizontal++;

		// fix помогает избежать смещение чисел до 10, просто визуально приятно становится.
//		if ($number <= 10) {
//			print(" ");
//		}
	}

	print(PHP_EOL);
}

// Вызов функции
$n = 160;
generateLadder($n);
