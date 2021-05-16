<?php


namespace TaskForce\classes;

use Exception;
use SplFileInfo;


class CsvToSqlConverter
{

    public static function parserCSV (string $filePath, string $outputDir, string $delimiter = ';', array $extraColumns = [], $callback = null)
    {
       if (file_exists($filePath)) {
           throw new Exception('Файл не найден');
       }

        $info = new SplFileInfo($filePath);
        if ($info->getExtension() !== 'csv'){
            throw new Exception('Не верный формат');
        }

        if ($info->getSize() === 0){
            throw new Exception('Файл пустой');
        }

        $csvObject = new \SplFileObject($filePath);

        $columnsNames = [];
        $valuesList = [];

        while (!$csvObject->eof()) {
            if ($csvObject->key() === 0) {
                $columnsNames = $csvObject->fgetcsv($delimiter);
            }

            $valuesArray[] = $csvObject->fgetcsv($delimiter);
            if ($callback && is_callable($callback)) {
                $valuesArray = array_merge($valuesArray, call_user_func($callback));
            }
            $valuesList[] = sprintf("\t(%s)", implode(',', array_map(function ($value) {
                return "'{$value}'";
            }, $valuesArray)));
        }
        $tableName = str_replace('.csv', '', basename($csvObject->getFilename()));
        $outputStr = sprintf(
            "INSERT INTO\r\n\t%s\r\n\t(%s)\r\nVALUES %s;",
            $tableName,
            implode(',', array_map(function (string $columnName) {
                return "`{$columnName}`";
            }, array_merge($columnsNames, $extraColumns))),
            implode(',', $valuesList)
        );

        $outputFilePath = rtrim($outputDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "{$tableName}.sql";
        if (!file_put_contents($outputFilePath, $outputStr)) {
            throw new Exception('File save error');
        }


    }

}

CSV2SQLParser::parse('users.csv', '/data/', null, ['task_id', 'created'], function () {
    return [
        rand(1,10),
        '2020-01-10 12:00:58',
    ];
});

