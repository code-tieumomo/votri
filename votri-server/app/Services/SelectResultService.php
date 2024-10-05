<?php

namespace App\Services;

use Exception;

class SelectResultService
{
    /**
     * @throws Exception
     */
    public static function visualize(string $result): array
    {
        $result = preg_replace('/\+[-+]+\+/', '<SEP>', $result);

        $splited = explode("<SEP>", $result);
        $splited = collect($splited)
            ->map(fn ($line) => trim($line))
            ->filter(fn ($line) => $line !== '');

        $columnNames = self::extractFields($splited->first());
        if ($columnNames->isEmpty()) {
            throw new Exception('No column names found');
        }

        $visualized = [];
        $rawData = $splited->last();
        foreach (explode("|\n", $rawData) as $row) {
            $fields = self::extractFields($row);
            $data = [];
            foreach ($columnNames as $index => $columnName) {
                $data[$columnName] = $fields[$index];
            }
            $visualized[] = $data;
        }

        return [
            'columnNames' => $columnNames,
            'data' => $visualized,
        ];
    }

    private static function extractFields($raw)
    {
        $raw = trim($raw, '|');
        $rawFields = explode('|', $raw);

        return collect($rawFields)
            ->map(fn ($field) => trim($field));
    }
}
