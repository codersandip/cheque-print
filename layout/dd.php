<?php

function custom_copy($src, $dst)
{

    // open the source directory 
    $dir = opendir($src);

    // Make the destination directory if not exist 
    @mkdir($dst);

    // Loop through the files in source directory 
    while ($file = readdir($dir)) {

        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {

                // Recursively calling custom copy function 
                // for sub directory  
                custom_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}




$dir = './../builds';
if (!is_dir($dir)) {
    mkdir($dir);
}

function replaceString($output)
{
    $output = str_replace(".php", ".html", $output);
    $output = str_replace("        ", "", $output);
    $output = str_replace("    ", "", $output);
    return $output;
}
foreach (scandir(__DIR__ . '/../') as $filename) {

    if (str_contains($filename, ".php")) {
        exec('cd .. && php ' . $filename, $output);
        file_put_contents($dir . '/' . str_replace(".php", ".html", $filename),  replaceString($output));
        $output = '';
    }
}
// exit;
// exec('php index.php', $output);
// file_put_contents($dir . '/index.html',  replaceString( $output));
// exec('php cheque-back.php', $output1);
// file_put_contents($dir . '/cheque-back.html',  replaceString( $output1));
// exec('php cheque-prefix.php', $output2);
// file_put_contents($dir . '/cheque-prefix.html',  replaceString( $output2));
// exec('php envelope-print.php', $output3);
// file_put_contents($dir . '/envelope-print.html',  replaceString( $output3));
custom_copy('./../assets', './../builds/assets');

// copy('./index.html', $dir . '/index.html');
// copy('./style.css', $dir . '/style.css');
// copy('./script.js', $dir . '/script.js');
// copy('./to-words.bundle.js', $dir . '/to-words.bundle.js');
// copy('./moment.bundle.js', $dir . '/moment.bundle.js');
// copy('./ChequeData.js', $dir . '/ChequeData.js');