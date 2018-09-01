<?php

/**
 * @param SimpleXMLElement $data
 */
function task1(SimpleXMLElement $data)
{

    foreach ($data->attributes() as $attribute) {
        echo "<p>" . $attribute->getName() . ": " . $attribute . "</p>";
    }

    if (count($data->children()) == 0) {
        echo "<p>" . $data->getName() . ": " . $data . "</p>";
        return;
    }

    foreach ($data->children() as $child) {
        task1($child);
    }
}

function task2()
{

    $filePath = "src/output.json";

    $data = [
        "bmw" => [
            "model" => "X5",
            "speed" => 120,
            "doors" => 5,
            "year" => "2015"
        ]
    ];

    $json = json_encode($data);
    file_put_contents($filePath, $json);

    $json = file_get_contents($filePath);
    $json = json_decode($json, true);

    if (rand(0, 1) > 0.5) {
        file_put_contents("src/output2.json", $json);

        $json["bmw"]["speed"] = 300;

        file_put_contents("src/output2.json", json_encode($json));

        $array1 = file_get_contents($filePath);
        $array2 = file_get_contents("src/output2.json");

        $keys = array_keys($array1["bmw"]);

        for ($i = 0; $i < count($keys); $i++) {
            if ($array1["bmw"][$keys[$i]] != $array2["bmw"][$keys[$i]]) {
                echo $array2["bmw"][$keys[$i]] . PHP_EOL;
            }
        }
    }
}

function task3()
{
    $filePath = "src/file.csv";
    $maxLimit = 50;
    $array = array();

    for ($i = 0; $i < $maxLimit; $i++) {
        $array[] = mt_rand(1, 100);
    }

    $file = fopen($filePath, 'w');
    fputcsv($file, $array);
    fclose($file);

    $file = fopen($filePath, 'r');

    while (($data = fgetcsv($file, 1000, ",")) !== false) {
        foreach ($data as $value) {
            echo $value . PHP_EOL;
        }
    }

    fclose($file);
}

function task4()
{
    $url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&
	prop=revisions&rvprop=content&format=json";

    $data = json_decode(file_get_contents($url), true);

    if (!empty($data)) {
        echo "Invalid JSON";
        return;
    }

    foreach ($data["query"]["pages"] as $value) {
        echo "<p>", $value["pageid"], "</p>", "<p>", $value["title"], "</p>";
    }
}
