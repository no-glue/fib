<?php

class Fib{
	public function __construct(){}

	public function run($N){
		$i=$h=1;
		$j=$k=0;

		while($N>0){
			if($N%2==1){
				$t=bcmul($j,$h);
				$j=bcadd(bcadd(bcmul($i,$h),bcmul($j,$k)),$t);
				$i=bcadd(bcmul($i,$k),$t);
			}

			$t=bcmul($h,$h);
			$h=bcadd(bcmul(bcmul(2,$k),$h),$t);
			$k=bcadd(bcmul($k,$k),$t);
			$N=(int)($N/2);
		}

		return $j;
	}
}

$startTime=MICROTIME(true);
$number=(new Fib())->run($argv[1]);
$endTime=MICROTIME(true);
$diffTime=$endTime-$startTime;

echo "Number: $number\n\n";
echo "Time: $diffTime\n\n";
