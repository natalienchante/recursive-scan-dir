<?php
public const GRAFIC_TREE_CHILD = '___';

public function showDirectoryContents($folder, $indent, $break)
{
    $items = scandir($folder);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') 
            continue;
        echo $indent.$item.$break;
        $path = $folder.DIRECTORY_SEPARATOR.$item;
        if (is_dir($path) && is_readable($path) && !is_link($item)) {
            showDirectoryContents($path, str_replace(GRAFIC_TREE_CHILD, '   ', $indent).'|'.GRAFIC_TREE_CHILD, $break);
        }
    }
}

if (php_sapi_name()=='cli') {
    showDirectoryContents('.', '', "\n");
}
else {
    showDirectoryContents('.', '', "<br/>");
}
