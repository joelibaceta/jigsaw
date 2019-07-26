docker run -it --rm -v $(pwd)/php_scripting:/script -w /script phpunit/phpunit phpSolutionTest.php
docker run -it --rm -v $(pwd)/php_poo:/app --rm -w /app phpunit/phpunit SolverTest.php